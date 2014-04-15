 <?php
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
*/

/*
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

if($_GET["choix"] = "nom"){
}

if($_GET["choix"] = "prenom"){
}

if($_GET["choix"] ="numero_tel"){
}

if($_GET["choix"] ="email"){
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
	<form method = "get" action = "rechercher.php">
		<p>
			<select name="choix">			<!-- $_GET["choix"] = nom OU $_GET["choix"] = prenom OU $_GET["choix"] = numero_tel OU $_GET["choix"] = email -->
				<option value="nom">Nom</option>
				<option value="prenom">Prénom</option>
				<option value="numero_tel">Téléphone</option>
				<option value="email">E-mail</option>
			</select>
		</p>
		<input type="submit" value="Rechercher" title="valider votre choix" />
	</form>
</body>
</html>