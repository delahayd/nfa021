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
		 ?>

		 <?php
				$sql_select_user ="SELECT id_utilisateur, prenom, nom, pseudo, email, sexe, administrateur
									FROM utilisateur";
									
				$query_select_user= mysqli_query($lien, $sql_select_user);
								
				print("<select class=\"form-control\">");
					while($donnees = mysqli_fetch_assoc($query_select_user))	
						print("<option>".$donnees['prenom']." ".$donnees['nom']. " ".$donnees['pseudo']." ".$donnees['email']." ".$donnees['sexe']." ".$donnees['administrateur']."</option> ");
				print("</select> ");
			?>
					
			
				
				
		 
		 
		 
		 
	<script src="../js/jquery-1.8.3.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>

</html>