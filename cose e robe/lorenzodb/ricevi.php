<?php  // il php inizia così, posso inserire il php in piu' punti di una pagina html
session_start(); //inizio di una sessione, mi serve per tenere in memoria alcune variabili che uso dopo
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> <!-- aiuti per il browser -->
<html>
<head>
<title>ricevi dati</title>

</head><body>
<h1>Ricevi dati</h1>
<h2>Hai inserito i seguenti dati:</h2><br>

<br>
<?php

$_SESSION["variabile1"] = $_POST["titolo"];// usando le sessioni, immagazzino il titolo che mi arriva dal form precedente in variabile1
$_SESSION["variabile3"] = $_POST["progetto"];
$_SESSION["variabile2"] = $_POST["descrizione"];// come sopra immagazzino in variabile2 la descrizione che ho inviato
?>
<h3>Titolo:</h3> <br><?php echo $_POST["titolo"]; ?>   <!-- echo vuol dire manda a monitor il contenuto di quello che ho mandato con il form in questo caso il titolo-->

<h3>Progetto:</h3> <?php echo $_POST["progetto"]; ?>
<h3>Descrizione:</h3> <?php echo $_POST["descrizione"]; ?> <!-- echo vuol dire manda a monitor il contenuto di quello che ho mandato con il form in questo caso la descrizione-->
<br>
<br>

<form action="upload.php" method="post" enctype="multipart/form-data"><!-- modulo per caricare immagini, che invia i dati ad una pagina php upload.php -->
    <h4>Seleziona media da caricare:</h4>
    <input name="fileToUpload" id="fileToUpload" type="file">
    <input value="Carica media" name="submit" type="submit">
</form>

</body></html>
