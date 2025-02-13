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
        $userRegistre = new UserModel($username, $email, $password, $role);
        $userRegistre->addMember($username, $email, $password, $role);
        header('Location: /login');
    }
    public function authenticate()
    {
        session_start();

            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $userLogin = new UserModel($email, $password);
            $results = $userLogin->login($email, $password);
            if ($results["role"] == "admins") {
                header('Location: /register');
                exit;
            }elseif ($results["role"] == "Proprietaires"){
                header('Location: /proprietaire');
                exit;
            }elseif ($results["role"] == "Voyageurs"){
                header('Location: /register');
                exit;
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
