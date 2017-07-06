<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inscription plat</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>

    <div class="container">
      <div class="envoiOk">
        <p class="textEnvoiOk">
    <?php
    try{
        require_once('config/connexion.php');


        $nomPlat = htmlspecialchars($_POST['nomPlat']);
        $prixPlat = htmlspecialchars($_POST['prixPlat']);
        $id= $_GET['id'];

        $req = $bdd->prepare('UPDATE plat SET nom = :newnom, prix = :newprix WHERE id = :id');
        $req->execute(array(
        	'newprix' => $prixPlat,
        	'newnom' => $nomPlat,
          'id' => $id,
        	));

        echo "Votre modification a bien été prise en compte !";
        $req->closeCursor();
    }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
    echo "La modification n'a pas été envoyée, merci de recommencer";
  }

  ?>
        </p>
        <a href="listePlat.php"> Voir les plats</a>
      </div>
    </div>
  </body>
</html>
