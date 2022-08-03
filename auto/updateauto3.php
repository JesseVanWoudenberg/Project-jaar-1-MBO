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
    <title>Auto gegevens veranderen</title>
</head>
<body class="bodyClass">
    <h1 class="subLogo">Update Auto</h1>

    <?php 

error_reporting (E_ALL ^ E_NOTICE);
   


        $klantid    = $_POST["klantidvak"];
        $automerk   = $_POST["automerkvak"];
        $autokmstand    = $_POST["autokmstandvak"];
        $autotype    = $_POST["autotypevak"];
        $autokenteken    = $_POST["autokentekenvak"];
         
     

        require_once "../klant/connectmySQL.php";



        $sql = $conn->prepare
        ("
            update auto set     klantid   = :klantid,
                                automerk   = :automerk,
                                autokmstand   = :autokmstand,
                                autotype   = :autotype,
                                autokenteken = :autokenteken
                                where   klantid = :klantid
        ");

        $sql->execute
        ([

            "klantid"   => $klantid,
            "automerk"   => $automerk,
            "autokmstand"   => $autokmstand,
            "autotype"   => $autotype,
            "autokenteken"   => $autokenteken
        ]);

        echo "<h2 class='klantIdHeader'>De gegevens zijn gewijzigd</h2>";
        echo "<h3 class='terugLink'><a href='index.php'>Terug</a></h3>";

?>



</body>
</html>