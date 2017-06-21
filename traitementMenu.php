<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Menu envoyé</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>
    <div class="container">
      <div class="envoiOk">
        <p class="textEnvoiOk">

          <?php
          session_start();
          $id_plat = $_POST['choixPlat'];
          $_SESSION['choixPlat']= $id_plat;

          require_once 'config/connexion.php';

          try
          {
              $req = $bdd->prepare('INSERT INTO menu(id_plat, nom, prix) VALUES(:id_plat, :nom, :prix)');
              $req->execute(array(
                'id_plat' => $_SESSION['choixPlat'],
                'nom' => $_SESSION['nomMenu'],
                'prix' => $_SESSION['prixMenu'],
              ));
              $req->closeCursor();
              echo "Menu bien envoyé !";
            }catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
                    echo "Votre menu n'a pas pu s'envoyer, merci de rééssayer ";
            }

          ?>
        </p>
        <a href="listeMenu.php"> Voir les Menus</a>
      </div>
    </div>
  </body>
</html>
