<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
  
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>galleria lavori</title>

  
</head><body>
<br>
Elenco lavori <br><br>
<table> <!-- inizio tabella html -->
<?php
include"connessione.php"; // includo i dati per la connessione al db

$sql = "SELECT id, titolo, descrizione, immagine FROM $tabella"; // seleziono cio' che mi serve dalla tabella del db cioe' tutto
$result = mysqli_query($conn, $sql); // lancio la query

if (mysqli_num_rows($result) > 0) { // se il numero di record è maggiore di 0
    // per ogni riga del database mi costruisco dinamicamente la tabella html che contiene i risultati
	// cioè con il php costruisco le righe <hr><td>DATO PRESO DAL DATABASE</td></tr> e le separo con 2 righe <hr><td><hr></td></tr>
    while($row = mysqli_fetch_assoc($result)) { // finchè ci sono risultati scrivi altrimenti si ferma
        echo "<tr><td>" . $row["titolo"]. "</td></tr><tr><td>" . $row["descrizione"]. "</td></tr><tr><td><img alt=\"Immagine\" src=\"images/" . $row["immagine"]."\"></td></tr><tr><td><hr></td></tr><tr><td><hr></td></tr><br>";
    }
} else { // altrimenti non fa nulla

}
mysqli_close($conn); //chiusura connessione
?> 


</table><table> <!-- fine tabella html -->
</body>
</html>

