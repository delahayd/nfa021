
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

//FAIRE 4 TRAITEMENTS DIFFERENTS SELON LE CHOIX DE LA LISTE DEROULANTE - Nom, prenom, numero_tel, email
print_r($_GET);		//	pour tester - A effacer une fois la page OK

if(isset ($_GET["choix"])){	
	$choix = $_GET["choix"];			//stocke le champ choisi pour la recherche
	
	
		//Formulaire de saisie pour la recherche

	}	

	//formulaire de recherche par choix
		
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
		<form method = "get" action = "rechercher.php">
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
if(!empty ($_GET["choix"]))
	print ($choix." à rechercher: ");				//affiche le champ choisi pour le recherche si on vient de valider un choix - sinon pas d'affichage
?>
</body>
</html>

