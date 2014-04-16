<?php
//FONCTION MODIFIER

function bouton_modifier($correction){
//$ correction stocke le nom du champ à modifier

	print("<td>");
		print("<form method=\"get\" action=\"modifier.php\" name=\"bouton modifier\">");
			print("<input type=\"submit\" value=\"Modifier\">");
		print("</form>");
	print("</td>");	
}
// Fin fonction
?>



<html>
<head>
	<meta charset="utf-8">
</head>

<body>

<?php

print_r($_GET);		//	pour tester - A effacer une fois la page OK

include("index.php");
include("connexion_carnet.php");	//ajoute la page connexion_carnet.php à la page courante pour connexion à la BDD

$cle = $_GET['id'];
$prenom = $_GET['prenom'];
$nom = $_GET['nom'];
$tel = $_GET['numero_tel'];
$email = $_GET['email'];

//Affichage des champs pouvant être modifiés avec les coordonnées de l'individu selectionné lors de la recherche page rechercher.php

	print("<table border=\"1\">");			
					
		print("<caption>Modification</caption>\n");
		
		print("<tr>");	
			print("<td>Prenom :</td>");
				print("<form>");
					print("<td><input type=\"text\" name=\"prenom\" value = \"$prenom\"></td>");
				print("</form>");
			print("</td>");
			print(bouton_modifier($prenom));
		print("</tr>\n");
		
		print("<tr>");
			print("<td>Nom :</td>");
				print("<form>");
					print("<td><input type=\"text\" name=\"nom\" value=\"$nom\"></td>");
				print("</form>");
			print("</td>");
			print(bouton_modifier($nom));
		print("</tr>\n");
		
		print("<tr>");	
			print("<td>Téléphone :</td>");
				print("<form>");
					print("<td><input type=\"text\" name=\"numero_tel\" value=\"$tel\"</td>");
				print("</form>");
			print("</td>");
			print(bouton_modifier($tel));
		print("</tr>\n");
	
		print("<tr>");	
			print("<td>E-mail :</td>");
				print("<form>");
					print("<td><input type=\"text\" name=\"email\" value=\"$email\"</td>");
				print("</form>");
			print("</td>");
			print(bouton_modifier($email));
		print("</tr>\n");
	
	print("</table>");



?>
<p>mettre message de confirmation de modification</p>

</form>

</body>
</html>