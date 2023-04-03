<?php
// Inclut les classes nécessaires
//include './model/utilisateur.php';
//include './manager/ManagerUtilisateur.php';

// Initialise les variables
$users = [];
$searchTerm = '';
$noResult = false;

// Vérifie si l'utilisateur a soumis le formulaire de recherche
if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];

    // Recherche les utilisateurs correspondant au terme de recherche
    $managerUtilisateur = new ManagerUtilisateur();
    $users = $managerUtilisateur->selectByName($searchTerm);

    // Vérifie si aucun résultat n'a été trouvé
    $noResult = empty($users);
} else {
    // Charge tous les utilisateurs par défaut
    $managerUtilisateur = new ManagerUtilisateur();
    $users = $managerUtilisateur->getAllUsers();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Liste des utilisateurs</title>
    <style>
        <?php 
            include './asset/style/style.css'; 
        ?>
    </style>
</head>
<body>
    <header>
        
        <form action="" method="post">
            <label for="search">Rechercher par nom :</label>
            <input type="text" name="search" id="search" value="<?= htmlspecialchars($searchTerm) ?>">
            <button class="searchBtn" type="submit">Rechercher</button>
            <?php if (!empty($searchTerm)): ?>
                <a class="searchAnnul" href="">Annuler</a>
            <?php endif ?>
        </form>
    </header>
    <h1>Liste des utilisateurs</h1>
    <main>
        <table class="monTbleau">
            <thead>
                <tr>
                    <th id="colonne-nom">Nom</th>
                    <th id="colonne-prenom">Prénom</th>
                    <th id="colonne-email">Adresse e-mail</th>
                    <th>Gestion</th> <!-- Nouvelle colonne pour le bouton de suppression -->
                </tr>
            </thead>
            <tbody>
    <?php if (empty($users)): ?>
        <tr>
            <td colspan="4">Aucun utilisateur trouvé.</td>
        </tr>
    <?php else: ?>
        <?php foreach ($users as $user): ?>
    <tr>
        <td headers="colonne-nom" class="left-align" scope="row">
            <?php if ($user['image_utilisateur']): ?>
                <img src="<?= htmlspecialchars($user['image_utilisateur']) ?>" alt="Image de profil de <?= htmlspecialchars($user['nom_utilisateur']) ?>">
            <?php else: ?>
                <img src="./asset/images/defaut.png" alt="Image de profil par défaut">
            <?php endif ?>
            <?= htmlspecialchars($user['nom_utilisateur']) ?>
        </td>
        <td headers="colonne-prenom"><?= htmlspecialchars($user['prenom_utilisateur']) ?></td>
        <td headers="colonne-email"><?= htmlspecialchars($user['mail_utilisateur']) ?></td>
        <td>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $user['id_utilisateur'] ?>">
                <input type="hidden" name="action" value="delete">
                <button class="deleteBtn" type="submit" name="delete">Supprimer</button>
            </form>
        </td>
    </tr>
<?php endforeach ?>

    <?php endif ?>
</tbody>


        </table>
        <?php if ($noResult): ?>
            <p>Aucun utilisateur trouvé pour la recherche : <?= htmlspecialchars($searchTerm) ?></p>
        <?php endif ?>

        <?php 
      // vérification si une suppression a été demandée
      if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        // suppression de l'utilisateur correspondant à l'ID
        $managerUtilisateur = new ManagerUtilisateur();
        $managerUtilisateur->deleteById($id);

        // redirection vers la page de liste des utilisateurs
        // header('Location: ./view/view_list_user.php');
        // exit();
    }
    ?>
</main>
</body>
</html>
