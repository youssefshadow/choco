<?php
//include '../model/utilisateur.php';


class ManagerUtilisateur {
    public function getAllUsers() {
        $bdd = Connexion::connexion();
        $req = $bdd->prepare("SELECT * FROM utilisateur");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    
    public function selectById($id) {
        $bdd = Connexion::connexion();
        $query = 'SELECT * FROM utilisateur WHERE id_utilisateur = :id';
        $stmt = $bdd->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function insert(Utilisateur $user) {
        $bdd = Connexion::connexion();
      
    }
    
    public function update(Utilisateur $user) {
        $bdd = Connexion::connexion();
      
    }
    
    public function delete(Utilisateur $user) {
        $bdd = Connexion::connexion();

    }
    public function deleteById($id) {
        $bdd = Connexion::connexion();
        $req = $bdd->prepare("DELETE FROM utilisateur WHERE id_utilisateur = ?");
        $req->execute(array($id));
    }
    public function selectByName($name) {
        $bdd = Connexion::connexion();
        $query = 'SELECT * FROM utilisateur WHERE nom_utilisateur LIKE :name ORDER BY nom_utilisateur';
        $stmt = $bdd->prepare($query);
        $stmt->bindValue(':name', "%$name%");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
}


    



// }
?>
