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
	<title>Gestion des catégories</title>
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

	<script src="../js/jquery-1.8.3.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>

</html>