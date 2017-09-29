<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head>
      <title>Galleria</title>
      <link rel='shortcut icon' type='image/x-icon' href='../img/icon.ico' />
      <meta charset="utf-8">
      <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
      <link rel='stylesheet' type='text/css' media='screen and (min-device-width: 800px)' href='../css/style.css'>
      <link rel='stylesheet' type='text/css' media='screen and (max-device-width: 799px)' href='../css/mstyle.css'>
      <script type='text/javascript' src='../js/re.js'></script>
   </head>

   <body>
      <table>
            <?php
               include "connessione.php";
               $par=$_GET['progetto']
               $sql="SELECT media FROM $tabella WHERE progetto=".$par;
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
