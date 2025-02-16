<?php
require_once "../vendor/autoload.php";
use Src\Http\Route ;

Route::get('', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('publication', 'PublicationController@showPublication');
Route::get('details/{id}', 'PublicationController@detailsPublication');
Route::post('publication/CategoryFilter', 'PublicationController@filterCategoryPublication');
Route::post('publication/SearchFilter', 'PublicationController@filterSearchPublication');
Route::post('addPublication', 'PublicationController@addPublication');
Route::get('login', 'AuthentificationController@login');
Route::post('login', 'AuthentificationController@authenticate');
Route::get('register', 'AuthentificationController@register');
Route::post('register', 'AuthentificationController@insert');
Route::get('logout', 'AuthentificationController@logout');
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


