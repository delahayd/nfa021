<html>
<head>
</head>

<body>
	<a href="formulaire.php"> <input type="button" name="ajouter" value="ajouter une personne" /></a>
	<h1>rechercher une personne</h1>
	<select>
		<option value="nom">nom</option>
		<option value="prenom">prenom</option>
		<option value="numero_tel">numero_tel</option>
		<option value="email">email</option>
	</select>
</body>
</html>



 <?php

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
?>