<?php

namespace App\Controllers;

require_once("../vendor/autoload.php");

use App\Models\UserModel;

class AuthentificationController
{

    public function login()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /home');
            exit;
        }
        $this->loadView('login');
    }

    public function register()
    {

        if (isset($_SESSION['user'])) {
            header('Location: /home');
            exit;
        }
        $this->loadView('register');
    }

    private function loadView($viewName, $data = [])
    {
        extract($data);
        require_once __DIR__ . "/../../Views/authentification/" . $viewName . ".php";
    }

    public function insert()
    {
        session_start();
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password_'];
        $role = $_POST['role'];
        if ($role == "Proprietaires"){
            $statut = "Not Actif";
        }
        if ($role == "Voyageurs"){
            $statut = "Actif";
        }
        $userRegistre = new UserModel($username, $email, $password, $role ,$statut);
        $userRegistre->addMember($username, $email, $password, $role,$statut);
        header('Location: /login');
    }
    public function authenticate()
    {
        session_start();
        
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $userLogin = new UserModel($email, $password);
            $results = $userLogin->login($email, $password);
            if ($results["statut"] == "Actif"){
                if ($results["role"] == "Admins") {
                    header('Location: /admin');
                    exit;
                }elseif ($results["role"] == "Proprietaires"){
                    header('Location: /proprietaire');
                    exit;
                }elseif ($results["role"] == "Voyageurs"){
                    header('Location: /register');
                    exit;
                }
            } elseif ($results["statut"] == "Not Actif"){
                echo "Please Contact the support , your account is Not Actif";
            }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
