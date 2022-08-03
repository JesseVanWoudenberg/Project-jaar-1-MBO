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

    <h1 class="subLogo">Auto Toevoegen</h1>

    <form action="createauto2.php" method="post" class="createKlantForm"> <br />
    autokenteken:  <input type="text" name="autokentekenvak"> <br />
    automerk:  <input type="text" name="automerkvak"> <br />
    autotype:  <input type="text" name="autotypevak"> <br />
    autokmstand:  <input type="text" name="autokmstandvak"> <br />
    klantid:  <input type="text" name="klantidvak"> <br />
    <input type="submit">
    </form>

    <h3 class="terugLink"><a href="index.php">Terug</a></h3>
</body>
</html>