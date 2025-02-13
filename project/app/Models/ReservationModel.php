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
} 


?>