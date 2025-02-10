<?php  
namespace App\Controllers;

use App\Models\Proprietaire;
use Config\Database;

class ProprietaireController {
    public function annonces(){
        $proprietaireModel = new Proprietaire(); 
        $results = $proprietaireModel->getAllAnnonces(); 
        $this->loadView('proprietaire', ['results' => $results]); 
        return $results;
    }
    

    private function loadView($viewName, $data = []) {
        extract($data);
        require_once __DIR__ . "/../../Views/proprietaires/dashboard.php"; 
    }
}
