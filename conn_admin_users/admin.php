<?php

// On inclut la connection à la base
require_once('connect.php');

$sql = 'SELECT * FROM `etudiant`';

// On prépare la requete
$query = $db->prepare($sql);

// On execute la requête
$query->execute();

/* On stocke le resultat dans un tableau associatif,  
JUSTE LES INFO AVEC LES TITRES DES COLONNES ->(PDO::FETCH_ASSOC) */
$result = $query->fetchAll(PDO::FETCH_ASSOC);

//var_dump ($result);

require_once('close.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <table class="table">
                    <h1>Liste des Users</h1>
                    <thead>
                        <th>ID</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Email</th>
                        <th>Birthdate</th>
                        <th>Password</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                        // On fait une boucle sur la variable result, je pioche mes données et je fais un echo
                        foreach($result as $users){
                        ?>
                            <tr>
                                <td><?= $users['id'] ?></td>
                                <td><?= $users['lastname'] ?></td> 
                                <td><?= $users['firstname'] ?></td>
                                <td><?= $users['email'] ?></td>
                                <td><?= $users['birth_date'] ?></td>
                                <td><?= $users['password'] ?></td>
                                <td><?= $users['date_created'] ?></td>
                                <td><a href="details.php?id=<?= $users['id'] ?>">Let's Go</a></td> 
                            </tr>
                        <?php // Fabrication d'un lien en temps reel qui communique avc l' ID
                        }
                        ?>
                    </tbody>
                </table>
                <a href="add.php" class="btn btn-primary">Ajouter un user</a>
            </section>
        </div>
    </main>

</body>
</html>
