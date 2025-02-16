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
            $stmt = $this->pdo->query("SELECT  annonces.id , annonces.title , annonces.photo , annonces.description , annonces.prix ,annonces.disponibilite ,annonces.statut , categories.categoryname 
        from annonces
        inner join categories on categories.id = annonces.category_id");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur: " . $e->getMessage());
        }
    }
     public function getAllPublicationsCategories() { 
        try {
            $stmt = $this->pdo->query("SELECT DISTINCT categories.categoryname FROM categories");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur: " . $e->getMessage());
        }
    }
     public function getById($id) { 
        try {
            $stmt = $this->pdo->query("SELECT *,annonces.id as idannonce,annonces.title as titleAnnonce,categories.categoryname,promotion.title as titlePromotion,
            promotion.pourcentage_promotion,promotion.date_de_fin FROM annonces
            INNER JOIN promotion ON promotion.id=annonces.promotion_id
               INNER JOIN categories ON categories.id=annonces.category_id
               where annonces.id= $id");

             return $stmt->fetchAll(PDO::FETCH_ASSOC);
            

        } catch (PDOException $e) {
            die("Erreur: " . $e->getMessage());
        }
    }
}
