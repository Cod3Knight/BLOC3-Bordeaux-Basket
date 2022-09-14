<?php
	session_start();

	// connection à la BDD
	$conn = new mysqli("localhost", "root", "root", "user-accounts");

	// Check de la connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

    // on defini les constantes globales
	define ('ROOT_PATH', realpath(dirname(__FILE__))); // chemin vers le dossier racine
	define ('INCLUDE_PATH', realpath(dirname(__FILE__) . '/includes' )); // Chemin d'accès aux dossiers inclus
	define('BASE_URL', 'http://localhost/user-accounts/'); // l'URL d'accueil du site Web

	function getMultipleRecords($sql, $types = null, $params = []) {
		global $conn;
		$stmt = $conn->prepare($sql);
		if (!empty($params) && !empty($params)) { // les paramètres doivent exister avant d'appeler la méthode bind_param()

		  $stmt->bind_param($types, ...$params);
		}
		$stmt->execute();
		$result = $stmt->get_result();
		$user = $result->fetch_all(MYSQLI_ASSOC);
		$stmt->close();
		return $user;
	  }
	  function getSingleRecord($sql, $types, $params) {
		global $conn;
		$stmt = $conn->prepare($sql);
		$stmt->bind_param($types, ...$params);
		$stmt->execute();
		$result = $stmt->get_result();
		$user = $result->fetch_assoc();
		$stmt->close();
		return $user;
	  }
	  function modifyRecord($sql, $types, $params) {
		global $conn;
		$stmt = $conn->prepare($sql);
		$stmt->bind_param($types, ...$params);
		$result = $stmt->execute();
		$stmt->close();
		return $result;
	  }
?>