<?php

use Src\Http\Route ;

Route::get(' ', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('publication', 'PublicationController@showPublication');
Route::get('details/{id}', 'PublicationController@detailsPublication');
Route::post('addPublication', 'PublicationController@addPublication');


