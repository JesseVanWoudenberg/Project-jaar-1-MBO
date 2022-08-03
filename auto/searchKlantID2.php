<?php

session_start();

if ($_SESSION["logged_in"] == false) {
    header("Location: ../login/login.php");
} 

$servername = "localhost";
$dbname = "garage_ertan";
$username = "root";
$password = "";

$klantid = $_POST["klantidvak"];

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

$mysqli = new mysqli($servername, $username, $password, $dbname);
$klantidGet = $mysqli->query("SELECT * from klant WHERE klantid = $klantid");
$klantnaamGet=$klantidGet->fetch_assoc();

if (isset($klantnaamGet['klantnaam'])) {

echo "<h2 class='klantIdHeader'>" . "Klant Naam: " . $klantnaamGet['klantnaam'] . "</h2>";



    ?>

    <table class="content-table">

    <tr>
        <th>Kenteken</th>
        <th>Automerk</th>
        <th>Autotype</th>
        <th>Kilometerstand</th>
    </tr>

<?php

$mysqli = new mysqli($servername, $username, $password, $dbname);
$result = $mysqli->query("SELECT * from auto WHERE klantid = $klantid");

while($row=$result->fetch_assoc()) 
{
    echo "<tr>";
    echo "<td>" . $row['autokenteken'] . "</td>";
    echo "<td>" . $row['automerk'] . "</td>";
    echo "<td>" . $row['autotype'] . "</td>";
    echo "<td>" . $row['autokmstand'] . "</td>";
    echo "</tr>";
}

$mysqli->close();

} else {

    echo "<h2 class=\"klantIdHeader\">Klant niet gevonden</h2>";
    
    }

?>

    </table>

    <h3 class="terugLink"><a href="index.php">Terug</a></h3>

  </body>
</html>