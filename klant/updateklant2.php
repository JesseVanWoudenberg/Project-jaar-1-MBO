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
    <title>Klant gegevens aanpassen</title>
</head>
<body class="bodyClass">
    <h1 class="subLogo">Update Klant</h1>

    <?php 
    
    $klantid = $_POST["klantidvak"];

    require_once "../klant/connectmySQL.php";

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

    echo "<form action='updateklant3.php' method='POST' class='createKlantForm'>";
    foreach($klanten as $klant) {

            echo " <h4>klantid:" . $klant["klantid"] . "</h4>";
            echo " <input type='hidden' name='klantidvak' ";
            echo " value=' " . $klant["klantid"] . " '> <br />";

            echo " klantnaam: <input type='text' ";
            echo " name  = 'klantnaam' ";
            echo " value = '" .$klant["klantnaam"] . "' ";
            echo " > <br />";

            echo " klantadres: <input type='text' ";
            echo " name  = 'klantadres' ";
            echo " value = '" .$klant["klantadres"] . "' ";
            echo " > <br />";

            echo " klantpostcode: <input type='text' ";
            echo " name  = 'klantpostcode' ";
            echo " value = '" .$klant["klantpostcode"]  . "' ";
            echo " > <br />";

            echo " klantplaats: <input type='text' ";
            echo " name  = 'klantplaats' ";
            echo " value = '" .$klant["klantplaats"] . "' ";
            echo " > <br />";
        }
        echo "<input type='submit'>";
    echo "</form>";
    
    ?>

<h3 class="terugLink"><a href="index.php">Terug</a></h3>
</body>
</html>