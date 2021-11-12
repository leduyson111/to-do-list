<?php

namespace App\Libraries;

use App\Models\Work;

/*
     * Base Controller
     * Loads the models and views
     */

class Controller
{
  // Load model
  public function model($model)
  {
    //Instantiate model
    $model = "App\Models" . "\\" . $model;
    return new $model();
  }

  // Load view
  public function view($view, $data = [])
  {
    // Check for view file
    if (file_exists(APP_ROOT . '\Views\\' . $view . '.php')) {
      require_once(APP_ROOT . '\Views\\' . $view . '.php');
    } else {
      /// View does not exists
      die('View does not exists');
    }
  }
}
