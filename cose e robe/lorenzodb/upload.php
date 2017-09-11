<?php session_start(); ?> <!-- tengo la sessione per trascinarmi i valori immagazzinati prima -->

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html template="true">
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
<title>upload</title>
</head>
<body>
<br>

<?php $target_dir = "images/"; /// cartella che contiene le immagini
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); /// indirizzo completo su dove copiare
$uploadOk = 1; /// variabile di controllo mi serve per capire se tutto e' andato ok
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$nuovo_id=0; // inizializzo questa variabile
$nome_file_scelto=""; // inizializzo questa variabile
$id=0;// inizializzo questa variabile



// Check se il file e' gia' esistente
if (file_exists($target_file)) {
    echo "spiacente, il file esiste di gia'";
    $uploadOk = 0; /// non va bene
}
// Check se il file e' maggiore di 500000, per evitare immagini troppo grosse, valore da cambiare se lo si desidera
if ($_FILES["fileToUpload"]["size"] > 10000000) {
    echo "spiacente il tuo file e' troppo grosso.";
    $uploadOk = 0; /// non va bene
}

// Permetti solo i file di tipo immagine non altri tipi di file
if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;  /// non va bene
}


// Check se $uploadOk è a 0, cioè qualcosa non funziona oppure è a 1 cioè tutto funziona
if ($uploadOk == 0) {
    echo "Spiacente, qualcosa non ha funzionato.";
// se tutto è a posto provo ad uplodare il file selezionato
} else { // solo se tutto è a posto visualizzo il resto altrimenti si ferma qui'

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {  /// invio del file
      echo "IL file ". basename( $_FILES["fileToUpload"]["name"]). "<br> e' stato caricato.<br>"; // il nome del file a monitor è stato caricato

$nome_file_scelto=basename( $_FILES["fileToUpload"]["name"]); //immagazzino il nome del file completo in una variabile di nome $nome_file_scelto
$nuovo_titolo=$_SESSION["variabile1"]; //immagazzino il titolo in una variabile di nome $nuovo_titolo, il dato lo avevo messo dentro la sessione
$nuova_descrizione=$_SESSION["variabile2"]; //immagazzino la descrizione in una variabile di nome $nuova_descrizione, il dato lo avevo messo dentro la sessione



include"connessione.php"; //al fine di connettermi al database mysql,ho inserito in una pagina esterna dal nome "connessione.php"  i dati nome utente e passw, oltre alla connessione del db mysql


$sql = "SELECT id FROM lavori"; // seleziono dalla tabella del database il numero progressivo dei lavori inseriti.
$result = mysqli_query($conn, $sql); // lancio della query che mi entra dentro $result

    // leggo ogni riga del database, lo scopo è di avere l'ultimo numero inserito per inserire il numero successivo.
    while($row = mysqli_fetch_assoc($result)) {
        $id=$row["id"]; // immagazzino il numero progressivo ultimo in $id
    }
$nuovo_id=$id+1; // il prossimo lavoro che inseriro' avra' l'id +1


//sotto chiedo la conferma se vuoi procedere a inserire i dati nel database
echo"<br><br>devo inserire in db?<br><br> id=$nuovo_id --- <br>titolo=$nuovo_titolo ---<br> descrizione=$nuova_descrizione ---<br> immagine=$nome_file_scelto<br><br>????";
// di sotto c'è una cosa un po' anomala, ossia con il php costruisco il form per inviare i dati al database.
// la differenza rispetto a scrivere il form con l'html, cosi' come nella pagina inserisci_lavoro.html è che dove ci sono gli apici " devo mettergli davanti al barra rovesciata \
// uso questa tecnica (costruire l'html con il php) perchè solo se tutto è ok te lo fa vedere.
echo"
<form action=\"inserisci_db.php\" method=\"post\">
titolo<br>
  <textarea cols=\"39\" rows=\"2\" name=\"titolo\">$nuovo_titolo</textarea><br>
  <br>descrizione<br>
  <textarea cols=\"50\" rows=\"4\" name=\"descrizione\">$nuova_descrizione</textarea><br>
  <br>numero progressivo<br>
    <textarea cols=\"3\" rows=\"1\" name=\"numero_prog\">$nuovo_id</textarea><br>
  <br>nome immagine<br>
  <textarea cols=\"39\" rows=\"1\" name=\"immagine\">$nome_file_scelto</textarea><br>
  <input value=\"invia dati\" type=\"submit\"></form>
";



    } else {
        echo "Spiacente c'è un errore a caricare il file.";
    }
} // qui' finisce la parte che si visualizza e si attiva se il file era stato caricato.




?>
<br>

<br>
</body></html>
