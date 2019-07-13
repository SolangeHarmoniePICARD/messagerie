<?php
// Conservation du pseudo
setcookie('pseudo',$_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
// Connexion à la bdd
try {
  $bdd = new PDO('mysql:*****;dbname=*****;charset=utf8', '*****', '*****', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

} catch (\Exception $e) {
  die('Erreur : '.$e->getMessage());
}
?>
