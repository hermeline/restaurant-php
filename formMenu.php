<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire ajouter un Menu</title>
    <link rel="stylesheet" href="assets/style.css">
  </head>
  <body>
    <h1>Ajouter un nouveau menu :</h1>

    <form class="ajoutMenu" action="postMenu.php" method="post">
      <label for="nomMenu">Entrez le nom du Menu :</label>
      <input type="text" name="nomMenu" value="">

      <label for="prixMenu">Prix du Menu :</label>
      <input type="text" name="prixMenu" value=""> <span> € </span>

      <input type="submit" name="continuer" value="Continuer">
    </form>


  </body>
</html>
