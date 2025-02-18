<?php
require_once '../App/Controller/userController.php';

// Nettoyage de l'URL (supprimer les paramètres GET si présents)
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

if ($request_uri == '/register') {
    userController::doRegister();
}
?>