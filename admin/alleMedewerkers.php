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
    <title>Alle medewerkers</title>
</head>
<body class="bodyClass">
    
<?php

require_once "../klant/connectmySQL.php";

    $medewerkers = $conn->prepare("

                            SELECT *
                            FROM medewerker

                         ");

    $medewerkers->execute();
?>

<table class='content-table'>
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
    foreach($medewerkers as $medewerker)
        {
            echo "<tr>";
                echo "<td>" . $medewerker["naam"] . "</td>";
                echo "<td>" . $medewerker["functie"] . "</td>";
                echo "<td>" . $medewerker["gebruikersnaam"] . "</td>";
                echo "<td>" . $medewerker["wachtwoord"] . "</td>";
            echo "</tr>";
        }
?>

    </tbody>
    </table>
    <h3 class="terugLink"><a href="index.php">Terug</a></h3>


</body>
</html>