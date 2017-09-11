<?php

$servername = "localhost"; //nome server mysql database di solito localhost
$username = "dualband"; // nome utente
$password = "dnablaud"; // password
$dbname = "lorenzodb"; // nome del database
$tabella="lavori"; // nome della tabella del database clarissa

$conn = mysqli_connect($servername, $username, $password, $dbname); // creo la connessione al database
if (!$conn) {  die("Connessione fallita, qualcosa non funziona: " . mysqli_connect_error()); }
// se la connessione non funziona avverto a monitor.

?>
