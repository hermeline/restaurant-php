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

          // On affiche chaque entrée une à une dans une div différente grâce une boucle
          while ($donnees = $reponse->fetch())
          {
            ?>
            <div class="listePlat">
                <h3> <?php echo $donnees['nom']; ?> <span> <?php echo $donnees['prix']; ?> € </span> </h3>
                <img src="<?php echo $donnees['image']; ?>" alt="image Plat">
                <!-- Liens pour modifier et pour supprimer le Menu en insérant l'id du menu dans l'url pour pouvoir ensuite le récupérer en GET -->
                <a class="btnmodif" href="modifierPlat.php?id=<?php echo $donnees['id']; ?>">Modifier ce plat</a>
                <a class="btnmodif supp" href="supprimerPlat.php?id=<?php echo $donnees['id']; ?>">Supprimer ce plat</a>
            </div>
            <?php
          }
          $reponse->closeCursor();
          ?>

        </div>
    </div>
  </body>
</html>
