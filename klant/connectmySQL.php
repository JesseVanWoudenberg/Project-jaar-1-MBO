<?php
$servername = "localhost";
$dbname = "garage_ertan";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",
    $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script>console.log(\"connection made\")</script>";
} 
catch (PDOException $e) {
    echo "<script>console.log(\"Connection failed!\")</script>";
}

?>
