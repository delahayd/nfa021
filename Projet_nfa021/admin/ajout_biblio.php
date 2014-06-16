<?php
 include('../Connections/connexion_bdd_mysqli.php');				//mysqli 
 include('../fonctions.php');								//inclu le fichier fonctions.php à la page	

$lien = mysqli_connect($server, $user, $pass, $bdd);				//variable pour mysql


//on demarre la session
session_start();
?>

<!DOCTYPE html>

<?php// print_r($_SESSION); ?>

<html lang="fr">
<head>
	<title>Gestion des bibliothèques</title>
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
				
		//		<_________________________________________________traitement du formulaire uniquement si page demandé par un administrateur_____________________________________________________>

		if(isset($_SESSION['administrateur']) && ($_SESSION['administrateur'] == 1))		//si administrateur afficher la page
			{	
			
			if(isset($_POST['ajout_bibliotheque']))
				{
				//variables renommées pour simplifier la requête sql
				$nbiblio = $_POST['nom_biblio'];
				$vbiblio = $_POST['version_biblio'];
				$id_admin = $_SESSION['id_utilisateur'];
				
				$sql_ajout_bibliotheque = "INSERT INTO bibliotheque_TPTP
											VALUES('', '$nbiblio', '$vbiblio', '$id_admin')";
				 try {							
					$query_ajout_bibliotheque= mysqli_query($lien, $sql_ajout_bibliotheque);
					print("<font color =\"green\">Bibliothèque ".$nbiblio. $vbiblio." ajoutéé</font>");
							}catch(Exception $e){print("erreur exécution");			//or die(mysql_error());
					}
				}
		 ?>
		 
					<form method="POST" action="ajout_biblio.php">
						<legend>Ajouter une bibliothèque de problèmes</legend>
						<p>
							<label>Nom de la bibliothèque à ajouter</label> : <input type="text" name="nom_biblio" />
							<label>Version</label> : <input type="text" name="version_biblio" />
							<div>
								<input type="submit" name="ajout_bibliotheque" value="Enregistrer la nouvelle bibliothèque" class="btn btn-info">
							</div>
						 </p>
					</form>
					
					
		<?php
		
		 	}
		
else
		print("Vous n'avez pas l'autorisation pour accéder à cette page");
				
?>
		 
		 
	<script src="../js/jquery-1.8.3.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>

</html>