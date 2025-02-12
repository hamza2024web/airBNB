<?php  
namespace App\Controllers;

use App\Models\AnnoncesModel;

class PaimentController {

    public function paiment(){
        
        if (isset($_POST['prixTotale']) && isset($_POST['nuberOfDay'])) {

            $prixTotale = $_POST['prixTotale'];
            $numberOfDays = $_POST['nuberOfDay'];

            require_once __DIR__."/../../views/paiment/pyment.php";
        }   
    }

    public function checkeDay(){

        $getAnnonces = new AnnoncesModel();
        $Annonces = $getAnnonces->getInforamtin(1);
        
        
    if(!$Annonces){
        return false;
    }else{
        $row=$Annonces;
        // var_dump($row->getPhoto());
        // exit;
        require_once __DIR__."/../../views/paiment/checkeDay.php";
    }
    }

    public function validation(){
        $this->loadView('validation'); 
    }

    private function loadView($viewName, $data = []){
        extract($data);
        require_once __DIR__."/../../views/paiment/".$viewName.".php";
}

public function desplayAnnonces($id){
    
}
}



