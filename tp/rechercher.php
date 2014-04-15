
 <?php
 if(!isset($_choix))
	$_choix="";
/*
$nom=$_POST['nom'];
 
echo "$nom";
 $bdd =new PDO (' mysql:host=localhost; dbname=carnet_adresse', 'root', ' ');

// on recupere le contenu de la tab carnet dont le nom est le nom entre par l'utilisateur 
$recherche= $bdd ->query ('SELECT * FROM  carnet WHERE NOM="'.$nom.'"');
// on affiche chaque entree une a une
while ( $donnees=$recherche>fetch() )
{
<p>
echo $donnes['nom'];
</p>
}

$modifier= $bdd ->query ('SELECT * FROM  carnet WHERE NOM="'.$nom.'"');
// on affiche chaque entree une a une
while ( $donnees=$reponse->fetch() )
{
<p>
echo $donnes['nom'];
</p>
}
*/

//print_r($_GET);		//	pour tester - A effacer une fois la page OK

if(isset ($_GET["choix"])){	
	$choix = $_GET["choix"];			//stocke le champ choisi pour la recherche
	}	
	
	include("index.php");
	include("connexion_carnet.php");	//ajoute la page connexion_carnet.php à la page courante pour connexion à la BDD
?>

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
					<option value="Nom" <?php if (isset ($choix) && ($choix == "Nom")) print("selected") ?>>Nom</option>
					<option value="Prénom" <?php if (isset ($choix) && ($choix == "Prénom")) print("selected") ?>>Prénom</option>
					<option value="Téléphone" <?php if (isset ($choix) &&($choix == "Téléphone")) print("selected") ?>>Téléphone</option>
					<option value="E-mail" <?php if (isset ($choix) &&($choix == "E-mail")) print("selected") ?>>E-mail</option>
				</select>
			</p>
				<input type="submit" value="Valider" title="valider votre choix" />
		</form>
		
<?php
if(!empty ($_GET["choix"])){
	//print ($choix." à rechercher: ");				//affiche le champ choisi pour le recherche si on vient de valider un choix - sinon pas d'affichage
?>	

	<!-- champ de saisie du terme à rechercher -->
	<form method=\"get\" action=\"rechercher.php\">
		<?php print($choix.": "); ?><input type="text" name="saisie_clavier"/>
		<input type="submit" value="Recherche" title="Lancer la recherche" />
	</form>
	
	
<?php	
	// Requete Sql d'affichage de tous les champs de l'individu recherché 
	if($choix == "Nom") $colonne_table = "nom";
	if($choix == "Prénom") $colonne_table = "prenom";
	if($choix == "Téléphone") $colonne_table = "numero_tel";
	if($choix == "E-mail") $colonne_table = "email";
	
	$sql = 'SELECT * FROM carnet
			WHERE $colonne_table = $_GET["saisie_clavier"]';
			
	$recupere = $bdd -> query($sql);			

		print("<table border=\"1\">");			// résultats dans un tableau
		print("<caption>Résultat de la recherche</caption>");
			print("<tr>");			//	Entête du tableau de résultat
				print("<th>Nom</th>");
				print("<th>Prénom</th>");					
				print("<th>Téléphone</th>");
				print("<th>E-mail</th>");
				print("<th>A traiter</th>");		//cellule à laisser vide
				print("<th>A traiter</th>");		//cellule à laisser vide
			print("</tr>");
	
			// corps du tableau de résultats
	while ($donnees = $recupere ->fetch()){		//Fatal error: Call to a member function fetch() on a non-object in C:\wamp\www\nfa021\tp\rechercher.php on line 97
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

