<?php
require_once('./model/categorieModel.php');

// Affiche la liste des catégories
function index() {
    $categories = getAllCategories();
    if ($categories === false) {
        die("Erreur : Impossible de récupérer les catégories.");
    }
    require_once './view/categorie/list.php';
}

// Affiche le formulaire pour ajouter une catégorie
function pageAdd() {
    require_once './view/categorie/add.php'; // Charge la vue pour ajouter une catégorie
}

// Sauvegarde une nouvelle catégorie
function save() {
    if (isset($_POST['libelle'])) {
        $libelle = htmlspecialchars(trim($_POST['libelle'])); // Nettoie les données
        addCategorie($libelle); // Ajoute la catégorie dans la base
        header('Location: index.php?controller=categorie'); // Redirection vers la liste
    } else {
        die("Erreur : Données invalides pour l'ajout.");
    }
}

// Supprime une catégorie en fonction de son ID
function remove() {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        deleteCategorie($id); // Supprime la catégorie
        header('Location: index.php?controller=categorie'); // Redirection vers la liste
    } else {
        die("Erreur : ID invalide pour la suppression.");
    }
}


