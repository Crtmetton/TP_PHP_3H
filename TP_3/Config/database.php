<?php
class Database {
    private static $instance = null;

    public static function getInstance() {
        if (self::$instance === null) {
            try {
                $host = 'localhost'; // Hôte MySQL
                $dbname = 'TP3'; // Nom de la base de données
                $username = 'root'; // Utilisateur MAMP (par défaut sous MAMP)
                $password = 'root'; // Mot de passe par défaut sous MAMP

                self::$instance = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
?>