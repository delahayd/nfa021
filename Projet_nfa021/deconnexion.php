<?php
// On demarre la session
session_start();
 
// On détruit les variables de la session
//$_SESSION = array();
session_unset();
 
// On détruit la session
session_destroy();
 
// On redirige le visiteur vers la page d'accueil
header ('Location: index.php');
?>

