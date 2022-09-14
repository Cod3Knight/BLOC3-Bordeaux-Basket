<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', 'root', 'crud');

	// initialise les variables
	$name = "name";
	$address = "address";
	$id = 0;
	$update = false;
    // fin initialisation
    
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')"); 
		$_SESSION['message'] = "Informations Sauvegardées !"; 
		header('location: index.php');
	}
//  --------PARTIE CREATE DU CRUD FINIE !!!-------

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
    
        mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
        $_SESSION['message'] = "Informations mises à jours!"; 
        header('location: index.php');
    }

// --------PARTIE UPDATE DU CRUD FINIE !!!-------

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM info WHERE id=$id");
        $_SESSION['message'] = "Informations effacées!"; 
        header('location: index.php');
    }

//  --------PARTIE DELETE DU CRUD FINIE !!!-------