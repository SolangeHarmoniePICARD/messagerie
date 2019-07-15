<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Messagerie</title>
    <meta name="author" lang="fr" content="Solange Harmonie PICARD">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" type="image/png" href="paper-plane.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
    <div class="container min-vh-100 d-flex flex-column align-content-center">
     <div class="row flex-grow-1 d-flex justify-content-center align-items-center">
       <div class="col-12 col-md-4">
         <div class="card center-block">
           <div class="card-header">
             <h3 class="text-center text-primary font-weight-bold">Messagerie</h3>
           </div>
           <div class="card-body">
             <div class="form-group">
               <form action="function.php" method="post">
                 <p>
                   <label for="pseudo">Pseudo : </label>
                   <input style="width: 100%;" type="text" name="pseudo" placeholder="Votre pseudo."  value=<?php if (isset($_COOKIE['pseudo'])){ echo $_COOKIE['pseudo'}; ?>>
                  </p>
                  <p>
                    <label for="message">Message : </label>
                    <textarea style="width: 100%;" type="text" name="message" rows="4"></textarea>
                  </p>
                <input style="width: 100%;" type="submit" name="envoyer" class="btn btn-outline-primary btn-lg btn-block" value="Envoyer">
              </form>
            </div>

            <div class="card-header">
              <h5 class="text-center text-primary font-weight-bold">Messages :</h5>
            </div>
            <div class="card-body">
              <?php

                // Récupération des 10 derniers messages
                $reponse = $bdd->query('SELECT pseudo, message, date_creation FROM mini_chat ORDER BY ID DESC LIMIT 0, 50');

                // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
                while ($donnees = $reponse->fetch()){
                	echo '<p>' . htmlspecialchars(date("j/n/Y G:i", strtotime($donnees["date_creation"]))) . ' - <strong> ' . htmlspecialchars($donnees['pseudo']) . '</strong> : <br>' . htmlspecialchars($donnees['message']) . '</p>';
                }

                $reponse->closeCursor();

              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>
