<?php
namespace App\Controllers\Proprietaire;

use App\Controllers\BaseController;
use App\Models\AnnoncesDisponabilite;


class ProprietaireController extends BaseController{
    public function disponabilite (){
        $id = $_POST["id"];
        $newdisponibilite = $_POST["disponibilite"];
        $disponabilite = new AnnoncesDisponabilite();
        $results = $disponabilite->EditDisponabilite($id , $newdisponibilite);
        $this->loadView('proprietaire', ['results' => $results]); 
        return $results;
    }

    private function loadView($viewName, $data = []) {
        extract($data);
        require_once __DIR__ . "/../../../Views/proprietaires/$viewName.twig"; 
    }

}

?>