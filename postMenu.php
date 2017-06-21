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
    <div class="container list">
      <h1>2eme étape : Ajoutez des plats</h1>
        <div class="resultat">
          <form class="choixPlat" action="traitementMenu.php" method="post">

                  <?php
                  require_once 'config/connexion.php';

                  $reponse = $bdd->query('SELECT * FROM plat'); // Récup des données de la table plat

                  // On affiche chaque entrée une à une avec une boucle
                  while ($donnees = $reponse->fetch())
                  {
                    ?>

                        <div class="listePlat">
                            <input type="checkbox" name="choixPlat" value="<?php echo $donnees['id']; ?>" id="choixPlat">
                                <label for="choixPlat">
                                    <h3> <?php echo $donnees['nom']; ?></h3>  <img class="imgChoix" src="<?php echo $donnees['image']; ?>" alt="image Plat">
                                </label>
                        </div>

                    <?php
                        }
                        $reponse->closeCursor();
                    ?>
                  <div class="btnMenu">
                    <input type="submit" name="envoiMenu" value="Créer Menu">
                  </div>
              </form>
            </div>
          </div>
  </body>
</html>
