<?php 

session_start();

if ($_SESSION["logged_in"] == false) {
    header("Location: login/login.php");
    exit();
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <title>Auto gegevens veranderen</title>
</head>
<body class="bodyClass">
    <h1 class="subLogo">Update Auto</h1>

    <form action="updateauto2.php" method="POST" class="createKlantForm">
    Welk autokenteken wilt u wijzigen?
    <input type="text" name="autokentekenvak"> <br />
    <input type="submit">
    </form>

    <h3 class="terugLink"><a href="index.php">Terug</a></h3>
</body>
</html>