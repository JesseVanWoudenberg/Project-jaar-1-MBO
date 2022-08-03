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
    <title>Delete Medewerker</title>
</head>

<body class="bodyClass">
    
<?php

$medewerkerNaam = $_POST["medewerkerNaam"];

require_once "../klant/connectmySQL.php";

$klanten = $conn->prepare("
                            select naam,
                            functie,
                            gebruikersnaam,
                            wachtwoord
                            from   medewerker
                            where  naam = :medewerkerNaam    
                        ");

    $klanten->execute(["medewerkerNaam" => $medewerkerNaam]);

?>
    <table class="content-table">
    <thead>
         <tr>
           <th>Naam</th>
           <th>Functie</th>
            <th>Gebruikersnaam</th>
            <th>Wachtwoord</th>
          </tr>
      </thead>
      <tbody>

<?php
    foreach($klanten as $klant)
        {
            echo "<tr>";
                echo "<td>" . $klant["naam"] . "</td>";
                echo "<td>" . $klant["functie"] . "</td>";
                echo "<td>" . $klant["gebruikersnaam"] . "</td>";
                echo "<td>" . $klant["wachtwoord"] . "</td>";
            echo "</tr>";
        }
    echo "</tbody/>";
    echo "</table><br>";

    echo "<form action = \"deleteMedewerker3.php\" method=\"post\" class=\"createKlantForm\">";

        echo "<input type=\"hidden\" name=\"medewerkerNaam\" value=$medewerkerNaam>";
        
        echo "<input type=\"hidden\" name=\"verwijdervak\" value=\"0\">";
        echo "<input type=\"checkbox\" name=\"verwijdervak\" value=\"1\">";
        echo " Verwijder deze klant <br>";
        echo "<input type=\"submit\">";
    echo "</form>";
?>

<h3 class="terugLink"><a href="index.php">Terug</a></h3>

</body>
</html>