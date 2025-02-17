<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnnoncesDisponabilite;
use App\Models\Proprietaire;


class ProprietaireController extends BaseController{
    public function disponabilite (){
        $id = $_POST["id"];
        $newdisponibilite = $_POST["disponibilite"];
        $disponabilite = new AnnoncesDisponabilite();
        $results = $disponabilite->EditDisponabilite($id , $newdisponibilite);
        header("location: /proprietaire");
        $this->loadView('dashboard', ['results' => $results]); 
    }
    public function message(){
        $proprietaireModel = new Proprietaire();
        $results = $proprietaireModel->AfficheMessage();
        $this->render('messageProprietaire', ['results' => $results]);
    }
    public function sendMessage(){
        $id = $_POST["id"];
        $sendMessage = $_POST["sendMessage"];
        $proprietaireModel = new Proprietaire();
        $results = $proprietaireModel->sendMessageToVoyageur($id , $sendMessage);
        header("location: /messageProprietaire");
        $this->render('messageProprietaire', ['results' => $results]);
        
    }
    private function loadView($viewName, $data = []) {
        extract($data);
        require_once __DIR__ . "/../../Views/proprietaires/".$viewName.".twig"; 
    }
}

?>