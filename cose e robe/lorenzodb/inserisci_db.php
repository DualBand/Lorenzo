<?php
$titolo=$_POST["titolo"]; //ricevo i dati dal form della pagina upload.php
$descrizione=$_POST["descrizione"];
$id=$_POST["numero_prog"];
$media=$_POST["media"];
$progetto=$_POST["progetto"];

include"connessione.php";

echo"ricevo: $id -- $media -- $titolo -- $descrizione -- $progetto<br>";

$sql = "INSERT INTO lavori (id, titolo, progetto, descrizione, media) VALUES (\"$id\", \"$titolo\", \"$progetto\", \"$descrizione\", \"$media\")";
mysqli_query($conn, $sql); //esecuzione della query sovrastante

echo"<br><br>ho inserito i dati, l'elenco del db e' il seguente:<br>";

$sql = "SELECT id, titolo, progetto, descrizione, media FROM $tabella";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - titolo: " . $row["titolo"]. " - progetto: " .$row["progetto"]. " - descrizione " . $row["descrizione"]. " - media " . $row["media"]."<br>";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
