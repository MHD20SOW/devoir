<?php
// Inclure le modèle qui gère les interactions avec la base de données
require_once('./model/produitModel.php');

// Affiche la liste des produits
function index() {
    // Récupérer tous les produits
    $produits = getAll();
    
    // Si la récupération échoue, afficher une erreur
    if (!$produits) {
        echo "Erreur dans la récupération des produits.";
        return;
    }

    // Inclure la vue pour afficher les produits
    require_once './view/produit/list.php';
}

// Fonction générique pour rediriger
function redirect($controller, $action) {
    header("Location: index.php?controller=$controller&action=$action");
    exit;
}

// Supprimer un produit
function remove() {
    // Vérifie si l'ID du produit est défini dans l'URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        
        // Appel de la fonction pour supprimer le produit
        if (delete($id)) {
            // Rediriger vers la liste des produits après la suppression
            redirect('produit', 'index');
        } else {
            echo "Erreur de suppression du produit.";
        }
    } else {
        echo "ID du produit invalide.";
    }
}

// Affiche le formulaire d'ajout d'un produit
function pageAdd() {
    // Inclure la vue pour ajouter un produit
    require_once './view/produit/add.php';
}

// Enregistrer un produit (ajout)
function save() {
    // Vérifie si tous les champs nécessaires sont présents
    if (isset($_POST['libelle'], $_POST['quantite'], $_POST['prix'], $_POST['id_categorie'])) {
        // Sécuriser et valider les données du formulaire
        $libelle = htmlspecialchars(trim($_POST['libelle']));
        $quantite = intval($_POST['quantite']);
        $prix = floatval($_POST['prix']);
        $id_categorie = intval($_POST['id_categorie']);  // Récupérer l'ID de la catégorie

        // Vérification de la validité des données
        if ($libelle && $quantite > 0 && $prix > 0 && $id_categorie > 0) {
            // Ajoute le produit à la base de données via le modèle
            if (add($libelle, $quantite, $prix, $id_categorie)) {
                // Redirige vers la liste des produits après l'ajout
                redirect('produit', 'index');
            } else {
                echo "Erreur lors de l'ajout du produit.";
            }
        } else {
            echo "Les données fournies sont invalides.";
        }
    } else {
        echo "Tous les champs doivent être remplis.";
    }
}

// Affiche le formulaire de modification d'un produit
function edit() {
    // Vérifie si l'ID du produit est défini dans l'URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        // Récupère les informations du produit
        $produit = getProduitById($id);
        
        // Si le produit n'est pas trouvé, afficher un message d'erreur
        if (!$produit) {
            echo "Produit non trouvé.";
            return;
        }
        
        // Inclure la vue pour modifier un produit
        require_once './view/produit/edit.php';
    } else {
        echo "ID du produit invalide.";
    }
}

// Enregistrer les modifications d'un produit
function update() {
    // Vérifie si les données du produit sont présentes dans le formulaire
    if (isset($_POST['id'], $_POST['libelle'], $_POST['quantite'], $_POST['prix'])) {
        // Récupère les données du formulaire et les sécurise
        $id = intval($_POST['id']);
        $libelle = htmlspecialchars(trim($_POST['libelle']));
        $quantite = intval($_POST['quantite']);
        $prix = floatval($_POST['prix']);

        // Validation des données avant la mise à jour
        if ($libelle && $quantite > 0 && $prix > 0) {
            // Appel de la fonction du modèle pour mettre à jour le produit
            if (updateProduit($id, $libelle, $quantite, $prix)) {
                // Redirige vers la liste des produits après la mise à jour
                redirect('produit', 'index');
            } else {
                echo "Erreur lors de la mise à jour du produit.";
            }
        } else {
            echo "Les données sont invalides.";
        }
    } else {
        echo "Les données du produit sont incomplètes.";
    }
}
?>
