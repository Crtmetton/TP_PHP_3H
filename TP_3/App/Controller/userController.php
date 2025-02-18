<?php
require_once 'app/Models/User.php';
session_start();

class UserController {
    public static function doLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);


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

    public static function doRegister() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (User::findByEmail($email)) {
                echo "Cet email est déjà utilisé.";
                return;
            }


            if (User::create($name, $email, $password)) {
                header('Location: /login');
                exit();
            } else {
                echo "Erreur lors de l'inscription.";
            }
        } else {
            require_once '../Views/register.php';
        }
    }
}
?>