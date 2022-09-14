<?php
// Connection à la base de donnée
$conn = mysqli_connect('localhost', 'root', 'root', 'file_management');

// sélectionne toutes les informations sur les fichiers de la base de données 
// et les définit sur une variable de tableau appelée $files.
$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // si le bouton Enregistrer du formulaire est cliqué
    // nom de la page DL
    $filename = $_FILES['myfile']['name'];

    // destination du fichier dans le serveur
    $destination = 'uploads/' . $filename;

    // recup. l'extension de fichier
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // file physique sur un repo de téléchargement temporaire sur le serveur
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx', 'ppt', 'csv', 'txt', 'rar', 'gif', 'png', 'jpg'])) {
        echo "TON EXTENSION DOIT ETRE EN = .zip, .pdf .docx ou .csv";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // le fichier ne doit pas dépasser 1 Mégaoctet
        echo "Fichier trop volumineux!";
    } else {
        // déplacer le fichier téléchargé (temporaire) vers la destination spécifiée
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                echo "FICHIER UPLOADER AVEC SUCCES !";
            }
        } else {
            echo "Echec du DL du fichier.";
        }
    }
}

// TELECHARGEMENTS DE FICHIERS
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // récupérer le fichier à télécharger à partir de la BDD
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Compteur de DL +1
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}