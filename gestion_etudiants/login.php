<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire connection BBB</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>

    <div class="bbb">
        
        <h3><strong>Formulaire de Connection - Bordeaux Basket Bastide -</strong></h3>

        <form class="container" action="#https://bordeaux-basket.fr/" method="post">

            <div class="mb-3">
                <label for="firstname" class="form-label"><strong>PRENOM</strong></label>
                <input type="text" id="firstname" class="form-control" name="firstname" placeholder="Entrez votre Prenom">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><strong>EMAIL</strong></label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Entrez votre Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"><strong>PASSWORD</strong></label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Entrez votre Mot de Passe">
            </div>
            <button type="submit" class="btn btn-primary" name="validate"><strong>Me connecter</strong></button>
            <br>
            <a href="http://localhost/gestion_etudiants/accueil.php"><p><strong>JE N'AI PAS DE COMPTE, JE M' INSCRIS.</strong></p></a>

        </form>

        <?php /* Pop-up succ??s ou erreur message */
        if(isset($success)) {
            echo "<div class='success'>{$success}</div>";
            echo "<script>setTimeout(()=>{document.getElementsByClassName('success')[0].style.display ='none';},2000)</script> ";
        }
        if(isset($error)) {
            echo "<div class='error'>{$error}</div>";
            echo "<script>setTimeout(()=>{document.getElementsByClassName('error')[0].style.display ='none';},8000)</script> ";
        }
        ?>

        <script src="index.js"></script>
    </div>
</body>

</html>