<?php 
session_start();

// connection à la BDD
$db = mysqli_connect('localhost', 'root', 'root', 'gestion');

// declaration de variables
$username = "username";
$email    = "email";
$user_type = "user_type";
$errors   = array(); 

// appeller la fonction register () si register_btn est cliqué
if (isset($_POST['register_btn'])) {
	register();
}

// ENREGISTRER USER
function register(){
	// appelez ces variables avec le mot-clé global pour les rendre disponibles dans la fonction
	global $db, $errors, $username, $email, $user_type;

	// recevoir toutes les valeurs d'entrée du formulaire. 
    // Appelez la fonction e()
	$username = e($_POST['username']);
	$email = e($_POST['email']);
	$user_type = e($_POST['user_type']);
	$password = e($_POST['password']);
	

	// validation formulaire: s'assurer que le formulaire est correctement rempli
	if (empty($username)) { 
		array_push($errors, "Username est requis"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email est requis"); 
	}
	if (empty($password)) { 
		array_push($errors, "Password est requis"); 
	}

	// enregistrer l'utilisateur s'il n'y a pas d'erreurs
	if (count($errors) == 0) {
		$password = md5($password);// crypter le mot de passe avant de l'enregistrer dans la BDD

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO admin_users (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "Nouvel utilisateur bien créer!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO admin_users (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);

			// recuperer l'ID de l'utilisateur créé
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // passer l'user connecté en session
			$_SESSION['success']  = "Tu est maintenant connecté";
			header('location: index.php');				
		}
	}
}

// renvoie le tableau des utilisateurs à partir de leur identifiant
function getUserById($id){
	global $db;
	$query = "SELECT * FROM admin_users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string '\\'
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

//  déconnecter l'user "on-click"
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// appeler la fonction login() si register_btn est cliqué
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// sasir les valeurs
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// on s'assure que le FORMULAIRE est bien rempli
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// essai de CONNECTION si aucune erreur sur le FORMULAIRE
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM admin_users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user trouvé
			// vérifier si l'utilisateur est administrateur ou utilisateur
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
?>
