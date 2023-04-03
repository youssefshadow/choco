<!-- partie affichage HTML -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Public/asset/style/main.css">
    <script src="../../Public/asset/script/script.js" defer></script>
    <title>connexion</title>
</head>
<body>
<style>
    <?php 
        include './asset/style/style.css'; 
    ?>
</style>
<?php
    ob_start();
?>
<h1>Connexion</h1>
<form action="" method="post" enctype="multipart/form-data">
    <label for="mail">Email :</label>
    <input type="email" id="mail" name="mail" autocomplete="off" required><br>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br>

    <input type="hidden" name="connexion" autocomplete="off" value="1">
    <input type="submit" name="submit" value="Connexion">
</form>


</body>
</html>