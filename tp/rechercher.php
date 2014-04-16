 <?php
 // FONCTIONS "modifier" et "supprimer
 
 function bouton_modifier($id, $prenom, $nom, $tel, $email){
	//avec passage par l'URL de la clé primaire de l'entrée à modifier <hidden>
	$_GET['id']=$id;
	$_GET['prenom']=$prenom;
	$_GET['nom']=$nom;
	$_GET['numero_tel']=$tel;
	$_GET['email']=$email;
	
	print("<td>");
		print("<form method=\"get\" action=\"modifier.php\" name=\"bouton modifier\">");
		print("<input type=\"hidden\" name=\"id\" value=".$_GET["id"].">");
		print("<input type=\"hidden\" name=\"prenom\" value=".$_GET["prenom"].">");
		print("<input type=\"hidden\" name=\"nom\" value=".$_GET["nom"].">");
		print("<input type=\"hidden\" name=\"numero_tel\" value=".$_GET["numero_tel"].">");
		print("<input type=\"hidden\" name=\"email\" value=".$_GET["email"].">");
		print("<input type=\"submit\" value=\"Modifier\">");
		print("</form>");
	print("</td>");	
 }
 
 function bouton_supprimer($id, $prenom, $nom){
	//avec passage par l'URL des variables concernant l'entrée à supprimer <hidden>
	$_GET['id']=$id;
	$_GET['prenom']=$prenom;
	$_GET['nom']=$nom;
	
	print("<td>");
		print("<form method=\"get\"  action=\"supprimer.php\" name=\"bouton supprimer\">");
		print("<input type=\"hidden\" name=\"id\" value=".$_GET["id"].">");
		print("<input type=\"hidden\" name=\"prenom\" value=".$_GET["prenom"].">");
		print("<input type=\"hidden\" name=\"nom\" value=".$_GET["nom"].">");
		print("<input type=\"submit\" value=\"Supprimer\">");
		print("</form>");
	print("</td>");
	
	//print("<a href=\"supprimer.php\">Supprimer");			//test avec lien
		
	
 }
 
 
 
 
 // FIN FONCTIONS
 ?>
 
 
 
 <?php
 
 //AJOUTER option d'affichage du carnet d'adresse complet si aucun champ n'est renseigné
 // Ajouter un message si aucun résultat n'est trouvé (si le tableau retourné est vide)
 //print_r($_GET);		//OK

include("connexion_carnet.php");	//ajoute la page connexion_carnet.php à la page courante pour connexion à la BDD
include("index.php"); 	
	
if(isset ($_GET["choix"])){			//stocke le champ choisi pour la recherche
	$choix = $_GET["choix"];			
	}
		else $choix="";				// si aucun choix dans la liste déroulante
	
if(isset ($_GET["saisie_clavier"])){	
	$saisie = $_GET["saisie_clavier"];			//stocke le texte saisi  au clavier pour la recherche
	}
		else $saisie="a saisir";				//$saisie contient une valeur quelconque afin de ne pas afficher un tableau de résultat correspondant au champ séléctionné  avec la valeur "" 

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
			<!-- <p> -->
				<select name="choix">			<!-- $_GET["choix"] = Nom OU $_GET["choix"] = Prénom OU $_GET["choix"] = Téléphone OU $_GET["choix"] = E-mail -->
					<option value="Nom" <?php if ($choix == "Nom") print("selected") ?>>Nom</option>
					<option value="Prénom" <?php if ($choix == "Prénom") print("selected") ?>>Prénom</option>
					<option value="Téléphone" <?php if ($choix == "Téléphone") print("selected") ?>>Téléphone</option>
					<option value="E-mail" <?php if ($choix == "E-mail") print("selected") ?>>E-mail</option>
				</select>
			<!-- </p> -->
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
	
	$sql = "SELECT * 
			FROM carnet
			WHERE $colonne_table = '$saisie'";			//selection de tous les champs afin de récupérer la clè primaire
	
	
	$recupere = $bdd->query($sql);	
	
		print("<table border=\"1\">");			// Affichage  Tableau et des résultats OK
			print("<caption>Résultat de la recherche</caption>\n");
				print("<tr>");			
					print("<th>Nom</th>");
					print("<th>Prénom</th>");					
					print("<th>Téléphone</th>");
					print("<th>E-mail</th>");
					print("<th></th>");		
					print("<th></th>");		
				print("</tr>\n");
		
				// corps du tableau de résultats
		while($donnees = $recupere->fetch()){		
	 			print("<tr>");
					print("<td>".$donnees['nom']."</td>");
					print("<td>".$donnees['prenom']."</td>");
					print("<td>".$donnees['numero_tel']."</td>");
					print("<td>".$donnees['email']."</td>");
					bouton_modifier($donnees['id'],$donnees['prenom'],$donnees['nom'], $donnees['numero_tel'], $donnees['email'] );				// appel fonction bouton_modifier() - sql pas encore écrit
					bouton_supprimer($donnees['id'], $donnees['prenom'],$donnees['nom']);				// appel fonction bouton_supprimer() - sql pas encore écrit
			print("</tr>\n");
			}	//fin while

		print("</table>");
	
	}
	
?>

</body>
</html>

