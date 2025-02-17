<?php  
namespace App\Controllers;

use App\Models\Proprietaire;
use App\Controllers\BaseController;
use Config\Database;

class VoyageurController extends BaseController {
    public function messageVoyageur(){
        
        $results = $this->render('messageVoyageur');
    }

}