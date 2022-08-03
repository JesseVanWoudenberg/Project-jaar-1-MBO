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
    
<h1 class="subLogo">Medewerker Toevoegen</h1>

    <form action="createMedewerker2.php" method="post" class="createKlantForm">
    naam: <input type="text" name="naam"> <br>

    <label for="functie">Functie:</label>
    
<select name="functie">
    <option value="administrator">Administrator</option>
    <option value="baliemedewerker">Balie Medewerker</option>
    <option value="monteur">Monteur</option>
</select> <br>

    gebruikersnaam: <input type="text" name="gebruikersnaam"> <br>
    wachtwoord: <input type="text" name="wachtwoord"> <br>
    <input type="submit">
    </form>

    <h3 class="terugLink"><a href="index.php">Terug</a></h3>

</body>
</html>