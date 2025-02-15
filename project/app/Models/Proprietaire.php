<?php

namespace App\Models;
session_start();
use Config\Database;
use PDO;

class Proprietaire {
    private $conn;
    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function getAllAnnonces () {
        $proprietaire = $_SESSION["user_id"];
        $sql = "SELECT  annonces.id , annonces.title , annonces.photo , annonces.description , annonces.prix ,annonces.disponibilite ,annonces.statut , categories.categoryname 
        from annonces
        inner join categories on categories.id = annonces.category_id
        inner join users on users.id = annonces.proprietaire_id
        where users.id = :proprietaire";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":proprietaire",$proprietaire);
        $stmt->execute();
        $annonces = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $annonces ;
    }
    public function getAllReservations(){
        $sql = "SELECT annonces.title , annonces.photo, users.username , users.email ,reservations.reservationdatedebut , reservations.reservationdatefin , paiment.date_de_paiment
        FROM reservations
        INNER JOIN annonces ON annonces.id = reservations.annonceid 
        INNER JOIN users ON users.id = reservations.voyageurid
        INNER JOIN paiment ON paiment.id = reservations.paiment_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $reservations ;
        }
    public function allAnnonces(){
        $sql = "SELECT count(*) as numbreannonces FROM annonces
        inner join users on annonces.proprietaire_id = users.id
        where annonces.proprietaire_id = :proprietaire";
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
    public function AfficheMessage(){
        $sql = "SELECT * FROM messages ORDER BY timestamp";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } else {
            return false;
        }
    }
    public function sendMessageToVoyageur($id, $sendMessage) {
        $sql = "INSERT INTO messages (senderid, receiverid, messagetext) 
        VALUES (:senderId, :receiverId, :sendMessage)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":senderId", $id, PDO::PARAM_INT); 
        $stmt->bindValue(":receiverId", 2, PDO::PARAM_INT); 
        $stmt->bindParam(":sendMessage", $sendMessage, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    

}