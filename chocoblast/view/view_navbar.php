<style>
    <?php 
        include './asset/style/style.css'; 
    ?>
</style>
<script>
     <?php 
      include './asset/script/script.js';
    ?>
</script>


<?php
    //test si l'utilisateur est connecté
    if(isset($_SESSION['connected'])){
?>
    <body>
        <!--Menu navbar Connnecté -->
        <nav>
            <a class="logo" href="./"><img src="https://img.icons8.com/clouds/100/null/laptop.png"/></a>
            <span><a href="./">Accueil</a></span>
            <span><a href="./createArticle">Ajouter un rat 🐭</a></span>
            <span><a href="./createArticleCode">Ajouter Un Chocoblast</a></span>
            <span><a href="./deconexion">Déconnexion</a></li>
          
        </nav>
<?php
    }
    //test si l'utilisateur est déconnecté
    else{
?>
    <body>
        <!--Menu navbar Déconnecté-->
        <nav>
        <a class="logo" href="./"><img src="https://img.icons8.com/clouds/100/null/laptop.png"/></a>
            <span><a href="./">Accueil</a></span>
            <span><a href="./createUser">Ajouter utilisateur</a></span>
            <span><a href="./connexion">Connexion</a></span>
           
        </nav>
<?php
    }
?>