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
    <title>Medewerker Toevoegen</title>
</head>
<body class="bodyClass">
    
<?php

$naam     = $_POST["naam"];
$functie    = $_POST["functie"];
$gebruikersnaam = $_POST["gebruikersnaam"];
$wachtwoord   = $_POST["wachtwoord"];

require_once "../klant/connectmySQL.php";

$sql = $conn->prepare("
                        insert into medewerker values
                        (
                            :naam, :functie, :gebruikersnaam,
                            :wachtwoord
                        )
                    ");

$sql->execute([
                "naam" => $naam,
                "functie" => $functie,
                "gebruikersnaam" => $gebruikersnaam,
                "wachtwoord" => $wachtwoord
            ]);

echo "<h2 class='klantIdHeader'>De medewerker is toegevoegd</h2>"
?>

<h3 class="terugLink"><a href="index.php">Terug</a></h3>

</body>
</html>