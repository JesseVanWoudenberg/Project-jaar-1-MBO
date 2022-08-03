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
    <title>Clear Log</title>
</head>
<body class="bodyClass">
    
<?php

require_once "../klant/connectmySQL.php";

$clearLog = $conn->prepare("

                                DELETE FROM log

                          ");

$clearLog->execute();
?>

<h2 class='klantIdHeader'>Inlog log is leeg gemaakt</h2>

<h3 class="terugLink"><a href="index.php">Terug</a></h3>

</body>
</html>