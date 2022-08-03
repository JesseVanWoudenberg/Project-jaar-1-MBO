<?php /* dit checkt of degene die op de pagina zit is ingloged of niet,
         zo niet dan wordt de gebruikers terugf naar het login schermt gestuurd */
         
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
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
    <title>Home</title>
</head>

<body class="bodyClass">

<ul class="headerMainPage">
    <li><i class="fas fa-user"></i>Ingelogd als: <?php echo $_SESSION["logged_user"]; ?></li>
    <li><i class="fas fa-user"></i><a href="login/login.php">uitloggen</a></li>
    <li><i class="fas fa-user"></i><a href="account/index.php">Account</a></li>
  </ul>

<h1 class="logo">Garage Ertan</h1>

<h2 class="subLogo">HOME</h2>

<ul class="selectionLinks">
    <li><a href="auto/index.php">Auto</a></li>
    <li><a href="klant/index.php">Klant</a></li>
    <?php 

    if ($_SESSION['isAdmin'] == true) {
    echo "<li><a href='admin/index.php'>Admin</a></li>";
    }
    ?>
</ul>

</body>
</html>