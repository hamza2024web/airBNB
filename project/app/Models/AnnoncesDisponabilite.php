<?php

namespace App\Models;

use Config\Database;

class AnnoncesDisponabilite {
    private $conn ;
    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function EditDisponabilite($id , $newdisponibilite){
        $sql = "UPDATE annonces SET disponibilite = :newdisponibilite WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":newdisponibilite",$newdisponibilite);
        $stmt->bindParam("id",$id);
        $stmt->execute();
        return true ;
    }
}
?>