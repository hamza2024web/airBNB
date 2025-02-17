<?php  
namespace App\Controllers;



class HomeController {
    public function index(){
        header("location: publication");
    }
}