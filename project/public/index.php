<?php

use Src\Http\Request;
use Src\Http\Response;
use Src\Http\Route;
use Config\Database;


require_once("../vendor/autoload.php");
require_once '../routes/web.php';

echo "Start";

$route = new Route(new Request , new Response);
$route->resolve();

Database::getConnection();

