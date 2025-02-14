<?php
session_start();

require_once("../../../vendor/autoload.php");

use App\Controllers\AuthentificationController;

$authController = new AuthentificationController();
$authController->logout();

?>