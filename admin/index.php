<?php

include "checkAdmin.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <title>Home - Admin</title>
</head>

<body class="bodyClass">


  <ul class="autoLinks">
    <li><a href="createMedewerker.php">Mederwerker Toevoegen</a></li>
    <li><a href="deleteMedewerker.php">Medewerker verwijderen</a></li>
    <li><a href="alleMedewerkers.php">Alle Medewerkers weergeven</a></li>
    <li><a href="updatemedewerker.php">Medewerker gegevens aanpassen</a></li>
    <li><a href="deleteLog.php">Clear Log</a></li>
  </ul>

  <h1 class="logo">Garage ertan</h1>
  <h2 class="subLogo">Admin</h2>
  <h3 class="terugLink"><a href="../homePagina.php">Terug</a></h3>

</body>
</html>