<?php
// Inclure le fichier de connexion à la base de données
require_once('./model/db.php');

// Fonction pour récupérer tous les produits
function getAll() {
    global $connexion;
    // Requête SQL avec jointure pour obtenir les produits et leur catégorie
    $sql = "SELECT p.id, p.nom, p.description, p.prix, p.quantite, c.libelle AS categorie
            FROM products p 
            LEFT JOIN categories c ON p.id_categorie = c.id";
    
    // Exécution de la requête et vérification des erreurs
    $result = pg_query($connexion, $sql);
    if (!$result) {
        die("Erreur dans l'exécution de la requête : " . pg_last_error($connexion));
    }

    return $result;
}

// Fonction pour supprimer un produit
function delete($id) {
    global $connexion;
    // Sécuriser l'ID du produit
    $id = intval($id);
    
    // Requête SQL pour supprimer un produit
    $sql = "DELETE FROM products WHERE id = $1";
    $result = pg_query_params($connexion, $sql, array($id));
    
    // Vérification du résultat
    if (!$result) {
        die("Erreur lors de la suppression du produit : " . pg_last_error($connexion));
    }

    return $result;
}

// Fonction pour ajouter un produit
function add($libelle, $quantite, $prix, $id_categorie) {
    global $connexion;

    // Sécurisation des entrées utilisateur
    $libelle = htmlspecialchars(trim($libelle));
    $quantite = intval($quantite);
    $prix = floatval($prix);
    $id_categorie = intval($id_categorie);  // Assurer que l'ID de la catégorie est valide

    // Requête SQL pour insérer un nouveau produit
    $sql = "INSERT INTO products (nom, description, prix, quantite, id_categorie) 
            VALUES ($1, 'Description', $2, $3, $4)";
    
    // Exécution de la requête avec sécurisation des paramètres
    $result = pg_query_params($connexion, $sql, array($libelle, $prix, $quantite, $id_categorie));

    // Vérification du résultat
    if (!$result) {
        die("Erreur lors de l'ajout du produit : " . pg_last_error($connexion));
    }

    return $result;
}

// Fonction pour récupérer un produit par son ID
function getProduitById($id) {
    global $connexion;
    $id = intval($id);

    // Requête SQL pour récupérer un produit par son ID
    $sql = "SELECT * FROM products WHERE id = $1";
    $result = pg_query_params($connexion, $sql, array($id));

    // Vérification du résultat
    if (!$result) {
        die("Erreur lors de la récupération du produit : " . pg_last_error($connexion));
    }

    // Retourner les données du produit si elles existent
    return pg_fetch_assoc($result);
}
?>
