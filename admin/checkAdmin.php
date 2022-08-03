<?php 

session_start();

if ($_SESSION["logged_in"] == false) {
    header("Location: ../login/login.php");
    exit();
} 

require_once "../klant/connectmySQl.php";

$correctUsername = false;

$medewerkersGet = $conn->prepare("
select naam,
       functie
from   medewerker
");

$medewerkersGet->execute();

foreach($medewerkersGet as $medewerker)
{
    if ($medewerker["naam"] == $_SESSION["logged_user"]) {

        $correctUsername = true;

          if ($medewerker['functie'] == "administrator") {
          } else {
          header("Location: ../homePagina.php");
          exit();    

          }
        
    } else {
    }
};

if ($correctUsername == false) {
    header("Location: ../login/login.php");
    exit();   
}

?>