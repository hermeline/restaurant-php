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
          // Triple jointure, récupérant le nom + prix de la table + les noms des plats (concat)
          $reponse = $bdd->query('SELECT menu.id as id_du_menu, menu.nom as nom_menu, menu.prix as prix_menu, GROUP_CONCAT( plat.nom SEPARATOR " </br> ") AS concat_nomPlat FROM relation_menu_plat
          LEFT JOIN plat ON id_plat = plat.id
          LEFT JOIN menu ON id_menu = menu.id
          GROUP BY menu.id');

          // On affiche chaque entrée une à une avec une boucle
          while ($donnees = $reponse->fetch())
          {
            ?>
            <div class="listePlat">
                <h3> Menu <?php echo $donnees['nom_menu']; ?> <span> <?php echo $donnees['prix_menu']; ?> € </span> </h3>
                <p><?php echo $donnees['concat_nomPlat']; ?> </p>
                <!-- Liens pour modifier et pour supprimer le plat en insérant l'id du plat dans l'url pour pouvoir ensuite le récupérer en GET -->
                <a class="btnmodif" href="modifierMenu.php?id=<?php echo $donnees['id_du_menu']; ?>">Modifier ce menu</a>
                <a class="btnmodif supp" href="supprimerMenu.php?id=<?php echo $donnees['id_du_menu']; ?>">Supprimer ce menu</a>
            </div>
            <?php
          }

          $reponse->closeCursor();
          ?>
        </div>
    </div>
  </body>
</html>
