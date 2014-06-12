<?php

$server = "127.0.0.1";
$user = "root";
$pass = "root";
$bdd = "projet_nfa021";

try
{
	$bdd = new PDO("mysql:host=$server ;dbname=$bdd", $user, $pass);
	$bdd->exec("set names utf8");
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>