<?php
$titolo=$_POST["titolo"]; // ricevo i dati dal form della pagina upload.php
$descrizione=$_POST["descrizione"];
$id=$_POST["numero_prog"];
$immagine=$_POST["immagine"];
$progetto=$_POST["progetto"]

include"connessione.php"; //includo come prima i dati della connessione al db


echo"ricevo: $id -- $immagine -- $titolo -- $descrizione -- $progetto<br>"; // mando a monitor quello che ricevo per sicurezza

// inserisco nella tabella lavori, formata da 4 campi i valori corrispondenti ---> vedi poi come è fatta la tabella (file sql allegato)
$sql = "INSERT INTO lavori (id, titolo, progetto, descrizione, immagine) VALUES (\"$id\", \"$titolo\", \"$progetto\", \"$descrizione\", \"$immagine\")";
mysqli_query($conn, $sql);// eseguo la query

echo"<br><br>ho inserito i dati, l'elenco del db e' il seguente:<br>"; // conferma inserimento

/// seleziono tutti i record della tabella per fare vedere il nuovo inserimento alla fine

$sql = "SELECT id, titolo, progetto, descrizione, immagine FROM $tabella";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - titolo: " . $row["titolo"]. " - progetto: " .$row["progetto"]. " - descrizione " . $row["descrizione"]. " - immagine " . $row["immagine"]."<br>";
    }
} else {
    echo "0 results";
}





mysqli_close($conn);
?>
