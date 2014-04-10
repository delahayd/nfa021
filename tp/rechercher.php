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

 