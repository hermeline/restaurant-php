<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste des Menus</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>
    <div class="container list">
      <h1>Nos Menus</h1>
      <div class="resultat">
          <?php
          require_once 'config/connexion.php';

        $reponse = $bdd->query('SELECT plat.image as plat_image, menu.nom as nom_menu, menu.prix as prix_menu  FROM plat, menu WHERE plat.id=menu.id_plat ');

          // On affiche chaque entrée une à une avec une boucle
          while ($donnees = $reponse->fetch())
          {
            ?>
            <div class="listePlat">
                <h3> Menu <?php echo $donnees['nom_menu']; ?> <span> <?php echo $donnees['prix_menu']; ?> € </span> </h3>
                <img src="<?php echo $donnees['plat_image']; ?>" alt="image Plat">
            </div>
            <?php
          }

          $reponse->closeCursor();
          ?>
        </div>
    </div>
  </body>
</html>
