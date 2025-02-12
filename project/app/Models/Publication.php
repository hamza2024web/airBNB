<?php  
namespace App\Models;

use PDO;
use PDOException;
use Config\Database;
class Publication {
    private  $pdo;
    
    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function getAllPublications() { 
        try {
            $stmt = $this->pdo->query("SELECT * FROM annonces");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur: " . $e->getMessage());
        }
    }
}
