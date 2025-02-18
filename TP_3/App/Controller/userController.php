<?php
require_once __DIR__ . '/../Models/user.php';

class userController {
    public static function doRegister() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            // Création de l'utilisateur
            $result = User::create($name, $email, $password);

            if ($result) {
                header('Location: /'); // Redirection après inscription réussie
                exit();
            } else {
                echo "❌ Erreur lors de l'inscription.";
            }
        } else {
            require_once '../views/register.php'; // Charger le formulaire si GET
        }
    }
}
?>