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
        var_dump($_POST);
        die;
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'start_date' => trim($_POST['start_date']),
                'end_date' => trim($_POST['end_date']),
                'status' => trim($_POST['status']),
             ];
            var_dump($data);
            die;
        }
        var_dump('123');
        die;
        $works = $this->work_model->getAll();
        $data = [
            'works' => $works
         ];
        return $this->view('works\add');
    }
}
