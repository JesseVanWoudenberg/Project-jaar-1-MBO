<?php

include "checkAdmin.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
    <title>Delete Medewerker</title>
</head>
<body class="bodyClass">
    
<?php

        $medewerkerNaam = $_POST["medewerkerNaam"];
        $verwijderen = $_POST["verwijdervak"];

        if ($verwijderen)
        {
            require_once "../klant/connectmySQL.php";

            $sql = $conn->prepare("
                                    delete from medewerker
                                    where naam = :medewerkerNaam
                                 ");
            $sql->execute(["medewerkerNaam" => $medewerkerNaam]);

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