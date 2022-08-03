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
    <title>Klant gegevens aanpassen</title>
</head>
<body class="bodyClass">
    <h1 class="subLogo">Update Klant</h1>

    <?php 

    error_reporting (E_ALL ^ E_NOTICE);
    
        $klantid    = $_POST["klantidvak"];
        $klantnaam   = $_POST["klantnaam"];
        $klantadres    = $_POST["klantadres"];
        $klantpostcode    = $_POST["klantpostcode"];
        $klantplaats    = $_POST["klantplaats"];

        require_once "../klant/connectmySQL.php";

        $sql = $conn->prepare
        ("
            update klant set    klantid         = :klantid,
                                klantnaam       = :klantnaam,
                                klantadres      = :klantadres,
                                klantpostcode   = :klantpostcode,
                                klantplaats     = :klantplaats
                                where klantid   = :klantid
        ");

        $sql->execute
        ([

            "klantid"   => $klantid,
            "klantnaam"   => $klantnaam,
            "klantadres"   => $klantadres,
            "klantpostcode"   => $klantpostcode,
            "klantplaats"   => $klantplaats
        ]);
?>
    <h2 class='klantIdHeader'>De gegevens zijn gewijzigd</h2>
    <h3 class="terugLink"><a href="index.php">Terug</a></h3>

</body>
</html>