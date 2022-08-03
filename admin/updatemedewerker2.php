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
    
    $medewerkernaam = $_POST["medewerkernaamvak"];

    require_once "../klant/connectmySQL.php";

    $medewerkers = $conn->prepare("
                                select naam,
                                       functie,
                                       gebruikersnaam,
                                       wachtwoord
                                from   medewerker
                                where  naam = :naam
                            ");
    $medewerkers->execute(["naam" => $medewerkernaam]);

    echo "<form action='updatemedewerker3.php' method='POST' class='createKlantForm'>";
    foreach($medewerkers as $medewerker) {

            echo " <h4>Naam: " . $medewerker["naam"] . "</h4>";
            echo " <input type='hidden' name='naam' ";
            echo " value='" .$medewerker["naam"]. "'> <br />";

            echo "<select name='functie'>";
                if ($medewerker['functie'] == "administrator") {
                    echo "<option selected value='administrator'>Administrator</option>";
                    echo "<option value='baliemedewerker'>Balie Medewerker</option>";
                    echo "<option value='monteur'>Monteur</option>";
                } else if ($medewerker['functie'] == "baliemedewerker") {
                    echo "<option value='administrator'>Administrator</option>";
                    echo "<option selected value='baliemedewerker'>Balie Medewerker</option>";
                    echo "<option value='monteur'>Monteur</option>";
                } else {
                    echo "<option value='administrator'>Administrator</option>";
                    echo "<option value='baliemedewerker'>Balie Medewerker</option>";
                    echo "<option selected value='monteur'>Monteur</option>";
                }
            echo "</select> <br>";

            echo " gebruikersnaam: <input type='text' ";
            echo " name  = 'gebruikersnaam' ";
            echo " value = '" .$medewerker["gebruikersnaam"]  . "' ";
            echo " > <br />";

            echo " wachtwoord: <input type='text' ";
            echo " name  = 'wachtwoord' ";
            echo " value = '" .$medewerker["wachtwoord"] . "' ";
            echo " > <br />";
        }
        echo "<input type='submit'>";
    echo "</form>";
    
    ?>

<h3 class="terugLink"><a href="index.php">Terug</a></h3>
</body>
</html>