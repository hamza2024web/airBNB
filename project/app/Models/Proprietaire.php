<?php

namespace App\Models;

use Config\Database;

class Proprietaire {
    private $conn;
    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    
}