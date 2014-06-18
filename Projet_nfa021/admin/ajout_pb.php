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
	<title>Gestion des problèmes</title>
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
			
			
				if(isset($_POST['ajout_probleme']))
				{
				//variables renommées pour simplifier la requête sql
				$nom_pb = $_POST['nom_probleme'];
				$id_souscategorie=$_POST['id_souscategorie'];
				$id_admin = $_SESSION['id_utilisateur'];
				
				$sql_ajout_pb = "INSERT INTO probleme
								VALUES('', '$nom_pb', '$id_souscategorie', '$id_admin')";
				 try {							
					$query_ajout_pb= mysqli_query($lien, $sql_ajout_pb);
					print("<font color =\"green\">Problème ".$nom_pb." ajouté</font>");
							}catch(Exception $e){print("erreur exécution");			//or die(mysql_error());
					}
				}
				
			
			// requete pour recupérer nom et version des bibliothèques existantes - OK
				$sql_souscategorie = "SELECT id_sous_categorie, nom_sous_categorie
									FROM sous_categorie
									ORDER BY nom_sous_categorie";
								
				$query_souscategorie = mysqli_query($lien, $sql_souscategorie);			//execution de la requête
							
		  ?>
		 
					<form method="POST" action="ajout_pb.php">
						<legend>Ajouter un problème</legend>
						<p>
							<label>Nom du problème à ajouter :</label>  
								<input type="text" name="nom_probleme" />
								
							<label>Dans quelle sous-catégorie? </label> 
								<?php
									print("<select  name=\"id_souscategorie\" class=\"input-xlarge\">");
										while($souscategorie = mysqli_fetch_assoc($query_souscategorie))		//tableau associatif OK
											{
												$id_souscategorie = $souscategorie['id_sous_categorie'];
												 print("<option value=\"".$id_souscategorie."\">".$souscategorie['nom_sous_categorie']."</option>");
											}
									print("</select>");
								?>	
								<div>Si vous ne trouvez pas la sous-catégorie voulue, c'est <a href="ajout_souscategorie.php">ici</a></div>
							<div>
								<input type="submit" name="ajout_probleme" value="Enregistrer le problème" class="btn btn-info">
								
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