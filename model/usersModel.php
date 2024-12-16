<?php
require_once 'db.php';  // Assurez-vous que le fichier de connexion à la base de données est inclus

// Récupérer tous les utilisateurs
function getAllUsers() {
    global $connexion;
    $sql = "SELECT * FROM users";
    $result = pg_query($connexion, $sql);

    if (!$result) {
        die("Erreur dans l'exécution de la requête : " . pg_last_error($connexion));
    }

    return $result;
}

// Ajouter un utilisateur
function addUser($nom, $prenom, $email, $mot_de_passe) {
    global $connexion;
    $sql = "INSERT INTO users (nom, prenom, email, mot_de_passe) VALUES ($1, $2, $3, $4)";
    $result = pg_query_params($connexion, $sql, array($nom, $prenom, $email, $mot_de_passe));

    if (!$result) {
        die("Erreur dans l'exécution de la requête : " . pg_last_error($connexion));
    }

    return $result;
}
?>
