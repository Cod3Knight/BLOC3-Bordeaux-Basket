<?php
    $_SERVER = 'smtp.orange.fr'; // smtp = fournisseur d'accès, ne pas oublier le fichier php.ini
  // on génère une frontière
  $boundary = '-----=' . md5( uniqid ( rand() ) );
  // on génère un identifiant aléatoire pour le fichier
  $file_id  = md5( uniqid ( rand() ) ) . $_SERVER["localhost"];

  // on va maintenant lire le fichier et l'encoder
  $path = 'C:\MAMP\htdocs\send_email\image\map_bbb.jpg'; // chemin vers le fichier
  $fp = fopen($path, 'rb');
  $content = fread($fp, filesize($path));
  fclose($fp);
  $content_encode = chunk_split(base64_encode($content));

  $headers  = "From: \"Anouar\"<anouar794@gmail.com>\n";
  $headers .= "MIME-Version: 1.0\n";
  $headers .= "Content-Type: multipart/related; boundary=\"$boundary\"";

  $message  = "Ceci est un message au format MIME 1.0 multipart/mixed.\n\n";
  $message .= "--" . $boundary . "\n";
  $message .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
  $message .= "Content-Transfer-Encoding: 8bit\n\n";
  $message .= "<html><body>Salut mon pral, <br><br>";
  $message .= "Voila le fichier que tu m'as demandé :<br>";
  $message .= "<img src=\"cid:$file_id\" alt=\"le fichier demandé\"><br>";
  $message .= "<br>@+";
  $message .= "\n\n";
  $message .= "--" . $boundary . "\n";
  $message .= "Content-Type: image/gif; name=\"fichier.gif\"\n";
  $message .= "Content-Transfer-Encoding: base64\n";
  $message .= "Content-ID: <$file_id>\n\n";
  $message .= $content_encode . "\n";
  $message .= "\n\n";
  $message .= "--" . $boundary . "--\n";

  mail('yassin.rey200@gmail.com', 'File MAP que tu ma demandé', $message, $headers);
?>