<?php
session_start();
$nomMenu = htmlspecialchars($_POST['nomMenu']);
$_SESSION['nomMenu']= $nomMenu;
$prixMenu = htmlspecialchars($_POST['prixMenu']);
$_SESSION['prixMenu']= $prixMenu;
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Composez votre menu</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>

    <form class="choixPlat" action="traitementMenu.php" method="post">

    <?php
    require_once 'config/connexion.php';

    $reponse = $bdd->query('SELECT * FROM plat'); // Récup des données de la table plat

    // On affiche chaque entrée une à une avec une boucle
    while ($donnees = $reponse->fetch())
    {
      ?>

          <div class="listePlat">
              <input type="checkbox" name="choixPlat" value="<?php $donnees['id']; ?>" id="choixPlat">
                  <label for="choixPlat">
                      <h3> <?php echo $donnees['nom']; ?></h3>  <img class="imgChoix" src="<?php echo $donnees['image']; ?>" alt="image Plat">
                  </label>
          </div>

      <?php
          }
          $reponse->closeCursor();
      ?>

        <input type="submit" name="envoiMenu" value="Créer Menu">

    </form>

  </body>
</html>
