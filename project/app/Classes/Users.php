<?php 

namespace App\Classes;
require_once("../vendor/autoload.php");


class Users{

    private $id;
    private $username;
    private $email;
    private $password;
    private $role;
   

    public function __construct($id, $username, $email, $password, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    
    public function getId() {
        return $this->id;
    }
    public function getusername() {
        return $this->username;
    }
    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }


    public function getRole() {
        return $this->role;
    }


}

?>