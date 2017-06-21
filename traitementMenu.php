    <?php
    session_start();
    $id_plat = $_POST['choixPlat'];
    $_SESSION['choixPlat']= $id_plat;

    require_once 'config/connexion.php';

    if (isset($_POST['choixPlat'])) {
        echo   $_POST['choixPlat'];
    }else {
      echo "marche pas";
    }
    // $req = $bdd->prepare('INSERT INTO menu(id_plat, nom, prix) VALUES(:id_plat, :nom, :prix)');
    // $req->execute(array(
    //   'id_plat' => $_SESSION['choixPlat'],
    //   'nom' => $_SESSION['nomMenu'],
    //   'prix' => $_SESSION['prixMenu'],
    // ));
    // $req->closeCursor();
    // ?>
