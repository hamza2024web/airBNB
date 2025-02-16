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
            $stmt = $this->pdo->query("SELECT 
    annonces.*, 
    annonces.id AS idannonce, 
    annonces.title AS titleannonce, 
    categories.categoryname, 
    promotion.title AS titlePromotion,
    promotion.pourcentage_promotion, 
    promotion.date_de_fin
FROM annonces
LEFT JOIN promotion ON promotion.id = annonces.promotion_id  
INNER JOIN categories ON categories.id = annonces.category_id
where annonces.disponibilite='Disponible'
               ");
 
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
                $stmt = $this->pdo->query("SELECT 
                annonces.*, 
                annonces.id AS idannonce, 
                annonces.title AS titleannonce, 
                categories.categoryname, 
                promotion.title AS titlePromotion,
                promotion.pourcentage_promotion, 
                promotion.date_de_fin,
            users.username as owner_name,
            users.email as owner_email,
            profile.photo as owner_photo
            FROM annonces
            LEFT JOIN promotion ON promotion.id = annonces.promotion_id  
            INNER JOIN categories ON categories.id = annonces.category_id
            INNER JOIN users ON users.id = annonces.proprietaire_id
            INNER JOIN profile ON profile.id = users.id
            where annonces.id= $id " );

             return $stmt->fetch(PDO::FETCH_ASSOC);
            

        } catch (PDOException $e) {
            die("Erreur: " . $e->getMessage());
        }
    }
    public function getPublicationsByCategories($category) { 
        try {
                $stmt = $this->pdo->query("SELECT 
            annonces.*, 
            annonces.id AS idannonce, 
            annonces.title AS titleannonce, 
            categories.categoryname, 
            promotion.title AS titlePromotion,
            promotion.pourcentage_promotion, 
            promotion.date_de_fin
            FROM annonces
            LEFT JOIN promotion ON promotion.id = annonces.promotion_id  
            INNER JOIN categories ON categories.id = annonces.category_id
            where categories.categoryname='$category' and annonces.disponibilite='Disponible'");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Erreur: " . $e->getMessage());
        }
    }



     public function getPublicationsBySearchName($value) { 
        try {
                    $stmt = $this->pdo->query("SELECT 
            annonces.*, 
            annonces.id AS idannonce, 
            annonces.title AS titleannonce, 
            categories.categoryname, 
            promotion.title AS titlePromotion,
            promotion.pourcentage_promotion, 
            promotion.date_de_fin
        FROM annonces
        LEFT JOIN promotion ON promotion.id = annonces.promotion_id  
        INNER JOIN categories ON categories.id = annonces.category_id
               where  annonces.title like '$value%' and annonces.disponibilite='Disponible'");

             return $stmt->fetchAll(PDO::FETCH_ASSOC);
            

        } catch (PDOException $e) {
            die("Erreur: " . $e->getMessage());
        }
    }
}
