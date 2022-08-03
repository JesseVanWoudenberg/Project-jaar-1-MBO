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
    <title>Account</title>
</head>
<body class="bodyClass">

<h3 class="terugLink"><a href="../homePagina.php">Terug</a></h3>

<?php

    require_once "../klant/connectmySQL.php";

    $medewerkers = $conn->prepare("
                                    select *
                                    from medewerker
                                    where naam = :naam
                                 ");
    $medewerkers->execute(["naam" => $_SESSION["logged_user"]]);
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
    foreach($medewerkers as $medewerker) {

        echo "<tr>";
            echo "<td>" . $medewerker["naam"] . "</td>";
            echo "<td>" . $medewerker["functie"] . "</td>";
            echo "<td>" . $medewerker["gebruikersnaam"] . "</td>";
            echo "<td>" . $medewerker["wachtwoord"] . "</td>";
        echo "</tr>";
    };
?>
    </tbody>
    </table>
    <h3 class="terugLink"><a href="veranderww.php">Verander Wachtwoord</a></h3>


    
</body>
</html>