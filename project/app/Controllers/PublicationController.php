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
       
        echo $this->twig->render('publications.twig', ['annonces' => $annonces,'categories'=>$categories]);
    }

    
    public function detailsPublication($id='1'){
       $PublicationById = new Publication();
       $row= $PublicationById->getById($id); 
       
    }

    public function filterPublication() {
      
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category'])) {
        $category = $_POST['category'];
       
        

        // Get filtered publications based on the category
        if ($category === "All") {
             $allPublication = new Publication();
       
        $annonces = $allPublication->getAllPublications();

        } else {
           $publicationModel = new Publication();
            $annonces=$publicationModel->getPublicationsByCategories($category);
        }

        // Return data as JSON (instead of HTML)
        echo json_encode($annonces);
    } 
    
}



}
