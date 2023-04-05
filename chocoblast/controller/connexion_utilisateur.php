<?php
 include './model/utilisateur.php';
 include './manager/ManagerUtilisateur.php';
 include './view/view_navbar.php';


    // Vérifie si la session est déjà active avant de la démarrer
    // if (session_status() == PHP_SESSION_NONE) {
    //     session_start();
    // }

    // Créer un nouvel objet de connexion à la base de données
    $connexion = new Connexion();
    $bdd = $connexion->connexion();

    // Si le formulaire est soumis
    if (isset($_POST['connexion'])) {
        $mail = CleanInput( $_POST['mail']);
        $password = CleanInput($_POST['password']);

        // Récupération de l'utilisateur correspondant au mail
        $user = new Utilisateur('', '', $mail, $password,'');
        $result = $user->getUserByMail($bdd);

        if (count($result) == 1) { // Si l'utilisateur est trouvé
            $db_password = $result[0]['password_utilisateur'];
            if (password_verify($password, $db_password)) { // Si le mot de passe est correct

                // Enregistrement des données utilisateur dans la session
                $_SESSION['connected'] = true;
                $_SESSION['id'] = $result[0]['id_utilisateur'];
                $_SESSION['nom'] = $result[0]['nom_utilisateur'];
                $_SESSION['prenom'] = $result[0]['prenom_utilisateur'];
                $_SESSION['mail'] = $result[0]['mail_utilisateur'];

                // Redirection vers la page d'accueil
                header('Location: ./home');
                exit();
            } else {
                echo '<h1>Mot de passe incorrect.</h1>';
                //version sécurisé:
                //echo '<h1>mot de passe ou idientifiant incorrect .</h1>';
            }
        } else {
            echo '<h1>Aucun utilisateur trouvé pour ce mail.</h1>';
            //version sécurisé:
            //echo '<h1>mot de passe ou idientifiant incorrect .</h1>';
            
        }
    }

    $message ="";
   
    
    // include './view/view_navbar.php';
    // include './view/view_connexion.php';
    include './view/view_connexion.php';

    function cleanInput($input){
        return htmlspecialchars(strip_tags(trim($input)));
    }
?>
