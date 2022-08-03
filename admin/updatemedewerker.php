<?php 

include "checkAdmin.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <title>Update Medewerker</title>
</head>
<body class="bodyClass">
    <h1 class="subLogo">Update Medewerker</h1>

    <form action="updatemedewerker2.php" method="POST" class="createKlantForm">
    Welk medewerker wilt u wijzigen?
    <input type="text" name="medewerkernaamvak"> <br />
    <input type="submit">
    </form>

    <h3 class="terugLink"><a href="index.php">Terug</a></h3>
</body>
</html>