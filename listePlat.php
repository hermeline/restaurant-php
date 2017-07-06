<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste des Plats</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>
    <div class="container list">
      <h1>Liste des plats</h1>
      <div class="resultat">
          <?php
          require_once 'config/connexion.php';

          $reponse = $bdd->query('SELECT * FROM plat');  // Requête SQL : On récupère tout le contenu de la table plat

          // On affiche chaque entrée une à une avec une boucle
          while ($donnees = $reponse->fetch())
          {
            ?>
            <div class="listePlat">
                <h3> <?php echo $donnees['nom']; ?> <span> <?php echo $donnees['prix']; ?> € </span> </h3>
                <img src="<?php echo $donnees['image']; ?>" alt="image Plat">
                <a class="btnmodif" href="modifier.php?id=<?php echo $donnees['id']; ?>">Modifier ce plat</a>
                <a class="btnmodif supp" href="supprimer.php?id=<?php echo $donnees['id']; ?>">Supprimer ce plat</a>
            </div>
            <?php
          }
          $reponse->closeCursor();
          ?>

        </div>
    </div>
  </body>
</html>
