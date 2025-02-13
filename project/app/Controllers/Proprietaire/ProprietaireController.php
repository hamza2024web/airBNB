<?php
namespace App\Controllers\Proprietaire;

use App\Controllers\BaseController;
use App\Models\AnnoncesDisponabilite;
use App\Models\Proprietaire;


class ProprietaireController extends BaseController{
    public function disponabilite (){
        $id = $_POST["id"];
        $newdisponibilite = $_POST["disponibilite"];
        $disponabilite = new AnnoncesDisponabilite();
        $results = $disponabilite->EditDisponabilite($id , $newdisponibilite);
        $this->loadView('proprietaire', ['results' => $results]); 
        return $results;
    }
    public function message(){
        $proprietaireModel = new Proprietaire();
        $results = $proprietaireModel->AfficheMessage();
        $results = $this->render('messageProprietaire');
        return $results;
    }
    public function sendMessage(){
        $id = $_POST["id"];
        $sendMessage = $_POST["sendMessage"];
        $proprietaireModel = new Proprietaire($id,$sendMessage);
        $results = $proprietaireModel->sendMessageToVoyageur($id , $sendMessage);
        $this->loadView('messageProprietaire',['results' => $results]);
        return $results;
    }
    private function loadView($viewName, $data = []) {
        extract($data);
        require_once __DIR__ . "/../../../Views/proprietaires/$viewName.twig"; 
    }
}

?>