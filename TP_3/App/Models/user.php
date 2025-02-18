<?php
require_once '../../config/database.php';

class User {
    public static function create($name, $email, $password) {
        $db = Database::getInstance();
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $success = $stmt->execute([$name, $email, $hashedPassword]);

        if (!$success) {
            var_dump($stmt->errorInfo()); // Affiche les erreurs SQL
            die();
        }

        return $success;
    }

    public static function findByEmail($email) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>