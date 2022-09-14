<?php
if(isset($_POST['lastname'])){ 
    /* Mise en place de variables de connection */
    $server = "localhost";
    $username = "root";
    $password = "root";
    
    /* Creation d'une connection a la bdd */
    $con = mysqli_connect($server, $username, $password, 'gestion');   

    /* Verifier la connection avc la bdd */
    if(!$con){
        die("Connection perdue " . mysqli_connect_error());
    }
     /*echo "Connecté avec succès";*/

     /* Collecter les variables POST */

     $lastname = $_POST['lastname'];
     $firstname = $_POST['firstname'];
     $email = $_POST['email'];
     $birthdate = $_POST['birthdate'];
     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
     $datecreated = date("Y-m-d H:i:s");
     $sql = "INSERT INTO `etudiant` (`lastname`, `firstname`, `email`, `birth_date`, `password`, `date_created`) VALUES ('". $lastname ."', '". $firstname ."', '". $email ."', '". $birthdate ."', '". $password ."', '". $datecreated ."');";
        /*echo $sql;*/

        /* Executer la requete, si sinon.. */
        if($con->query($sql) === true){
            $success = "Successfully inserted";
        } 
        else {
            $error = "ERROR: $sql <br> $con->error";
        }

        /* Fermer la base de donnée */
        $con->close();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription BBB</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>
    <div class="bbb">
        
    <h3><strong>Formulaire d'inscription - Bordeaux Basket Bastide -</strong></h3>

    <form class="container" action="#https://bordeaux-basket.fr/" method="post">

        <div class="mb-3">
            <label for="lastname" class="form-label"><strong>NOM</strong></label>
            <input type="text" id="lastname" class="form-control" name="lastname" placeholder="Entrez votre Nom">
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label"><strong>PRENOM</strong></label>
            <input type="text" id="firstname" class="form-control" name="firstname" placeholder="Entrez votre Prenom">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label"><strong>EMAIL</strong></label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Entrez votre Email">
        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label"><strong>DATE DE NAISSANCE</strong></label>
            <input type="birthdate" id="birthdate" class="form-control" name="birthdate" placeholder="Année - Mois - Jour">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"><strong>PASSWORD</strong></label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Entrez votre Mot de Passe">
        </div>
        <button type="submit" class="btn btn-primary" name="validate"><strong>S'inscrire</strong></button>
        <br><br>
        <a href="../gestion_etudiants/login.php"><p><strong>JE POSSEDE DEJA UN COMPTE, ME CONNECTER.</strong></p></a>

    </form>

    <?php /* Pop-up succès ou error message */
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