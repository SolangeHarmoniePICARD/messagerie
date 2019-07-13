<?php

include("connexion.php");

//je vérifie si mes champs sont vides
if (!empty($_POST['pseudo']) AND !empty($_POST['message'])) {

  //Je vérifie l'existance de mes champs
  if(isset($_POST['pseudo']) AND isset($_POST['message'])){

    //Je sécurise mes champs des failles XSS
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $message = htmlspecialchars($_POST['message']);

    //Je vérifie qu'il n'y a pas d'errers, puis je connecte à la bdd
    if (!isset($errors)) {

      //Insertion des informations dans la base de donnée avec une requet préparée pour se protéger des injections SQL
      $response = $bdd->prepare('INSERT INTO mini_chat(pseudo, message, date_creation) VALUES(?, ?, NOW())');
      $response->execute(array($pseudo,$message));

      //Je vérifie si l'insertion à bien fonctionnée
      if($response->rowCount() > 0){
        $success[] = 'Votre message a bien été enregistré !';
        header('Location: index.php');
      } else {
        $errors[] = 'Erreur veuillez ré-essayer plus tard';
        header('Location: index.php');
      }

    }

    //J'affiche mon message d'erreur s'il existe une erreur
    if(isset($errors)){
      foreach ($errors as $error) {
        echo $error;
        // code...
      }
    }else {
      // s'il n'y a pas d'erreur j'affiche mon message de success
      foreach ($success as $success_message) {
        echo $success_message;// code...
      }
    }
  }
}else {
  echo "Veuillez remplir vos champs !";
  header('Location: index.php');
}
?>
