<?php

use Src\Http\Route ;

Route::get('', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('login', 'AuthentificationController@login');
Route::post('login', 'AuthentificationController@authenticate');
Route::get('register', 'AuthentificationController@register');
Route::post('register', 'AuthentificationController@insert');
Route::get('logout', 'AuthentificationController@logout');

// Route::get('about',function (){
//     echo "this is fun ";
//     exit;
// });
