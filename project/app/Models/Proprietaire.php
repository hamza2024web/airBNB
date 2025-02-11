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
        $sql = "select  annonces.id , annonces.title , annonces.photo , annonces.description , annonces.prix ,annonces.disponibilite , categories.categoryname 
        from annonces
        inner join categories on categories.id = annonces.category_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $annonces = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $annonces ;
    }


}