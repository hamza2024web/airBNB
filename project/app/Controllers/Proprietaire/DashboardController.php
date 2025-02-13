<?php  
namespace App\Controllers\Proprietaire;

use App\Models\Proprietaire;
use App\Controllers\BaseController;
use Config\Database;

class DashboardController extends BaseController {
    public function annonces(){
        $proprietaireModel = new Proprietaire(); 
        $results = $proprietaireModel->getAllAnnonces(); 
        $this->render('dashboard', ['results' => $results]);
        return $results;
    }
    public function message(){
        $results = $this->render('messageProprietaire');
        return $results;
    }
    public function reservations(){
        $proprietaireModel = new Proprietaire();
        $results = $proprietaireModel->getAllReservations();
        $this->loadView('listreservations',['results' => $results]);
        return $results;
    }
    public function statistique (){
        $results = $this->loadView('statistique'); 
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

    public function tauxOccupation(){
        $proprietaireModel = new Proprietaire();
        $results = $proprietaireModel->TauxOccupation();
        return $results;
    }
    private function loadView($viewName, $data = []) {
        extract($data);
        require_once __DIR__ . "/../../../Views/proprietaires/".$viewName.".twig"; 
    }
}