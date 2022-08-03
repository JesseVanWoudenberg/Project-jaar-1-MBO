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
    <title>Verander Wachtwoord</title>
</head>
<body class="bodyClass">
    
    <?php
    
    $nieuwWachtwoord = $_POST['wachtwoord'];
    
    require_once "../klant/connectmySQL.php";

    $sql = $conn->prepare 
    ("
        update medewerker set wachtwoord = :wachtwoord
        where naam = :naam
    ");

    $sql->execute
    ([
        "naam" => $_SESSION['logged_user'],
        "wachtwoord" => $nieuwWachtwoord
    ]);
    ?>

<h2 class='klantIdHeader'>Uw wachtwoord is veranderd!</h2>
<h3 class="terugLink"><a href="index.php">Terug</a></h3>

</body>
</html>