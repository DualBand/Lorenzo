<?php

$servername = "localhost"; //nome server mysql
$username = "dualband"; // nome utente
$password = "dnablaud"; // password
$dbname = "lorenzodb"; // nome del db
$tabella="lavori"; // nome della TABELLA del db

$conn = mysqli_connect($servername, $username, $password, $dbname); //connessione al db
if (!$conn) {  die("Connessione fallita, qualcosa non funziona: " . mysqli_connect_error()); }
?>
