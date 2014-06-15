<?php
 include('../Connections/connexion_bdd_mysqli.php');				//mysqli 
 include('../fonctions.php');								//inclu le fichier fonctions.php à la page	

$lien = mysqli_connect($server, $user, $pass, $bdd);				//variable pour mysql

//on demarre la session
session_start();
?>


<!DOCTYPE html>

<?php// print_r($_session); ?>

<html lang="fr">
<head>
	<title>Gestion des utilisateurs</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="../css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<link href="../css/style.css" rel="stylesheet" media="screen"> 
</head>

<?php
if(isset($_SESSION['pseudo']) AND isset($_SESSION['prenom']))
		{
			// si utilisateur est administrateur afficher menu latéral gauche avec options supplémentaires
			if(isset ($_SESSION['administrateur']) AND ($_SESSION['administrateur'] == 1))		
				include('aside.php'); 
		}	
?>

<body>
<?php 	
			
			print("<font color =\"green\">". $_SESSION['prenom']."</font><br>"); 
			include('menu_admin.php'); 
				
	
//		<_________________________________________________traitement du formulaire_____________________________________________________>

if(isset($_SESSION['administrateur']) && ($_SESSION['administrateur'] == 1))		//si administrateur afficher la page
	{

	if (isset($_POST['cle_utilisateur']))			// si non administrateur
		{
			$cle = $_POST['cle_utilisateur'];
		
					$sql_select_admin ="SELECT administrateur, pseudo
										FROM utilisateur
										WHERE id_utilisateur = $cle";
										
					$query_select_admin= mysqli_query($lien, $sql_select_admin);	//execute la requete
					
					while($donnees = mysqli_fetch_assoc($query_select_admin))
						{
						$est_admin = $donnees['administrateur'];				//$est_admin = 0 ou 1 - booleen
						$pseudo = $donnees['pseudo'];
						}
						
					if ($est_admin)
						{
						print("Retirer les droits d'administrateur de ".$pseudo." ?");
						
						$sql_modif_admin = "UPDATE utilisateur
											SET administrateur = '0'
											WHERE id_utilisateur = $cle";
						
						$query_modif_adminr= mysqli_query($lien, $sql_modif_admin);		
							
							print("<div class =\"form-group\">");
								 print("<div class=\"col-md-4\">");
									print("<input class=\"btn btn-primary\" type = \"submit\" value = \"Valider\"/>");
								print("</div>");	
							print("</div>");	
						}
						
						else
							{
							print("Ajouter les droits d'administrateur à ".$pseudo." ?");
							
							$sql_modif_admin = "UPDATE utilisateur
											SET administrateur = '1'
											WHERE id_utilisateur = $cle";
						
						$query_modif_adminr= mysqli_query($lien, $sql_modif_admin);	
						
							print("<div class =\"form-group\">");
								 print("<div class=\"col-md-4\">");
									print("<input class=\"btn btn-primary\" type = \"submit\" value = \"Valider\"/>");
								print("</div>");	
							print("</div>");
					
							}
			
		}

		
	else				// si aucun choix
		{
					$sql_select_user ="SELECT id_utilisateur, prenom, nom, pseudo, email, sexe, administrateur
										FROM utilisateur";
										
					$query_select_user= mysqli_query($lien, $sql_select_user);
					
					print("<form method=\"post\"  action=\"modif_utilisateur.php\">");	
						print("<div class =\"form-group\">");
							print("<select name =\"cle_utilisateur\" class=\"form-control\">");
									while($donnees = mysqli_fetch_assoc($query_select_user))
										{
										$id = $donnees['id_utilisateur'];		//facilite saisie ligne suivante
										print("<option value =\"$id\">".$donnees['prenom']." ".$donnees['nom']." -- Pseudo:  ".$donnees['pseudo']." -- Email: ".$donnees['email']." -- Sexe:  ".$donnees['sexe']." -- Est administrateur:  ".$donnees['administrateur']."</option> ");
										}
							print("</select> ");
						print("</div>");	
						
						print("<div class =\"form-group\">");
							 print("<div class=\"col-md-4\">");
								print("<input class=\"btn btn-primary\" type = \"submit\" value = \"Modifier les droits de l'utilisateur\"/>");
							print("</div>");	
						print("</div>");
					print("</form>");
		}
		
	}
		
else
		print("Vous n'avez pas l'autorisation pour accéder à cette page");
				
?>
		 
		 
	<script src="../js/jquery-1.8.3.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>

</html>

