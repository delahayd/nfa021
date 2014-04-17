
<?php

try{
$bdd=new PDO('mysql:host=localhost;dbname=carnet_adresse','root','root');
print("<br>");
//echo 'connexion établie';
}
catch(exception $e)
{
die('error :' .$e->getMessage());
}
?>