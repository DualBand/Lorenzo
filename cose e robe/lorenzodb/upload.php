<?php session_start(); ?> <!-- tengo la sessione per trascinarmi i valori immagazzinati prima -->

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html template="true">
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
<title>upload</title>
</head>
<body>
<br>

<?php $target_dir = "media/";
define('MB', 1048576);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
$nuovo_id=0;
$nome_file_scelto="";
$nuovo_progetto="";
$id=0;

if (file_exists($target_file)) {
    echo "Spiacente, c'è già un file con questo nome nel database.";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 50*MB) {
    echo "Spiacente, il tuo file e' troppo grosso.";
    $uploadOk = 0;
}

if($fileType != "jpg" && $fileType != "JPG" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" && $fileType != "mp4" && $fileType != "avi" && $fileType != "webm") { //controllo formato file
    echo "Formato non supportato. Se il tuo file è un immagine o un video, contatta i creatori del sito.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Spiacente, qualcosa è andato storto.";
} else {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "IL file ". basename( $_FILES["fileToUpload"]["name"]). "<br> e' stato caricato.<br>";
$nome_file_scelto=basename( $_FILES["fileToUpload"]["name"]);
$nuovo_titolo=$_SESSION["variabile1"];
$nuova_descrizione=$_SESSION["variabile2"];
$nuovo_progetto=$_SESSION["variabile3"];


include"connessione.php";

$sql = "SELECT id FROM lavori";
$result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        $id=$row["id"];
    }
$nuovo_id=$id+1; // il prossimo lavoro avra' id=id+1

echo"<br><br>devo inserire in db?<br><br> id=$nuovo_id --- <br>titolo=$nuovo_titolo ---<br> descrizione=$nuova_descrizione ---<br> media=$nome_file_scelto<br><br>????";

echo"
<form action=\"inserisci_db.php\" method=\"post\">
titolo<br>
  <textarea cols=\"39\" rows=\"2\" name=\"titolo\">$nuovo_titolo</textarea><br>
  <br>descrizione<br>
  <textarea cols=\"50\" rows=\"4\" name=\"descrizione\">$nuova_descrizione</textarea><br>
  <br>numero progressivo<br>
    <textarea cols=\"3\" rows=\"1\" name=\"numero_prog\">$nuovo_id</textarea><br>
  <br>nome media<br>
  <textarea cols=\"39\" rows=\"1\" name=\"media\">$nome_file_scelto</textarea><br>
  <br>progetto<br>
  <textarea cols=\"39\" rows=\"1\" name=\"progetto\">$nuovo_progetto</textarea><br>
  <input value=\"invia dati\" type=\"submit\">
</form>
";

    } else {
        echo "Spiacente, si è verificato un errore nel caricamento del file.";
    }
}

?>
<br>
</body></html>
