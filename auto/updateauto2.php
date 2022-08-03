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
    
    $kenteken = $_POST["autokentekenvak"];

    require_once "../klant/connectmySQL.php";

    $autos = $conn->prepare("
                                select autokenteken,
                                       automerk,
                                       autotype,
                                       autokmstand,
                                       klantid
                                from   auto
                                where  autokenteken = :autokenteken
                            ");
    $autos->execute(["autokenteken" => $kenteken]);

    
    echo "<form action='updateauto3.php' method='POST' class='createKlantForm'>";
    foreach($autos as $auto) {

            echo " <h4>klantid:" . $auto["klantid"] . "</h4>";
            echo " <input type='hidden' name='klantidvak' ";
            echo " value=' " . $auto["klantid"] . " '> <br />";

            echo " autokenteken: <input type='text' ";
            echo " name  = 'autokentekenvak' ";
            echo " value = '" .$auto["autokenteken"] . "' ";
            echo " > <br />";

            echo " automerk: <input type='text' ";
            echo " name  = 'automerkvak' ";
            echo " value = '" .$auto["automerk"] . "' ";
            echo " > <br />";

            echo " autotype: <input type='text' ";
            echo " name  = 'autotypevak' ";
            echo " value = '" .$auto["autotype"]  . "' ";
            echo " > <br />";

            echo " autokmstand: <input type='text' ";
            echo " name  = 'autokmstandvak' ";
            echo " value = '" .$auto["autokmstand"] . "' ";
            echo " > <br />";
        }
        echo "<input type='submit'>";
    echo "</form>";
    
    ?>


<h3 class="terugLink"><a href="index.php">Terug</a></h3>
</body>
</html>