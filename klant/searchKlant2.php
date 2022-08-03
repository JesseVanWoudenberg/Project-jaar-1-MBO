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
    <title>Zoek op KlantID</title>
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
    <table class='content-table'>
    <thead>
         <tr>
           <th>KlantID</th>
           <th>Klantnaam</th>
            <th>Klantadres</th>
            <th>klantpostcode</th>
            <th>klantplaats</th>
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
?>

    </tbody>
    </table>
    <h3 class="terugLink"><a href="index.php">Terug</a></h3>

</body>
</html>