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
    <link rel="stylesheet" href="../style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <title>Klant verwijderen</title>
</head>
<body class="bodyClass">

<h1 class="subLogo">Delete klant</h1>

<form action="deleteKlant2.php" method="post" class="createKlantForm">

    <h4 class="subLogo">Welke klant wilt u verwijderen:

    <input type="text" name="klantidvak"> <br>
    <input type="submit">
</form>

<h3 class="terugLink"><a href="index.php">Terug</a></h3>

</body>
</html>