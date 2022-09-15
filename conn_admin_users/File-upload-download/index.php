<?php include 'filesLogic.php';?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Chargement et téléchargement de fichiers</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data" >
          <h3>UPLOAD FICHIERS</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">UPLOAD</button>
        </form>
      </div>
    </div>
  </body>
</html>
