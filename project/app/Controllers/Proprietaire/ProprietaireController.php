<?php
namespace App\Controllers\Proprietaire;
use App\Models\AnnoncesDisponabilite;


class ProprietaireController {
    public function disponabilite ($id , $newdisponibilite){
        $disponabilite = new AnnoncesDisponabilite();
        $results = $disponabilite->EditDisponabilite($id , $newdisponibilite);
        $this->loadView('proprietaire', ['results' => $results]); 
        return $results;
    }

    private function loadView($viewName, $data = []) {
        extract($data);
        require_once __DIR__ . "/../../../Views/proprietaires/dashboard.php"; 
    }

}

?>