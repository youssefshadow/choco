<?php
include './manager/ManagerUtilisateur.php';

$managerUtilisateur = new ManagerUtilisateur();

// vérification si une suppression a été demandée
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

 
    $managerUtilisateur->deleteById($id);

    // redirection vers la page de liste des utilisateurs
    // header('Location: ./view/view_list_user.php');
    // exit();
}
