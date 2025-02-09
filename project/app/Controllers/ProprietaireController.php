<?php  
namespace App\Controllers;

class ProprietaireController {
    public function proprietaires(){
        $this->loadView('proprietaire'); 
    }

    private function loadView($viewName, $data = []){
        extract($data);
        require_once __DIR__ . "/../../Views/proprietaires/dashboard.php";
    }
}
