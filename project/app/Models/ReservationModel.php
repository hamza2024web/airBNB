<?php

namespace App\Models;

use App\Classes\Reservation;

use Config\Database;
use PDO;

class ReservationModel
{
    private $conn;
    public function __construct()
    {

        $this->conn = Database::getConnection();
    }


    public function getDate($id)
    {
        $sql = "select reservationDateDebut,reservationDateFin from  Annonces 
                inner join  Reservations 
                on Annonces.id = Reservations.annonceId
                where Annonces.id= :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump( $rows);
        // exit ;

        $reservation = [];

        foreach ($rows as $row) {
            $reservation[] = new reservation($row['reservationdatefin'], $row['reservationdatedebut']);
        }

        return $reservation;
    }

    public function insertReservation($idAnnoce, $vayageurId, $dateStart, $dateEnd, $paiment_id)
    {
        if (is_array($paiment_id) && !empty($paiment_id)) {
            $paiment_id = $paiment_id[0];
        }
        $sql = "INSERT INTO reservations 
                (annonceid, voyageurid, reservationdatedebut, reservationdatefin, payment_id)
                VALUES (:annonceid, :voyageurid, :reservationdatedebut, :reservationdatefin, :paiment_id)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':annonceid', $idAnnoce);
        $stmt->bindParam(':voyageurid', $vayageurId);
        $stmt->bindParam(':reservationdatedebut', $dateStart);
        $stmt->bindParam(':reservationdatefin', $dateEnd);
        $stmt->bindParam(':paiment_id', $paiment_id);

        $resulta = $stmt->execute();

        if (!$resulta) {
            return false;
        } else {
            return true;
        }
    }

    public function paimentinsert($orderId)
    {
        $sql = 'INSERT INTO paiment ("order")
                VALUES (:orderId);
                ';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':orderId', $orderId);
        $resulta = $stmt->execute();
        if (!$resulta) {
            return false;
        } else {
            return true;
        }
    }

    public function idepaiment($orderId)
    {

        $sql = 'SELECT id
                FROM paiment
                WHERE "order" = :orderId;';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':orderId', $orderId);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rows) {
            return $rows;
        } else {
            return null;
        }
    }
}
