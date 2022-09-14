    <?php include('php_code.php'); ?>

    <?php 
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $update = true;
            $record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

            if (count($record) == 1 ) {
                $n = mysqli_fetch_array($record);
                $name = $n['name'];
                $address = $n['address'];
            }
        }
    ?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: Create-Read, Update, Delete </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']); // msg de confirmation nouvelle entrée dans la BDD
            ?>
        </div>
    <?php endif ?> 

    <?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th colspan="2">ACTION</th>
            </tr>
        </thead>
        
        <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td>
                    <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
                </td>
                <td>
                    <a href="php_code.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

	<form method="post" action="php_code.php" >
		<div class="input-group">
			<label>Nom</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Addresse</label>
			<input type="text" name="address" value="<?php echo $address; ?>">
		</div>

        <input type="hidden" name="id" value="<?php echo $id; ?>">

		<div class="input-group">
        <?php if ($update == true): ?>
            <button class="btn" type="submit" name="update" style="background: #556B2F;" >Mettre à Jour</button>
        <?php else: ?>
            <button class="btn" type="submit" name="save" >Sauver</button>
        <?php endif ?>
		</div>

        
	</form>
</body>
</html>