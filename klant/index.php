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
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <title>Home - Klant</title>
</head>

<body class="bodyClass">

<ul class="autoLinks">
  <li><a href="./createKlant1.php">create</a></li>
  <li><a href="./searchKlant1.php">zoeken op klantid</a></li>
  <li><a href="./alleklanten.php">Alle klanten weergeven</a></li>
  <li><a href="./updateklant.php">update</a></li>
  <li><a href="./deleteKlant1.php">delete</a></li>
</ul>

<h1 class="logo">Garage ertan</h1>
<h2 class="subLogo">Klant</h2>
<h3 class="terugLink"><a href="../homePagina.php">Terug</a></h3>

</body>
</html>