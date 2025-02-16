<?php
namespace App\Models;

use App\Classes\Reservation;

use Config\Database;
use PDO;

class ReservationModel {
    private $conn;
    public function __construct(){

     $this->conn=Database::getConnection();

    } 

   
    public function getDate($id){
        $sql = "select reservationDateDebut,reservationDateFin from  Annonces 
                inner join  Reservations 
                on Annonces.id = Reservations.annonceId
                where Annonces.id= :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',$id) ;
        $stmt->execute();
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump( $rows);
        // exit ;

        $reservation = [];

        foreach($rows as $row ){
            $reservation[]= new reservation($row['reservationdatefin'],$row['reservationdatedebut']);
        }

        return $reservation;
    }  

    public function insertReservation($idAnnoce,$vayageurId,$dateStart,$dateEnd,$orderId){
        $sql = "insert into reservations 
        (annonceid,voyageurid,reservationdatedebut,reservationdatefin,paiment_id)
         values (:annonceid,:voyageurid,:reservationdatedebut,:reservationdatefin,:paiment_id)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':annonceid', $idAnnoce) ;
        $stmt->bindParam(':voyageurid',$vayageurId) ;
        $stmt->bindParam(':reservationdatedebut',$dateStart) ;
        $stmt->bindParam(':reservationdatefin',$dateEnd) ;
        $stmt->bindParam(':paiment_id',$orderId) ;
        $resulta = $stmt->execute();
          
        

         if(!$resulta){
            return false;
         }else{
            return true;
         }
    }  
} 


?>