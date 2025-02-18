<?php
require_once 'config/database.php';

try {
    $db = Database::getInstance();
    echo "✅ Connexion réussie à MySQL !";

    // Test : récupérer les utilisateurs
    $stmt = $db->query("SELECT COUNT(*) as total FROM users");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "<br>Nombre d'utilisateurs : " . $result['total'];
} catch (Exception $e) {
    echo "❌ Erreur : " . $e->getMessage();
}
?>