<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste des Plats</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>

    <?php
    require_once 'config/connexion.php';

    $reponse = $bdd->query('SELECT * FROM plat');  // Requête SQL : On récupère tout le contenu de la table jeux_video

    // On affiche chaque entrée une à une avec une boucle
    while ($donnees = $reponse->fetch())
    {
      ?>
    <div class="listePlat">
        <h3> <?php echo $donnees['nom']; ?> <span> <?php echo $donnees['prix']; ?> € </span> </h3>
        <img src="<?php echo $donnees['image']; ?>" alt="image Plat">
    </div>
      <?php
    }

    $reponse->closeCursor();




    ?>
  </body>
</html>
