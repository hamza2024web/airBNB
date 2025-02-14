<?php

namespace App\Models;

use Config\Database;
use PDO;

class AdminModel {
    private $conn;
    public function __construct()
    {
        $this->conn = Database::getConnection();
    }
    public function AdminAnnonces(){
        $sql = "SELECT  annonces.id , annonces.title , annonces.photo , annonces.description , annonces.prix , annonces.disponibilite, categories.categoryname ,annonces.date_de_publication ,annonces.statut 
        from annonces
        inner join categories on categories.id = annonces.category_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function EditStatut($id,$newStatut){
        $sql = "UPDATE annonces SET statut = :statut WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":statut",$newStatut);
        $stmt->bindParam("id",$id);
        $stmt->execute();
        return true;
    }
    public function users(){
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $usersFetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $usersFetch;
    }
    public function EditStatutUser($id,$newStatutUser){
        $sql = "UPDATE users SET statut = :statut WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":statut",$newStatutUser);
        $stmt->bindParam("id",$id);
        $stmt->execute();
        return true;
    }
}
?>