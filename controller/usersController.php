<?php
require_once('./model/usersModel.php');

// Affiche la liste des utilisateurs
function index() {
    $users = getAllUsers();
    require_once './view/users/list.php';  // Vue pour afficher la liste des utilisateurs
}

// Afficher la page d'ajout d'un utilisateur
function addUserController() {
    require_once './view/users/add.php';  // Formulaire pour ajouter un utilisateur
}

// Sauvegarder un utilisateur
function saveUser() {
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mot_de_passe'])) {
        $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

        if ($email) {
            if (addUser($nom, $prenom, $email, $mot_de_passe)) {
                header('Location: index.php?controller=users');
                exit;
            } else {
                echo "Erreur lors de l'ajout de l'utilisateur.";
            }
        } else {
            echo "L'email est invalide.";
        }
    } else {
        echo "Tous les champs doivent être remplis.";
    }
}
?>
