<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head>
      <title>Galleria</title>
      <link rel='shortcut icon' type='image/x-icon' href='../img/icon.ico' />
      <meta charset="utf-8">
      <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
      <!--<link rel='stylesheet' type='text/css' media='screen and (min-device-width: 800px)' href='../sito/css/style.css'>-->
      <link rel='stylesheet' type='text/css' media='screen and (max-device-width: 799px)' href='../css/mstyle.css'>
      <script type='text/javascript' src='../js/re.js'></script>
   </head>

   <body>
      <table>
         <?php
            include "connessione.php";
            $par=$_GET['project'];
            $sql="SELECT titolo, descrizione, media FROM ".$tabella." WHERE progetto=\"".$par."\"";
            $result = mysqli_query($conn, $sql); //lancio query
            if (mysqli_num_rows($result) > 0) { //costruzione tabella (da modificare per visualizzazione video)
            while($row = mysqli_fetch_assoc($result)) {
               $fileType = pathinfo($row["media"],PATHINFO_EXTENSION);
               if($fileType == "mp4" || $fileType == "avi" || $fileType == "webm") {
                  echo "<video controls><source src=\"media/" . $row["media"]."\" type=\"video/" . $fileType ."\">Your browser does not support the video tag.</video>";
               }
               else echo "<img alt=\"media\" src=\"media/" . $row["media"]."\">";
            }
         } else {
            //è stato bello...
         }
         mysqli_close($conn);
         ?>
      </table><table>
      </body>
</html>
