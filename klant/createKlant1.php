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
    <title>Klant toevoegen</title>
</head>
<body class="bodyClass">

<?php

include_once './connectmySQL.php';
?>

<h1 class="subLogo">Klant Toevoegen</h1>

    <form action="createKlant2.php" method="post" class="createKlantForm">
    klantnaam: <input type="text" name="klantnaamvak"> <br>
    klantadres: <input type="text" name="klantadresvak"> <br>
    klantpostcode: <input type="text" name="klantpostcodevak"> <br>
    klantplaats: <input type="text" name="klantplaatsvak"> <br>
    <input type="submit">
    </form>

    <h3 class="terugLink"><a href="index.php">Terug</a></h3>

</body>
</html>