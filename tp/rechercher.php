
 <?php
 //print_r($_GET);		//OK
include("index.php");
include("connexion_carnet.php");	//ajoute la page connexion_carnet.php à la page courante pour connexion à la BDD
	
if(isset ($_GET["choix"])){			//stocke le champ choisi pour la recherche
	$choix = $_GET["choix"];			
	}
		else $choix="";				// si aucun choix dans la liste déroulante
	
if(isset ($_GET["saisie_clavier"])){	
	$saisie = $_GET["saisie_clavier"];			//stocke le texte saisi  au clavier pour la recherche
	}

//print_r($saisie);		//OK
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>

<body>
	<br>
	<p>rechercher une personne par <p>
		<form method = "get" action = "rechercher.php">  <?php //formulaire de recherche par choix ?>
			<p>
				<select name="choix">			<!-- $_GET["choix"] = Nom OU $_GET["choix"] = Prénom OU $_GET["choix"] = Téléphone OU $_GET["choix"] = E-mail -->
					<option value="Nom" <?php if ($choix == "Nom") print("selected") ?>>Nom</option>
					<option value="Prénom" <?php if ($choix == "Prénom") print("selected") ?>>Prénom</option>
					<option value="Téléphone" <?php if ($choix == "Téléphone") print("selected") ?>>Téléphone</option>
					<option value="E-mail" <?php if ($choix == "E-mail") print("selected") ?>>E-mail</option>
				</select>
			</p>
				<input type="submit" value="Valider" title="valider votre choix">
		</form>
		
<?php
if(!empty ($_GET["choix"])){
	//print ($choix." à rechercher: ");				//affiche le champ choisi pour le recherche si on vient de valider un choix - sinon pas d'affichage  OK
?>	
	<!-- champ de saisie du terme à rechercher -->
	<form method="get" action="rechercher.php">
		<?php print($choix.": "); ?>
		<input type="text" name="saisie_clavier">
		<input type="hidden" name="choix" value="<?php print($_GET["choix"]); ?>">>
		<input type="submit" value="Recherche" title="Lancer la recherche" >
	</form>
	
	
<?php	
	// Requete Sql d'affichage de tous les champs de l'individu recherché 
	if($choix == "Nom") $colonne_table = "nom";
	if($choix == "Prénom") $colonne_table = "prenom";
	if($choix == "Téléphone") $colonne_table = "numero_tel";
	if($choix == "E-mail") $colonne_table = "email";
	
	//print_r($_GET);			//OK
	//print($choix);		// variable $choix OK
	//print ("saisie clavier = ".$saisie);				//variable inconnue
	
	$sql = "SELECT * 
			FROM carnet
			WHERE $colonne_table = '$saisie'";			//selection de tous les champs afin de récupérer la clè primaire
	
	
	$recupere = $bdd->query($sql);	
	//$donnees = $recupere->fetch();

		print("<table border=\"1\">");			// Affichage  Tableau et des résultats OK
			print("<caption>Résultat de la recherche</caption>");
				print("<tr>");			
					print("<th>Nom</th>");
					print("<th>Prénom</th>");					
					print("<th>Téléphone</th>");
					print("<th>E-mail</th>");
					print("<th></th>");		
					print("<th></th>");		
				print("</tr>");
		
				// corps du tableau de résultats
		while($donnees = $recupere->fetch()){		
	 			print("<tr>");
					print("<td>".$donnees['nom']."</td>");
					print("<td>".$donnees['prenom']."</td>");
					print("<td>".$donnees['numero_tel']."</td>");
					print("<td>".$donnees['email']."</td>");
					print("<td>bouton MODIFIER</td>");				// sql pas encore écrit
					print("<td>bouton SUPPRIMER</td>");				// sql pas encore écrit
			print("</tr>");
			}	//fin while

		print("</table>");
	
	}
	
?>

</body>
</html>

