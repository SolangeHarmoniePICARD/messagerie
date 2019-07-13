<?php
//Je me connecte à la base de donnée
try {
  $bdd = new PDO('mysql:host=*****;dbname=*****;charset=utf8', '*****', '*****', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

} catch (\Exception $e) {
  die('Erreur : '.$e->getMessage());
}
?>
