<?php
namespace App\Models;
use Config\Database;
use Exception;
use PDOException;
use PDO;
class UserModel {

    private $connexion;

    public function __construct() {
        $this->connexion = Database::getConnection();
    }

    public function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function emailExists($email) {
        $query = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    private function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function addMember($username, $email, $password, $role,$statut) {

        if ($this->emailExists($email)){
            throw new \Exception("Un compte avec cette email existe déja");
        }

        $hashedPassword = $this->hashPassword($password);
        $query = "INSERT INTO users (username,email, password,role ,statut)
        VALUES (:username,:email, :password, :role ,:staut);";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':staut',$statut);
        $insertResults = $stmt->execute();
        return $insertResults;
    }

    public function login($email, $password) {
        // Validate inputs
        if (empty($email) || empty($password)) {
            throw new \Exception("Email et mot de passe sont requis.");
        }

        // Prepare SQL query to fetch user
        $query = "SELECT * FROM users WHERE email = :email";
        try {
            $stmt = $this->connexion->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user['role'] === 'Admins'){
                return $user;
            }
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['statut'] = $user['statut'];
                unset($user['password']);
                return $user;
            } else {
                throw new \Exception("Email ou mot de passe incorrect.");
            }
        } catch (PDOException $e) {
            throw new \Exception("Erreur de connexion : " . $e->getMessage());
        }
    }
}

?>
