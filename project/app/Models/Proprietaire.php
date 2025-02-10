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
        $sql = "select * from annonces";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $annonces = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $annonces ;
    }

}