<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;


class AdminDashboard extends BaseController{
    public function FetchAnnonces(){
        $adminModel = new AdminModel();
        $results = $adminModel->AdminAnnonces();
        $this->renderAdmin('admin', ['results' => $results]);
    }
    public function statut(){
        $id = $_POST["id"];
        $newStatut = $_POST["statut"];
        $statut = new AdminModel();
        $results = $statut->EditStatut($id,$newStatut);
        header("location: /admin");
        $this->renderAdmin('admin', ['results' => $results]);
    }
    public function statistique(){
        $results = $this->loadView('statistique'); 
        return $results;
    }
    public function numbreOfProprieties (){}
    private function loadView($viewName, $data = []) {
        extract($data);
        require_once __DIR__ . "/../../Views/proprietaires/".$viewName.".php"; 
    }
}
?>