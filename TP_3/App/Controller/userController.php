<?php
require_once 'app/Models/User.php';
session_start();

class UserController {
    public static function doLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            // Vérifier si l'utilisateur existe
            $user = User::findByEmail($email);
            if (!$user) {
                echo "Cet utilisateur n'existe pas.";
                return;
            }

            // Vérifier si le mot de passe est correct
            if (!password_verify($password, $user['password'])) {
                echo "Mot de passe incorrect.";
                return;
            }

            // Connexion réussie → Création de session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
        }
    }

    public static function logout() {
        session_start();
        session_destroy();
        header('Location: /login');
        exit();
    }
}
?>