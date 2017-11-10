<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head>
      <title>Galleria</title>
      <link rel='shortcut icon' type='image/x-icon' href='../img/icon.ico' />
      <meta charset="utf-8">
      <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" type='text/css' href='overlay.css'> <!--ridondante-->
      <link rel="stylesheet" type='text/css' href='gallery.css'> <!--da spostare-->
      <script type='text/javascript' src='gscript.js'></script>
   </head>

   <body>
      <div class="w3-content w3-display-container">
         <?php
            include "connessione.php";
            $par=$_GET['project'];
            $sql="SELECT titolo, descrizione, media FROM ".$tabella." WHERE progetto=\"".$par."\"";
            $result = mysqli_query($conn, $sql); //lancio query
            if (mysqli_num_rows($result) > 0) {
               $mediaCounter=0;
               while($row = mysqli_fetch_assoc($result)) {
                  $fileType = pathinfo($row["media"],PATHINFO_EXTENSION);
                  echo "<div class=\"container\">";
                  if($fileType == "mp4" || $fileType == "avi" || $fileType == "webm") {
                     echo "<video controls class=\"mySlides pb\"><source src=\"media/" . $row["media"]."\" type=\"video/" . $fileType ."\">Your browser does not support the video tag.</video>";
                  }
                  else
                     echo "<img class=\"mySlides pb\" alt=\"media\" src=\"media/" . $row["media"]."\">";
                  $mediaCounter++;
                  echo "<div class=\"overlay\"><div class=\"ltext\"><b>" . $row["titolo"] . "</b><br>" . $row["descrizione"] . "</div></div>";
               }
               echo "</div>";
         } else {
            //è stato bello...
         }
         mysqli_close($conn);
         echo "<div class=\"w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle\" style=\"width:100%\">";
            echo "<div class=\"w3-left w3-hover-text-khaki\" onclick=\"plusDivs(-1)\">&#10094;</div>";
            echo "<div class=\"w3-right w3-hover-text-khaki\" onclick=\"plusDivs(1)\">&#10095;</div>";
            for($i=1; $i<=$mediaCounter; $i++) echo "<span class=\"w3-badge demo w3-border w3-transparent w3-hover-white\" onclick=\"currentDiv(".$i.")\"></span>";
         ?>
         </div>
      </div>
   </body>
</html>
