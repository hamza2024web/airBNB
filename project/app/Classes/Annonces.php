<?php
namespace App\Classes;

class Annonces {

    private $id;
    private $title;
    private $photo;
    private $description;
    private $prix;
    private $categoryname;



    public function __construct($id,$title,$photo,$description,$prix,$categoryname){
        $this->id=$id;
        $this->title=$title;
        $this->photo=$photo;
        $this->description=$description;
        $this->prix=$prix;
        $this->categoryname=$categoryname;
    }

    public function getId          (){ return $this->id; }
    public function getTitle       (){ return $this->title; }
    public function getPhoto       (){ return $this->photo; }
    public function getDescription (){ return $this->description; }
    public function getPrix        (){ return $this->prix; }
    public function getCategoryname(){ return $this->categoryname; }





}
?>
