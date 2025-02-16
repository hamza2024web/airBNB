<?php

use Src\Http\Request;
use Src\Http\Response;
use Src\Http\Route;
use Config\Database;

<<<<<<< HEAD

require_once '../vendor/autoload.php';
=======
>>>>>>> de94d5f3f0c877c3b9645c9ccc47d3af133ca02d
require_once '../routes/web.php';

$route = new Route(new Request , new Response);
$route->resolve(); 

