<?php
// la pagina php  che effettivamente elimina il record è la elimina2_db.php

include"connessione.php";
echo"<br><br>Elimina record:<br>
<form action=\"elimina2_db.php\" method=\"post\" target=\"_blank\">
  <br>numero progressivo<br>
    <textarea cols=\"40\" rows=\"1\" name=\"numero_prog\">inserisci id da eliminare</textarea><br>
	<input type=\"hidden\" name=\"elimina\" value=\"1\" type=\"submit\">
	   <input value=\"elimina record con numero\" type=\"submit\"></form>
";

$sql = "SELECT id, titolo, descrizione, immagine FROM $tabella";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - titolo: " . $row["titolo"]. " - descrizione " . $row["descrizione"]. " - immagine " . $row["immagine"]."<br>";
    }
} else {
    echo "0 results";
}







mysqli_close($conn);
?>
