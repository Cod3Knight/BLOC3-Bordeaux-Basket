<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bordeaux-basket</title>
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="icon" type="img/png" href="images/logo.png">
</head>
<body>
    <!-- header  -->
    <?php include("header.php"); ?>
    <main>
        <div class="container">
            <div class="part">
                <div class="text">
                    <h1>Bienvenue</h1>
                    <p>Site officiel de BORDEAUX BASTIDE BASKET</p>
                </div>
                <img class="basket_illu" src="images/test.svg" alt="photo_team">
            </div>
        </div>
        <div class="club"> 
            <div class="illust">
                <img src="images/lion.svg" alt="">
            </div>
            <div class="text">
                    <h2>Le club</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla expedita voluptas odio neque voluptate!</p>
            </div>
        </div>
        <div class="partenaires">
            <h3>Nos partenaires</h3>
            <ul>
                <li><img src="images/part1.jpeg" alt=""></li>
                <li><img src="images/part2.jpeg" alt=""></li>
                <li><img src="images/part3.png" alt=""></li>
                <li><img src="images/part4.jpeg" alt=""></li>
                <li><img src="images/part5.jpeg" alt=""></li>
            </ul>
        </div>
    </main>
    <!-- footer -->
    <?php include("footer.php"); ?>
</body>
</html>