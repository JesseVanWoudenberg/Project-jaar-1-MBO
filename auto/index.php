<?php

session_start();

if ($_SESSION["logged_in"] == false) {
    header("Location: ../login/login.php");
    exit();
} 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <title>Home - Auto</title>
</head>

<body class="bodyClass">
  <ul class="autoLinks">
    <li><a href="createauto.php">Create</a></li>
    <li><a href="Readnummerboord.php">Zoeken op nummerbord</a></li>
    <li><a href="searchKlantID.php">Auto's van klant zoeken</a></li>
    <li><a href="updateauto.php">Update</a></li>
    <li><a href="deleteAuto.php">Delete</a></li>
  </ul>
  
<h1 class="logo">Garage ertan</h1>
<h2 class="subLogo">Auto</h2>
<h3 class="terugLink"><a href="../homePagina.php">Terug</a></h3>
</body>
</html>