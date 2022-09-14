<?php 
include('functions.php'); 
?>

<html>
<head>
	<title>- INSCRIPTION -</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
	<h2>INSCRIPTION</h2>
</div>
<form method="post" action="register.php">
	<?php echo display_error(); ?>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">INSCRIPTION</button>
	</div>
	<p>
		Déjà membre? <a href="/conn_admin_users/login.php">Me Connecter</a>
	</p>
</form>
</body>
</html>
</form>