<?php
namespace App\Models;
use Config\Database;
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

    public function addMember($username, $email, $password, $role) {
        // if (empty($username) || empty($email) || empty($password) || empty($role)) {
        //     throw new \Exception("Tous les champs sont obligatoires.");
        // }

        // if (!$this->isValidEmail($email)) {
        //     throw new \Exception("Format d'email invalide.");
        // }

        // if ($this->emailExists($email)) {
        //     throw new \Exception("Un compte avec cet email existe déjà.");
        // }

        $hashedPassword = $this->hashPassword($password);
        $query = "INSERT INTO users (username,email, password,role )
        VALUES (:username,:email, :password, :role );";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);
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
            if ($user && password_verify($password, $user['password'])) {
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
