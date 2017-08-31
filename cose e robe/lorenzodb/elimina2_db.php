<?php
$elimina=$_POST["elimina"];
$id=$_POST["numero_prog"];
// ricevo i dati dal form precedente di elimina_db.pp


include"connessione.php"; // connessione al db

if($elimina==1){ // controllo se mi arriva effettivamente 1 dal form
$sql = "DELETE FROM lavori WHERE id=\"$id\""; // query per cancellare
mysqli_query($conn, $sql); // esecuzione della query
echo"ho eliminato il record n. $id<br> il nuovo elenco e' il seguente<br>";
}

/// riprendo l'elenco di tutto il database per fare vedere che il record è stato eliminato.
$sql = "SELECT id, titolo, descrizione, immagine FROM $tabella";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - titolo: " . $row["titolo"]. " - descrizione " . $row["descrizione"]. " - immagine " . $row["immagine"]."<br>";
    }
} else {
    echo "0 results";
}







mysqli_close($conn);
?> 