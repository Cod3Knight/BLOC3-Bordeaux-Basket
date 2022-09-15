<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bordeaux-basket</title>
    <!-- css -->
    <link rel="stylesheet" href="css/contact.css">
    <!-- icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="icon" type="img/png" href="images/logo.png">
</head>
<body>
    <!-- header  -->
    <?php include("header.php"); ?>
    <div class="aaaa">
        <h1>Formulaire de contact</h1>
        <form >
            <label for="fname">Nom & prénom</label>
            <input type="text" id="fname" name="firstname" placeholder="Votre nom et prénom">
            <label for="sujet">Sujet</label>
            <input type="text" id="sujet" name="sujet" placeholder="L'objet de votre message">
            <label for="emailAddress">Email</label>
            <input id="emailAddress" type="email" name="email" placeholder="Votre email">
            <label for="subject">Message</label>
            <textarea id="subject" name="subject" placeholder="Votre message" style="height:200px"></textarea>
            <input type="submit" value="Envoyer">
        </form>
</div>
  <!-- footer -->
  <?php include("footer.php"); ?>
</body>
</html>
