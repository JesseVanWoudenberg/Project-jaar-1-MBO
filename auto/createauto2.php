<?php

session_start();

if ($_SESSION["logged_in"] == false) {
    header("Location: ../login/login.php");
} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <title>Auto toevoegen</title>
</head>
<body class="bodyClass">

<?php
  $autokenteken = $_POST["autokentekenvak"];
  $automerk = $_POST["automerkvak"];
  $autotype = $_POST["autotypevak"];
  $autokmstand = $_POST["autokmstandvak"];
  $klantid = $_POST["klantidvak"];
  require_once "../klant/connectmySQl.php";

  $sql = $conn->prepare("
  
                          insert into auto values
                          (
                              :autokenteken, :automerk, :autotype,
                              :autokmstand, :klantid

                          )
                      ");

  $sql->execute([
                    "autokenteken"  => $autokenteken,
                    "automerk"  => $automerk,
                    "autotype"  => $autotype,
                    "autokmstand"  => $autokmstand,
                    "klantid"   => $klantid
                ]);
  echo "<h1 class=\"subLogo\">De auto is toegevoegd</h1>";
  echo "<h3 class=\"terugLink\"><a href=\"index.php\">Terug</a></h3>"
  ?>
  </body>
  </html>
