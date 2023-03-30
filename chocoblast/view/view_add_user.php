<!-- partie affichage HTML -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Public/asset/style/main.css">
    <script src="../../Public/asset/script/script.js" defer></script>
    <title>Inscription</title>
</head>
<body>
<style>
    <?php 
        include './asset/style/style.css'; 
    ?>
</style>

<h1>Créer Votre Compte</h1>
<form action="" method="post" enctype="multipart/form-data">
    <label for="nom_utilisateur">Nom :</label>
    <input type="text" id="nom_utilisateur" name="nom_utilisateur" required><br>

    <label for="prenom_utilisateur">Prénom :</label>
    <input type="text" id="prenom_utilisateur" name="prenom_utilisateur" required><br>

    <label for="mail_utilisateur">Email :</label>
    <input type="email" id="mail_utilisateur" name="mail_utilisateur" required><br>

    <label for="password_utilisateur">Mot de passe :</label>
    <input type="password" id="password_utilisateur" name="password_utilisateur" required><br>

    <label for="image_utilisateur">Image :</label>
    <input type="file" id="image_utilisateur" name="image_utilisateur"><br>

    <input type="submit" name="submit" value="Ajouter">
</form>


</body>
</html>