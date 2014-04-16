<html>
<head>
	<meta charset="utf-8">
</head>

<body>
<?php
//Zone de traitement du formulaire de modification 
// Cette page devra être appelée par la page rechercher.php - Un bouton "modifier " en face de chaque nom affiché lors de la recherche


print_r($_GET);		//	pour tester - A effacer une fois la page OK


include("index.php");
include("connexion_carnet.php");	//ajoute la page connexion_carnet.php à la page courante pour connexion à la BDD
?>



<form action="modifier.php" method="GET"/>
<p>mettre message de confirmation de modification</p>

</form>
</body>
</html>