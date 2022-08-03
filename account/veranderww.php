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
    
    <h3 class="terugLink"><a href="index.php">Terug</a></h3>

    <?php

    require_once "../klant/connectmySQL.php";

    $wachtwoorden = $conn->prepare("
                                        select wachtwoord,
                                               naam
                                        from medewerker
                                        where naam = :naam
                                  ");
    $wachtwoorden->execute(["naam" => $_SESSION["logged_user"]]);

    echo "<form action='veranderww2.php' method='POST' class='createKlantForm'>";
    foreach($wachtwoorden as $wachtwoord) {

            echo " Nieuw wachtwoord: <input type='text' ";
            echo " name  = 'wachtwoord' ";
            echo " value = '" .$wachtwoord["wachtwoord"] . "' ";
            echo " > <br />";

        }
        echo "<input type='submit'>";
    echo "</form>";
    
    ?>

</body>
</html>