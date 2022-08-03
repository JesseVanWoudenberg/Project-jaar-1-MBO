<?php

session_start();

if ($_SESSION["logged_in"] == false) {
    header("Location: ../login/login.php");
} 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <title>Auto verwijderen</title>
</head>
<body class="bodyClass">
    <h1 class="subLogo">Delete Auto</h1>

    <?php
        // gegevens uit het formulier halen
        $autokenteken = $_POST["autokentekenvak"];
        $verwijderen = $_POST["verwijdervak"];

        // klantgegevens verwijderen
        if ($verwijderen)
        {
            require_once "../klant/connectmySQL.php";

            $sql = $conn->prepare("
                                    delete from auto
                                    where   autokenteken = :autokenteken
                                  ");
            $sql->execute(["autokenteken" => $autokenteken]);

            $sql = $conn->prepare("
                                    delete from auto
                                    where   autokenteken = :autokenteken
                                  ");
            $sql->execute(["autokenteken" => $autokenteken]);

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