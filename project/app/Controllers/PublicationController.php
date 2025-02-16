<?php  
namespace App\Controllers;

use App\Models\Publication;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PublicationController {
    private $twig;

    public function __construct() {
        // Définir le dossier des templates
        $loader = new FilesystemLoader(__DIR__. '/../../Views/');
        $this->twig = new Environment($loader);
    }



    public function addPublication() {
        echo "this is addPublicationjnfjnj";
    }

    public function showPublication() {
        $allPublication = new Publication();
        $categories=$allPublication->getAllPublicationsCategories();
        $annonces = $allPublication->getAllPublications();
   
        echo $this->twig->render('Publication/publications.twig', ['annonces' => $annonces,'categories'=>$categories]);
    }

    
    public function detailsPublication($id){
       $PublicationById = new Publication();
       $row= $PublicationById->getById($id);
       
     echo $this->twig->render('Publication/detailsPublication.twig', ['announce' => $row]);
       
    }

    public function filterCategoryPublication() {
      
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category'])) {
        $category = $_POST['category'];
         $publicationModel = new Publication();
        if ($category === "All") {
            $annonces = $publicationModel->getAllPublications();
        } else  {
            $annonces=$publicationModel->getPublicationsByCategories($category);
        }
       
        echo json_encode($annonces);
    } 
    
}




 public function filterSearchPublication() {
     
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
        $search = $_POST['search'];
        
         $publicationModel = new Publication();
        if ($search === "") {
            $annonces = $publicationModel->getAllPublications();
        } else  {
            $annonces=$publicationModel->getPublicationsBySearchName($search);
        }
       
        echo json_encode($annonces);
    } 
    
}



}
