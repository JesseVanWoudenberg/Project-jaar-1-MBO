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

    <?php 

    error_reporting (E_ALL ^ E_NOTICE);
    
        $naam    = $_POST["naam"];
        $functie   = $_POST["functie"];
        $gebruikersnaam    = $_POST["gebruikersnaam"];
        $wachtwoord    = $_POST["wachtwoord"];

        require_once "../klant/connectmySQL.php";

        $sql = $conn->prepare
        ("
            update medewerker set    naam            = :naam,
                                     functie         = :functie,
                                     gebruikersnaam  = :gebruikersnaam,
                                     wachtwoord      = :wachtwoord
                                     where naam      = :naam
        ");  

        $sql->execute
        ([

            "naam"           => $naam,
            "functie"        => $functie,
            "gebruikersnaam" => $gebruikersnaam,
            "wachtwoord"     => $wachtwoord
        ]);
?>
    <h2 class='klantIdHeader'>De gegevens zijn gewijzigd</h2>
    <h3 class="terugLink"><a href="index.php">Terug</a></h3>

</body>
</html>