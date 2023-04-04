<?php
//include './utils/connectBdd.php';
include './model/utilisateur.php';
include './manager/ManagerUtilisateur.php';
include './view/view_header.php';
include './view/view_navbar.php';
include './view/view_add_user.php';

// Create a new database connection object
$connexion = new Connexion();
$bdd = $connexion->connexion();


if(isset($_POST['submit'])){
  
    
    
    if(!empty($_POST['nom_utilisateur']) && !empty($_POST['prenom_utilisateur']) &&
        !empty($_POST['mail_utilisateur']) && !empty($_POST['password_utilisateur'])){
        
        
        $nom = cleanInput($_POST['nom_utilisateur']);
        $prenom = cleanInput($_POST['prenom_utilisateur']);
        $mail = cleanInput($_POST['mail_utilisateur']);
        $password = password_hash(cleanInput($_POST['password_utilisateur']), PASSWORD_DEFAULT);
        
        // Définir une image par défaut
        $emplacement = './asset/images/default.jpg';
        
        if(isset($_FILES['image_utilisateur']) && !empty($_FILES['image_utilisateur']['name'])) {
            $name = $_FILES['image_utilisateur']['name'];
            $tmpName = $_FILES['image_utilisateur']['tmp_name'];
            $size = $_FILES['image_utilisateur']['size'];
            $error = $_FILES['image_utilisateur']['error'];
            $emplacement = './asset/images/'.$name;
            move_uploaded_file($tmpName, $emplacement);
        } else {
            $emplacement = './asset/images/defaut.png';
        }
        
        
        
       
        $user = new Utilisateur($nom, $prenom, $mail, $password, $emplacement);
        
        $exist = $user->getUserByMail($bdd,$mail);
        
      
        if(empty($exist)){
            $inserted = $user->insertUser($bdd, $nom, $prenom, $mail, $password, $emplacement);
            $message = "<h1>Le compte $nom a été ajouté en BDD</h1>";
        } else {
            $message = "<h1>Le compte existe déjà</h1>";
        }
    } else {
        $message = "<h1>Veuillez remplir tous les champs du formulaire</h1>";
    }
} else {
    $message = "<h1>Pour ajouter un utilisateur veuillez cliquer sur Ajouter</h1>";
}

 //affichage des erreurs
 echo "<div class='message'>$message</div>";
 
function cleanInput($input){
    return htmlspecialchars(strip_tags(trim($input)));
}
?>
