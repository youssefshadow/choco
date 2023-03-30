<?php
  class Connexion {
   public static function connexion() {
       return $bdd = new PDO('mysql:host=localhost;dbname=choco', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
   }
}
?>
