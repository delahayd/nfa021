
<?php

include("index.php");
include("connexion_carnet.php");	//ajoute la page connexion_carnet.php à la page courante pour connexion à la BDD

$cle = $_GET['id'];
$colonne="";
$nouvelle_valeur="";
//print_r($_GET);		//	pour tester - A effacer une fois la page OK

if (isset ($_GET['modif_prenom'])){
	$_GET['prenom'] = $_GET['modif_prenom'];
	$nouvelle_valeur = $_GET['modif_prenom'];
	$colonne = "prenom";
}

if (isset ($_GET['modif_nom'])){
	$_GET['nom'] = $_GET['modif_nom'];
	$nouvelle_valeur = $_GET['modif_nom'];
	$colonne = "nom";
}

if (isset ($_GET['modif_numero_tel'])){
	$_GET['numero_tel'] = $_GET['modif_numero_tel'];
	$nouvelle_valeur = $_GET['modif_numero_tel'];
	$colonne = "numero_tel";
}

if (isset ($_GET['modif_email'])){
	$_GET['email'] = $_GET['modif_email'];
	$nouvelle_valeur = $_GET['modif_email'];
	$colonne = "email";
}

if( isset($_GET['modif_prenom']) || isset ($_GET['modif_nom']) || isset ($_GET['modif_numero_tel']) || isset ($_GET['modif_email'])){
	$sql = "UPDATE carnet
			SET $colonne  = '$nouvelle_valeur'
			WHERE id = $cle";
	
		try	{
			$bdd -> exec($sql);	
			print("<p><font color = \"lime\">La modification est effectuée</font></p>");
			} 
			catch (exception $e){
				die('error :' .$e ->getMessage());
			}
	}	
/*	//	pour tester - A effacer une fois la page OK
print_r($_GET);	
print("<br>");									
print("colonne = ".$colonne);
print("<br>");						
print("nouvelle valeur = ".$nouvelle_valeur);	
*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>

<body>

<?php

$prenom = $_GET['prenom'];
$nom = $_GET['nom'];
$tel = $_GET['numero_tel'];
$email = $_GET['email'];

//Affichage des champs pouvant être modifiés avec les coordonnées de l'individu selectionné lors de la recherche page rechercher.php

	print("<table>");			
					
		print("<caption>Modification</caption>\n");
		
		print("<tr>");	
			print("<td>Prenom :</td>");
				print("<form method=\"get\" action=\"modifier.php\" name=\"modifier\">");
					print("<td><input type=\"text\" name=\"modif_prenom\" value = \"$prenom\"></td>");
					print("<input type=\"hidden\" name=\"id\" value=".$_GET["id"].">");
					print("<input type=\"hidden\" name=\"nom\" value=".$_GET["nom"].">");
					print("<input type=\"hidden\" name=\"numero_tel\" value=".$_GET["numero_tel"].">");
					print("<input type=\"hidden\" name=\"email\" value=".$_GET["email"].">");
					print("<td><input type=\"submit\" value=\"Modifier et valider\"></td>");
				print("</form>");
			//print(bouton_modifier($prenom));
		print("</tr>\n");
		
		print("<tr>");
			print("<td>Nom :</td>");
				print("<form method=\"get\" action=\"modifier.php\" name=\"modifier\">");
					print("<td><input type=\"text\" name=\"modif_nom\" value=\"$nom\"></td>");
					print("<input type=\"hidden\" name=\"id\" value=".$_GET["id"].">");
					print("<input type=\"hidden\" name=\"prenom\" value=".$_GET["prenom"].">");
					print("<input type=\"hidden\" name=\"numero_tel\" value=".$_GET["numero_tel"].">");
					print("<input type=\"hidden\" name=\"email\" value=".$_GET["email"].">");
					print("<td><input type=\"submit\" value=\"Modifier et valider\"></td>");
				print("</form>");
			//print(bouton_modifier($nom));
		print("</tr>\n");
		
		print("<tr>");	
			print("<td>Téléphone :</td>");
				print("<form method=\"get\" action=\"modifier.php\" name=\"modifier\">");
					print("<td><input type=\"text\" name=\"modif_numero_tel\" value=\"$tel\"</td>");
					print("<input type=\"hidden\" name=\"id\" value=".$_GET["id"].">");
					print("<input type=\"hidden\" name=\"prenom\" value=".$_GET["prenom"].">");
					print("<input type=\"hidden\" name=\"nom\" value=".$_GET["nom"].">");
					print("<input type=\"hidden\" name=\"email\" value=".$_GET["email"].">");
					print("<td><input type=\"submit\" value=\"Modifier et valider\"></td>");
				print("</form>");
			//print(bouton_modifier($tel));
		print("</tr>\n");
	
		print("<tr>");	
			print("<td>E-mail :</td>");
				print("<form method=\"get\" action=\"modifier.php\" name=\"modifier\">");
					print("<td><input type=\"text\" name=\"modif_email\" value=\"$email\"</td>");
					print("<input type=\"hidden\" name=\"id\" value=".$_GET["id"].">");
					print("<input type=\"hidden\" name=\"prenom\" value=".$_GET["prenom"].">");
					print("<input type=\"hidden\" name=\"nom\" value=".$_GET["nom"].">");
					print("<input type=\"hidden\" name=\"numero_tel\" value=".$_GET["numero_tel"].">");
					print("<td><input type=\"submit\" value=\"Modifier et valider\"></td>");
				print("</form>");
			//print(bouton_modifier($email));
		print("</tr>\n");
	
	print("</table>");

?>


</form>

</body>
</html>