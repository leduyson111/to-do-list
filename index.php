<?php

require __DIR__.'/vendor/autoload.php';
require_once 'app/bootstrap.php';


error_reporting(-1);
ini_set('display_errors', 'On');

use App\Libraries\Core;
new Core();
