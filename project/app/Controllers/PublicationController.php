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
        $rows = $allPublication->getAllPublications();

        // Afficher le template avec Twig
        echo $this->twig->render('publications.twig', ['rows' => $rows]);
    }
}
