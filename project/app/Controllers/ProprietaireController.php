<?php  
namespace App\Controllers;

use App\Models\Proprietaire;
use Config\Database;

class ProprietaireController {
    private $proprietaireModel;

    public function __construct() {
        $this->proprietaireModel = new Proprietaire(); 
    }

    public function annonces(){
        $data = [
            'proprietaires' => $this->proprietaireModel->getAllAnnonces() 
        ];
        $this->loadView('proprietaire', $data);
    }

    private function loadView($viewName, $data = []) {
        extract($data); 
        require_once __DIR__ . "/../../Views/proprietaires/dashboard.php"; 
    }
}
