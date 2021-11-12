<?php

namespace App\Controllers;

use App\Libraries\Controller;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->work_model = $this->model('Work');
    }

    public function index()
    {
        $works = $this->work_model->getAll();
        $data = [
            'works' => $works
         ];
        return $this->view('works\index', $data);
    }

    public function create()
    {
        return $this->view('works\add');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'start_date' => trim($_POST['start_date']),
                'end_date' => trim($_POST['end_date']),
                'status' => trim($_POST['status']),
             ];
        }
        $this->work_model->addWork($data);
        $data = [];
        $works = $this->work_model->getAll();
        $data = [
            'works' => $works
        ]; 

        return $this->view('works\index', $data);
        // header('Location: http://localhost/to-do-list/works');
    }

    public function edit(){
        $id = $_GET['id'];
      
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'start_date' => trim($_POST['start_date']),
                'end_date' => trim($_POST['end_date']),
                'status' => trim($_POST['status']),
            ];
        }
        $this->work_model->updateWork($data);
        $data = [];
        $work = $this->work_model->getWorktById($id);
        $data = [
            'work' => $work
        ];
        $this->view('posts/edit', $data);
    }
}
