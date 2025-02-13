<?php  
namespace App\Controllers;
require_once __DIR__ . '/../../vendor/autoload.php';


use App\Models\AnnoncesModel;
use App\Models\ReservationModel;
use App\Controllers\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

use \DateTime;

class PaimentController {

    public function paiment(){

        
        

        if (isset($_POST['prixTotale']) && isset($_POST['nuberOfDay']) && isset($_POST['dateStart'])) {

            $prixTotale   = $_POST['prixTotale'];
            $numberOfDays = $_POST['nuberOfDay'];
            $dateStart    = $_POST['dateStart'];
            $dateFine     = $_POST['dateFine'];
            $prix         = $_POST['prix'];


            

            $startDay= new Datetime ( $dateStart );
            $endtDay = new Datetime ( $dateFine );
            
            $diff = $startDay->diff( $endtDay );

            if($numberOfDays>$diff->days){
                $days = $numberOfDays;

            }else{
                $days = $diff->days; 
            }


            View::render('pyment.twig', ['prixTotale' => $prixTotale,'days'=>$days,'prix'=>$prix]);
         
        }   
    }

    public function checkeDay(){

        $getAnnonces = new AnnoncesModel();
        $getDateOfReservation = new ReservationModel();
       
       
        $Annonces = $getAnnonces->getInforamtin(6);

        if(!$Annonces){
            return false;
        }

        $Dates  = $getDateOfReservation->getDate(6);

        $dateOfReservation=[];
        foreach($Dates as $date ){
            $start = new  DateTime($date->getReservationDateDebut()) ;
            $end = new  DateTime($date->getResevationDateFin()) ;

            while($start <= $end ){
                $dateOfReservation[] = $start->format('Y-m-d');
                $start->modify('+1 day');
            }
        }
        $jsonData = json_encode($dateOfReservation);
        View::render('checkeDay.twig', [
            'row' => $Annonces,
            'dates'=>$dateOfReservation,
            'jsonDates' => $jsonData
        ]);

    }
  

    public function validation(){
        $this->loadView('validation'); 
    }

    private function loadView($viewName, $data = []){
        extract($data);
        require_once __DIR__."/../../views/paiment/".$viewName.".php";
    }
    
}





