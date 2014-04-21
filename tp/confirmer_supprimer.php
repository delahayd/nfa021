<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>

<body>
<?php

include("index.php");
include("connexion_carnet.php");	//ajoute la page connexion_carnet.php à la page courante pour connexion à la BDD

//print_r($_GET);			//a effacer quand tout est OK

$nom_a_supprimer = $_GET["prenom"]." ".$_GET["nom"];
print("<form action=\"supprimer.php\" method=\"GET\">");
	//print("<p>Confirmer la suppression</p>");
	print("<input type=\"hidden\" name=\"id\" value=".$_GET["id"].">");
	print("<input type=\"hidden\" name=\"prenom\" value=".$_GET["prenom"].">");
	print("<input type=\"hidden\" name=\"nom\" value=".$_GET["nom"].">");
	print("<input type=\"submit\" value=\"Confirmer la suppression de $nom_a_supprimer\">");
print("</form>");




?>

</body>
</html>