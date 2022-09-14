<?php 
include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "Connectez vous en premier";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
?>

<?php
// On inclut la connection à la base
	require_once('connect.php');

	$sql = 'SELECT * FROM `admin_users`';

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
<html>
<head>
	<title>PAGE ADMIN</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
	.header {
		background: #008000;
	}
	</style>
</head>
<body>
	<div class="header">
		<h2>ADMIN - PAGE D'ADMIN</h2>
	</div>
	<div class="content">

		<!-- notification message -->
	<?php if (isset($_SESSION['success'])) : ?>
		<div class="erreur success" >
			<h3>
				<?php 
					echo $_SESSION['success']; 
					unset($_SESSION['success']);
				?>
			</h3>
		</div>
	<?php endif ?>

		<!-- info user connecté -->
	<div class="profile_info">
		<img src="../images/admin_profile.png"  >

		<div>
			<?php  if (isset($_SESSION['user'])) : ?>
				<strong><?php echo $_SESSION['user']['username']; ?></strong>

				<small>
					<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
					<br>
					<a href="home.php?logout='1'" style="color: red;">DECONNECTION</a>
                    &nbsp; <a href="create_user.php"> + AJOUTER USER</a>
				</small>

			<?php endif ?>
		</div>
	</div>


	<main class="container">
        <div class="row">
            <section class="col-12">
                <table class="table">
                    <h1>Liste des Users</h1>
                    <thead>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>UserType</th>
                        <th>Password</th>
                        <th>DateCreated</th>
                        <th>DateModified</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php
                        // On fait une boucle sur la variable result, je pioche mes données et je fais un echo
                        foreach($result as $admin_users){
                        ?>
                            <tr>
                                <td><?= $admin_users['id'] ?></td>
                                <td><?= $admin_users['username'] ?></td> 
                                <td><?= $admin_users['email'] ?></td>
                                <td><?= $admin_users['user_type'] ?></td>
                                <td><?= $admin_users['password'] ?></td>
                                <td><?= $admin_users['date_created'] ?></td>
                                <td><?= $admin_users['date_modified'] ?></td>
                                <td><a href="details.php?id=<?= $users['id'] ?>">Editer</a></td> 
                                <td><a href="details.php?id=<?= $users['id'] ?>">Effacer</a></td> 
                            </tr>
                        <?php // Fabrication d'un lien en temps reel qui communique avc l' ID
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>
</html>