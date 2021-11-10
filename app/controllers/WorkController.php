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
        $result = $this->work_model->getAll();
        return $this->view('');
    }
}
