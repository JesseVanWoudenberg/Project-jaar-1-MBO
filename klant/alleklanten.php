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
    <title>Alle klanten weergeven</title>
</head>
<body class="bodyClass">

<?php

require_once "../klant/connectmySQL.php";

    $klanten = $conn->prepare("

                            SELECT *
                            FROM klant

                         ");
    $klanten->execute();
?>

<table class='content-table'>
    <thead>
         <tr>
           <th>klantid</th>
           <th>naam</th>
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
?>

</tbody>
    </table>
    <h3 class="terugLink"><a href="index.php">Terug</a></h3>
    
</body>
</html>