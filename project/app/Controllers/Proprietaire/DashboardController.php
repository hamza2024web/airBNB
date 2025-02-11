<?php  
namespace App\Controllers\Proprietaire;

use App\Models\Proprietaire;
use Config\Database;

class DashboardController {
    public function annonces(){
        $proprietaireModel = new Proprietaire(); 
        $results = $proprietaireModel->getAllAnnonces(); 
        $this->loadView('proprietaire', ['results' => $results]); 
        return $results;
    }
    public function numbresProprietes(){
        $proprietaireModel = new Proprietaire();
        $results = $proprietaireModel->allAnnonces();
        return $results;
    }
    public function numbreReserve(){
        $proprietaireModel = new Proprietaire();
        $results = $proprietaireModel->numbreOfReserve();
        return $results;
    }

    public function numbreDisponible(){
        $proprietaireModel = new Proprietaire();
        $results = $proprietaireModel->numbreOfDisponible();
        return $results;
    }

    public function annoncesRevenu(){
        $proprietaireModel = new Proprietaire();
        $results = $proprietaireModel->RevenuOfAnnonce();
        return $results;
    }
    private function loadView($viewName, $data = []) {
        extract($data);
        require_once __DIR__ . "/../../../Views/proprietaires/dashboard.php"; 
    }
}