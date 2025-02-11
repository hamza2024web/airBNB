<?php
require_once("../vendor/autoload.php");

use Src\Http\Route;

Route::get('proprietaire', 'DashboardController@annonces');
Route::get('statistique', 'DashboardController@statistique');
Route::post('disponibilite','ProprietaireController@disponabilite');