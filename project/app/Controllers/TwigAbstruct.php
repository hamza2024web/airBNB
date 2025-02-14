<?php  
namespace App\Controllers;

use App\Models\Publication;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PublicationController {
    private $twig;

    public function __construct() {
        // Définir le dossier des templates
        $loader = new FilesystemLoader(__DIR__. '/../Views');
        $this->twig = new Environment($loader);
    }

    public function addPublication() {
        echo "this is addPublication";
    }

    public function showPublication() {
        $allPublication = new Publication();
        $annonces = $allPublication->getAllPublications();
        $categories=$allPublication->getAllPublicationsCategories();

        echo $this->twig->render('publications.twig', ['annonces' => $annonces,'categories'=>$categories]);
    }
    public function detailsPublication($id){
       $PublicationById = new Publication();
       $details= $PublicationById->getById($id);
    echo $this->twig->render('detailsPublication.twig', ['details' => $details]);

        
    }
}
