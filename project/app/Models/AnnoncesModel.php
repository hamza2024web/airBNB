<?php
namespace App\Models;

use App\Classes\Annonces;
use Config\Database;
use PDO;

class AnnoncesModel {
    private $conn;
    public function __construct(){

     $this->conn=Database::getConnection();

    } 

    public function getInforamtin($id){
        $sql = "select * from Annonces
                inner join categories
                on Annonces.category_id =categories.id
				inner join reservations 
				on reservations.annonceid = annonces.id
                where Annonces.id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',$id) ;
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        $Annonces = new Annonces('',$row['title'],$row['photo'],$row['description'],$row['prix'],$row['categoryname']);
        
        
        
        return $Annonces;
    }

     
} 


?>