<?php  
namespace App\Controllers\Proprietaire;

use App\Models\Proprietaire;
use App\Controllers\BaseController;
use Config\Database;

class VoyageurController extends BaseController {
    public function messageVoyageur(){
        $results = $this->render('messageVoyageur');
        return $results;
    }
}