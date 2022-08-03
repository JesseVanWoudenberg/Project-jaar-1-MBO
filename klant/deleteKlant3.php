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
        $verwijderen = $_POST["verwijdervak"];

        if ($verwijderen)
        {
            require_once "connectmySQL.php";

            $sql = $conn->prepare("
                                    delete from klant
                                    where klantid = :klantid
                                 ");
            $sql->execute(["klantid" => $klantid]);

            echo "<h2 class='klantIdHeader'>de gegevens zijn verwijderd</h2>";

        }
        else
        {
            echo "<h2 class='klantIdHeader'>De gegevens zijn niet verwijderd</h2>";
        }

        echo "<h3 class='terugLink'><a href='index.php'>Terug</a></h3>";

    ?>

</body>
</html>