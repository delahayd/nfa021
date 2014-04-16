<html>
<head>
	<meta charset="utf-8">
</head>

<body>
<?php
//Zone de traitement du formulaire de suppression
// Cette page devra être appelée par la page rechercher.php - Un bouton "supprimer " en face de chaque nom affiché lors de la recherche

include("index.php");
include("connexion_carnet.php");	//ajoute la page connexion_carnet.php à la page courante pour connexion à la BDD
?>

<form action="supprimer.php" method="GET"/>
<p>mettre message de confirmation de suppression</p>

</form>
</body>
</html>