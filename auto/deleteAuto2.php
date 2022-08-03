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

    <h1 class="subLogo">Delete auto</h1>

    <?php
        // klantid uit het formulier halen
        $autokenteken = $_POST["autokentekenvak"];

        // klantgegevens uit de tabel halen
        require_once "../klant/connectmySQL.php";

        $autos = $conn->prepare("
                                    select  autokenteken,
                                            automerk,
                                            autotype,
                                            autokmstand,
                                            klantid
                                    from    auto
                                    where   autokenteken = :autokenteken
                                ");
        $autos->execute(["autokenteken" => $autokenteken]);

        //klantgegevens laten zien
        echo "<table class='content-table'>";
        foreach($autos as $auto)
            {
                echo "<tr>";
                    echo "<td>" . $auto["autokenteken"] . "</td>";
                    echo "<td>" . $auto["automerk"] . "</td>";
                    echo "<td>" . $auto["autotype"] . "</td>";
                    echo "<td>" . $auto["autokmstand"] . "</td>";
                    echo "<td>" . $auto["klantid"] . "</td>";
                echo "<tr>";
            }
        echo "</table><br />";

        echo "<form action='deleteAuto3.php' method='post' class='createKlantForm'>";
            // klantid mag niet meer gewijzigd worden
            echo "<input type='hidden' name='autokentekenvak' value=$autokenteken>";
            // waarde 0 doorgegeven als er niet gecheckt wordt
            echo "<input type='hidden' name='verwijdervak' value='0'>";
            echo "<input type='checkbox' name='verwijdervak' value='1'>";
            echo " Wilt u deze auto verwijderen? <br />";
            echo "<input type='submit'>";
        echo "</form>";
    ?>

<h3 class="terugLink"><a href="index.php">Terug</a></h3>

</body>
</html>