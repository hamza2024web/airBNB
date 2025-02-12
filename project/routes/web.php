<?php

use Src\Http\Route ;

Route::get('home', 'HomeController@index');
Route::get('paiment', 'PaimentController@paiment');
Route::post('paiment', 'PaimentController@paiment');
Route::get('checkeDay', 'PaimentController@checkeDay');
Route::get('validation', 'PaimentController@validation');
Route::post('validation', 'PaimentController@validation');





