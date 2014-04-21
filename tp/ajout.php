<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>

<?php
//Zone de traitement du formulaire d'ajout // INSERTION OK
// AJOUTER un message de confirmation quand une entrée en enregistrée dans la BDD

include("index.php");
include("connexion_carnet.php");	//ajoute la page connexion_carnet.php à la page courante pour connexion à la BDD


if(!empty ($_GET["nom"]) || !empty ($_GET["prenom"]))			//si nom OU prenom renseigné
	{
		//print_r($_GET);		//	pour tester - A effacer une fois la page OK
		$nom = $_GET["nom"];
		$prenom = $_GET["prenom"];
		$tel = $_GET["numero_de_telephone"];
		$email = $_GET["email"];
		
		try
			{$bdd ->exec("INSERT INTO carnet (nom, prenom, numero_tel, email)
					VALUES ('$nom', '$prenom', '$tel', '$email')");
					
			print("Le contact \"".$prenom." ". $nom."\" est bien enregistré ");
			}	catch (exception $e){
				die('error :' .$e ->getMessage()); 
				}
				
	}

	// purge du formulaire - Evite de saisir plusieurs fois le même individu si on valide de nouveau
		$_GET["nom"]="";
		$_GET["prenom"]="";
		$_GET["numero_de_telephone"]="";
		$_GET["email"]="";
		
?>

<form action="ajout.php" method="GET"/>
<p>Inserer une personne</p>
nom:<input type="text" name="nom"/><br>
prenom:<input type="text" name="prenom"/><br>
numero_tel:<input type="text" name="numero_de_telephone"/><br>
email:<input type="email" name="email"/><br>
<input type="submit" name="valider"/>
</form>
</body>
</html>


