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
    <title>Klant toevoegen</title>
</head>
<body class="bodyClass">

      <?php

        $klantid       = NULL;
        $klantnaam     = $_POST["klantnaamvak"];
        $klantadres    = $_POST["klantadresvak"]; 
        $klantpostcode = $_POST["klantpostcodevak"];
        $klantplaats   = $_POST["klantplaatsvak"];

        require_once "connectmySQL.php";

        $sql = $conn->prepare("
                                insert into klant values
                                (
                                    :klantid, :klantnaam, :klantadres,
                                    :klantpostcode, :klantplaats
                                )
                            ");

        $sql->execute([
                        "klantid" => $klantid,
                        "klantnaam" => $klantnaam,
                        "klantadres" => $klantadres,
                        "klantpostcode" => $klantpostcode,
                        "klantplaats" => $klantplaats
                    ]);
        
        echo "<h2 class='klantIdHeader'> De klant is toegevoegd</h2>"
      ?>

<h3 class="terugLink"><a href="index.php">Terug</a></h3>

    </body>
</html>