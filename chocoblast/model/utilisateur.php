<?php
class Utilisateur {
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $password;
    private $image;
    private $statut = false;
    private $role = 1;

    public function __construct($nom, $prenom, $mail, $password) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->password = $password;
    }

    // les fameux  Getters  

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getImage() {
        return $this->image;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function getRole() {
        return $this->role;
    }

    //  les fameux Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }

    public function setRole($role) {
        $this->role = $role;
    }

// classe pour récuperer utilisateur à partir d'un mail
public function getUserByMail(PDO $pdo) {
    try {
        $mail = $this->getMail();

        $req = $pdo->prepare("SELECT * FROM utilisateur WHERE mail_utilisateur = ?");
        $req->bindParam(1, $mail, PDO::PARAM_STR);
        $req->execute();

        $data = $req->fetchAll();
        return $data;
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
    //methode pour ajouter un utilisateur à la bdd
    public function insertUser($bdd, $role) {
        try {
            $nom = $this->getNom();
            $prenom = $this->getPrenom();
            $mail = $this->getMail();
            $password = $this->getPassword();
            $img = $this->getImage();
            $statut = $this->getStatut();
            $req = $bdd->prepare("INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur, image_utilisateur, statut_utilisateur) VALUES(?, ?, ?, ?, ?, ?)");
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->bindParam(2, $prenom, PDO::PARAM_STR);
            $req->bindParam(3, $mail, PDO::PARAM_STR);
            $req->bindParam(4, $password, PDO::PARAM_STR);
            $req->bindParam(5, $img, PDO::PARAM_STR);
            $req->bindParam(6, $statut, PDO::PARAM_STR);
            $req->execute();
            return true;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    
 //methode pour mettre ajour le statut utilisateur
 public function activeUser($bdd, $id_utilisateur) {
    try {
        $req = $bdd->prepare('UPDATE utilisateurs SET statut_utilisateur = 1 WHERE id_utilisateur = ?');
        $req->bindParam(1, $id_utilisateur, PDO::PARAM_STR);
        $req->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}



}

?>