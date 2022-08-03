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
    <title>Zoek op Nummerbord</title>
</head>

<body class="bodyClass">


  <h1 class="subLogo">Zoeken op nummerbord</h1>

<form action="Readnummerboord2.php" method="post" class="createKlantForm">
  Welk nummberboord zoekt u?
  <input type="text" name="nummerboordidvak"> <br /> 
  <input type="submit">
</form>

<h3 class="terugLink"><a href="index.php">Terug</a></h3>

</body>
</html>