<?php

require_once("../vendor/autoload.php");
use Src\Http\Route ;

Route::get('home', 'HomeController@index');
Route::get('paiment', 'PaimentController@paiment');
Route::post('paiment', 'PaimentController@paiment');
Route::get('checkeDay', 'PaimentController@checkeDay');
Route::get('validation', 'PaimentController@validation');
Route::post('validation', 'PaimentController@validation');
Route::get('proprietaire', 'DashboardController@annonces');
Route::get('statistique', 'DashboardController@statistique');
Route::post('disponibilite','ProprietaireController@disponabilite');
Route::get('listreservations','DashboardController@reservations');
Route::get('messageProprietaire','ProprietaireController@message');
Route::get('messageVoyageur','VoyageurController@messageVoyageur');
Route::post('sendMessage','ProprietaireController@sendMessage');

