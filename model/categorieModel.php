<?php
require_once 'db.php';

/**
 * Récupère toutes les catégories de la base de données
 * 
 * @return resource $result Le résultat de la requête SQL
 * @throws Exception Si la connexion échoue ou si la requête échoue
 */
function getAllCategories() {
    global $connexion;

    if (!$connexion) {
        throw new Exception("Erreur de connexion à la base de données.");
    }

    $sql = "SELECT * FROM categories";
    $result = pg_query($connexion, $sql);
    
    if (!$result) {
        throw new Exception("Erreur dans la récupération des catégories : " . pg_last_error($connexion));
    }

    return $result;
}

/**
 * Ajoute une nouvelle catégorie dans la base de données
 * 
 * @param string $libelle Le libellé de la catégorie
 * @return bool $result Le résultat de l'exécution de la requête
 * @throws Exception Si la requête échoue
 */
function addCategorie($libelle) {
    global $connexion;

    if (!$connexion) {
        throw new Exception("Erreur de connexion à la base de données.");
    }

    $sql = "INSERT INTO categories (libelle) VALUES ($1)";
    $result = pg_query_params($connexion, $sql, array($libelle));

    if (!$result) {
        throw new Exception("Erreur dans l'ajout de la catégorie : " . pg_last_error($connexion));
    }

    return $result;
}

/**
 * Supprime une catégorie par ID
 * 
 * @param int $id L'ID de la catégorie à supprimer
 * @return bool $result Le résultat de l'exécution de la requête
 * @throws Exception Si la requête échoue
 */
function deleteCategorie($id) {
    global $connexion;

    if (!$connexion) {
        throw new Exception("Erreur de connexion à la base de données.");
    }

    $sql = "DELETE FROM categories WHERE id = $1";
    $result = pg_query_params($connexion, $sql, array($id));

    if (!$result) {
        throw new Exception("Erreur dans la suppression de la catégorie : " . pg_last_error($connexion));
    }

    return $result;
}

/**
 * Récupère une catégorie par son ID
 * 
 * @param int $id L'ID de la catégorie à récupérer
 * @return array|null Les informations de la catégorie ou null si non trouvée
 * @throws Exception Si la requête échoue
 */
function getCategorieById($id) {
    global $connexion;

    if (!$connexion) {
        throw new Exception("Erreur de connexion à la base de données.");
    }

    $sql = "SELECT * FROM categories WHERE id = $1";
    $result = pg_query_params($connexion, $sql, array($id));

    if (!$result) {
        throw new Exception("Erreur dans la récupération de la catégorie : " . pg_last_error($connexion));
    }

    // Retourner la catégorie si elle existe, sinon retourner null
    return pg_num_rows($result) > 0 ? pg_fetch_assoc($result) : null;
}

?>


