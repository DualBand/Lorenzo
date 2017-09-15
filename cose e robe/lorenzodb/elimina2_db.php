<?php
$elimina=$_POST["elimina"];
$id=$_POST["numero_prog"];
//ricezione dati dal form elimina_db.pp

include"connessione.php";

if($elimina==1){
$sql = "DELETE FROM lavori WHERE id=\"$id\"";
mysqli_query($conn, $sql); // esecuzione della query sovrastante
echo"ho eliminato il record n. $id<br> il nuovo elenco e' il seguente<br>";
}

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
