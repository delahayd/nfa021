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

$cle=$_GET['id'];
$prenom=$_GET['prenom'];
$nom=$_GET['nom'];
print($cle." ".$prenom." ".$nom);		// test OK. A supprimer quand page terminée

$sql = "DELETE  
		FROM carnet
		WHERE id = $cle";			//supprime la personne selectionnée dans la BDD

	try{		
		$bdd -> exec($sql);					//OK la requete fonctonne. Suppression OK
	}catch(Exception $e){
		die('Erreur : '.$e ->getMessage());
	}	

	print("<p>Le contact  \" ".$prenom." ".$nom." \" vient d'être supprimé</p>");
?>




</body>
</html>


