<?php
    ob_start();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style/style.css">
    <title><?php echo $namePage ?></title>
</head>
<?php
    //test si l'utilisateur est connecté
    if(isset($_SESSION['connected'])){
?>
    <body>
        <!--Menu navbar Connnecté -->
        <nav>
            <span><a href="./">Accueil</a></span>
            <span><a href="./showAllArticle">Afficher article</a></span>
            <span><a href="./createArticle">Ajouter article</a></span>
            <span><a href="./createArticleCode">Ajouter article code</a></span>
            <span><a href="./createCategory">Ajouter catégorie</a></span>
            <span><img class="userPic"src="<?php echo $_SESSION['img']?>"></span>
            <span><a href="./deconnexion">Déconnexion</a></li>
        </nav>
<?php
    }
    //test si l'utilisateur est déconnecté
    else{
?>
    <body>
        <!--Menu navbar Déconnecté-->
        <nav>
            <span><a href="./">Accueil</a></span>
            <span><a href="./showAllArticle">Afficher article</a></span>
            <span><a href="./createUser">Ajouter utilisateur</a></span>
            <span><a href="./connexion">Connexion</a></span>
        </nav>
<?php
    }
    $header = ob_get_clean();
?>