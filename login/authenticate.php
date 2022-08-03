<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <title>Authenticate</title>
</head>
<body class="bodyClass">
    
<?php

session_start();

// DataBase connection variable
require_once "../klant/connectmySQl.php";

// Tijd functie voor logBoekDatabase
$currentTime = (date("H") . ":" . date("i") . ":" . date("s") . " " . date("F j Y"));

 
// POST ww en username
$gebruikersnaam = $_POST['username'];
$wachtwoord = $_POST['password'];

// vars setten/initializen
$logged_in = false;
$logged_user = "";

// Query maken voor het checking van de login gegevens
    $medewerkersGet = $conn->prepare("  
                                select naam,
                                       functie,
                                       gebruikersnaam,
                                       wachtwoord
                                from   medewerker
                             ");
// Query uitvoeren
    $medewerkersGet->execute();

    foreach($medewerkersGet as $medewerker)
        {
            if ($medewerker['gebruikersnaam'] == $gebruikersnaam && $medewerker['wachtwoord'] == $wachtwoord) {

                $logged_user = $medewerker['naam']; //Var voor bijhouden van inlogde user
                $logged_in = true;
                $_SESSION["logged_user"] = $logged_user; //Var een $_SESSION Var maken voor acces op andere pagina's

                if ($medewerker['functie'] == "administrator") {

                    $_SESSION["isAdmin"] = true; // een admin boolean maken voor admin acces op andere pagina's (Admin page)

                } 
            }
        };

    if ($logged_in == true) {

        

        $sql = $conn->prepare("
                                insert into log values 
                                (
                                    :naam, :tijd
                                )
                            ");  // query voor de inlog-Log 
      
        $sql->execute([
                          "naam"  => $logged_user,
                          "tijd"  => $currentTime
                      ]);

                      $_SESSION["logged_in"] = true;

        header("Location: ../homePagina.php"); // redirect naar de homepagina als de login succevol is
        exit();

    } else {

        echo "<h3 class=\"klantIdHeader\">Verkeerde gebruikersnaam/wachtwoord!"; //opnieuw inloggen text + teruglink naar login pagina
        echo "<h3 class='terugLink'><a href='login.php'>Opnieuw Inloggen</a></h3>";
    } 





?>








</body>
</html>