<?php

namespace App\Models;

use Config\Database;
use PDO;

class Proprietaire {
    private $conn;
    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function getAllAnnonces () {
        $sql = "SELECT  annonces.id , annonces.title , annonces.photo , annonces.description , annonces.prix ,annonces.disponibilite ,annonces.statut , categories.categoryname 
        from annonces
        inner join categories on categories.id = annonces.category_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $annonces = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $annonces ;
    }
    public function allAnnonces(){
        $sql = "SELECT count(*) as numbreannonces FROM annonces";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['numbreannonces'];
        } else {
            return false;
        }
    }

    public function numbreOfReserve(){
        $sql = "SELECT COUNT(*) as numbrereserve FROM annonces 
        WHERE disponibilite = 'Réservé'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['numbrereserve'];
        } else {
            return false;
        }
    }

    public function numbreOfDisponible(){
        $sql = "SELECT COUNT(*) as numbredisponible FROM annonces 
        WHERE disponibilite = 'Disponible'"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['numbredisponible'];
        } else {
            return false;
        }
    }

    public function RevenuOfAnnonce(){
        $sql = "SELECT SUM(prix) AS revenus_totaux FROM annonces WHERE disponibilite IN ('Vendu', 'Réservé') AND statut IN ('Validé');";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['revenus_totaux'];
        } else {
            return false;
        }
    }
    public function TauxOccupation(){
        
    }

}