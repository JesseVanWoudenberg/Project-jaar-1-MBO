<?php

session_start();

if ($_SESSION["logged_in"] == false) {
    header("Location: ../login/login.php");
} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <title>Klant verwijderen</title>
</head>
<body class="bodyClass">
    
<?php

$klantid = $_POST["klantidvak"];

require_once "connectmySQL.php";

$klanten = $conn->prepare("
                            select klantid,
                            klantnaam,
                            klantadres,
                            klantpostcode,
                            klantplaats
                            from   klant
                            where  klantid = :klantid    
                        ");

    $klanten->execute(["klantid" => $klantid]);

?>
    <table class="content-table">
    <thead>
         <tr>
           <th>KlantID</th>
           <th>Naam</th>
            <th>adres</th>
            <th>postcode</th>
            <th>plaats</th>
          </tr>
      </thead>
      <tbody>

<?php
    foreach($klanten as $klant)
        {
            echo "<tr>";
                echo "<td>" . $klant["klantid"] . "</td>";
                echo "<td>" . $klant["klantnaam"] . "</td>";
                echo "<td>" . $klant["klantadres"] . "</td>";
                echo "<td>" . $klant["klantpostcode"] . "</td>";
                echo "<td>" . $klant["klantplaats"] . "</td>";
            echo "</tr>";
        }
    echo "</tbody/>";
    echo "</table><br>";

    echo "<form action = \"deleteKlant3.php\" method=\"post\" class=\"createKlantForm\">";

        echo "<input type=\"hidden\" name=\"klantidvak\" value=$klantid>";
        
        echo "<input type=\"hidden\" name=\"verwijdervak\" value=\"0\">";
        echo "<input type=\"checkbox\" name=\"verwijdervak\" value=\"1\">";
        echo " Verwijder deze klant <br>";
        echo "<input type=\"submit\">";
    echo "</form>";
?>

<h3 class="terugLink"><a href="index.php">Terug</a></h3>

</body>
</html>