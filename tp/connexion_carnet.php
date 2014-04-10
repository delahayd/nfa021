<?php

try{
$bdd=new PDO('mysql:host=localhost;dbname=carnet_adresse','root','');
echo 'bbb';
}
catch(exception $e)
{
die('error :' .$e->getMessage());
}
?>