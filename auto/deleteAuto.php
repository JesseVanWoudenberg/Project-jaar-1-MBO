<?php

session_start();

if ($_SESSION["logged_in"] == false) {
    header("Location: ../login/login.php");
} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <title>Auto verwijderen</title>
</head>
<body class="bodyClass">

    <h1 class="subLogo">Delete auto</h1>

    <form action="deleteAuto2.php" method="post" class="createKlantForm">
        Welk autokenteken wilt u verwijderen?
        <input type="text" name="autokentekenvak"> <br />
        <input type="submit">
    </form>

    <h3 class="terugLink"><a href="index.php">Terug</a></h3>

</body>
</html>