<?php
require_once './model/utilisateur.php';
require './manager/ManagerUtilisateur.php';
//include './controller/delete_user.php';

// création de l'objet ManagerUtilisateur
$managerUtilisateur = new ManagerUtilisateur();

// vérification si une suppression a été demandée
if (isset($_POST['Supprimer'])) {
    $id = $_POST['id'];

    // suppression de l'utilisateur correspondant à l'ID
    $managerUtilisateur->deleteById($id);

    // redirection vers la page de liste des utilisateurs
    header('Location: ./');
    exit();
}

// initialisation des variables
$users = [];
$searchTerm = '';

// si une recherche est effectuée
if (isset($_POST['search'])) {
    // récupérer le terme de recherche
    $searchTerm = $_POST['search'];

    // chercher les utilisateurs correspondant au terme de recherche
    $result = $managerUtilisateur->selectByName($searchTerm);
} else {
    // sinon, afficher tous les utilisateurs
    $result = $managerUtilisateur->getAllUsers();
}

// création d'un tableau d'objets Utilisateur à partir des résultats
foreach ($result as $row) {
    $user = new Utilisateur($row['nom_utilisateur'], $row['prenom_utilisateur'], $row['mail_utilisateur'], $row['password_utilisateur']);
    $user->setImage($row['image_utilisateur']);
    $user->setStatut($row['statut_utilisateur']);
    $user->setId($row['id_utilisateur']);
    $users[] = $user;
}

// inclure la vue
include './view/view_list_user.php';
