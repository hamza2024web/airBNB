<?php
namespace App\Classes;

class Reservation {

    
    private $reservationDateFin;
    private $reservationDateDebut;



    public function __construct($reservationDateFin,$reservationDateDebut){

        $this->reservationDateFin=$reservationDateFin;
        $this->reservationDateDebut=$reservationDateDebut; 
    }

    public function getReservationDateDebut (){ return $this->reservationDateDebut; }
    public function getResevationDateFin      (){ return $this->reservationDateFin; }
   





}
?>
