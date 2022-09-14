<?php include('functions.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>- CONNECTION -</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>CONNECTION</h2>
	</div>
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">CONNECTION</button>
		</div>
		<p>
			Pas encore membre? <a href="register.php">Je m'inscris</a>
		</p>
	</form>
</body>
</html>