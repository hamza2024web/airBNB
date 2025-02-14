<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;


class AdminDashboard extends BaseController{
    public function FetchAnnonces(){
        $adminModel = new AdminModel();
        $results = $adminModel->AdminAnnonces();
        $this->renderAdmin('admin', ['results' => $results]);
    }
}

?>