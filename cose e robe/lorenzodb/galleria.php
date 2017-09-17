<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>galleria lavori</title>

</head><body>
<br>
Elenco lavori <br><br>
<table>
<?php
include"connessione.php";

$sql = "SELECT" +$variabileid +", titolo, descrizione, media FROM $tabella";
$result = mysqli_query($conn, $sql); //lancio query

if (mysqli_num_rows($result) > 0) { //costruzione tabella (da modificare per visualizzazione video)
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["titolo"]. "</td></tr><tr><td>" . $row["descrizione"]. "</td></tr><tr><td><img alt=\"media\" src=\"media/" . $row["media"]."\"></td></tr><tr><td><hr></td></tr><tr><td><hr></td></tr><br>";
    }
} else {
   //è stato bello...
}
mysqli_close($conn);
?>


</table><table> <!-- fine tabella html -->
</body>
</html>
