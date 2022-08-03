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
    <title>Zoek op Nummerbord</title>
</head>
<body class="bodyClass">

<h1 class="subLogo">Zoeken op nummerbord</h1>

    <?php
    
    $klantnummerboord = $_POST["nummerboordidvak"];

    require_once "../klant/connectmySQL.php";

    $klanten = $conn->prepare("
                                select autokenteken,
                                       autokmstand,
                                       automerk,
                                       autotype,
                                       klantid
                                from   auto
                                where  autokenteken = :autokenteken
                             ");
    $klanten->execute(["autokenteken" => $klantnummerboord]);

?>
    <table class='content-table'>
      <thead>
         <tr>
           <th>Autokenteken</th>
           <th>Kilometerteller</th>
            <th>Merk</th>
            <th>Model</th>
            <th>KlantID</th>
          </tr>
      </thead>
      <tbody>
<?php
    foreach($klanten as $klant)
        {
            echo "<tr>";
                 echo "<td>" . $klant["autokenteken"] . "</td>";
                 echo "<td>" . $klant["autokmstand"] . "</td>";
                 echo "<td>" . $klant["automerk"] . "</td>";
                 echo "<td>" . $klant["autotype"] . "</td>";
                 echo "<td>" . $klant["klantid"] . "</td>";
            echo "</tr>";
        };
?>

    </tbody>
    </table>
    <h3 class="terugLink"><a href="index.php">Terug</a></h3>
    
</body>
</html>