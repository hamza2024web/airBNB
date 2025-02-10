<?php
require_once("../vendor/autoload.php");

use Src\Http\Route;

Route::get('home', 'HomeController@index');
Route::get('proprietaire','ProprietaireController@annonces');