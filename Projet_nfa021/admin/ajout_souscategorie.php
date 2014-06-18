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
	<title>Gestion des sous-catégories</title>
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
			
			
				if(isset($_POST['ajout_souscategorie']))
				{
				//variables renommées pour simplifier la requête sql
				$nom_souscategorie = $_POST['nom_souscategorie'];
				$id_categorie=$_POST['id_categorie'];
				$id_admin = $_SESSION['id_utilisateur'];
				
				$sql_ajout_souscategorie = "INSERT INTO sous_categorie
										VALUES('', '$nom_souscategorie', '$id_categorie', '$id_admin')";
				 try {							
					$query_ajout_souscategorie= mysqli_query($lien, $sql_ajout_souscategorie);
					print("<font color =\"green\">Catégorie ".$nom_souscategorie." ajoutéé</font>");
							}catch(Exception $e){print("erreur exécution");			//or die(mysql_error());
					}
				}
				
			
			// requete pour recupérer nom et version des bibliothèques existantes - OK
				$sql_categorie = "SELECT id_categorie, nom_categorie
								FROM categorie
								ORDER BY nom_categorie";
								
				$query_categorie = mysqli_query($lien, $sql_categorie);			//execution de la requête
							
		  ?>
		 
					<form method="POST" action="ajout_souscategorie.php">
						<legend>Ajouter une sous-catégorie de problèmes</legend>
						<p>
							<label>Nom de la sous-catégorie à ajouter :</label>  
								<input type="text" name="nom_souscategorie" />
								
							<label>Dans quelle catégorie? </label> 
								<?php
									print("<select  name=\"id_categorie\" class=\"input-xlarge\">");
										while($categorie = mysqli_fetch_assoc($query_categorie))		//tableau associatif OK
											{
												$id_categorie = $categorie['id_categorie'];
												 print("<option value=\"".$id_categorie."\">".$categorie['nom_categorie']."</option>");
											}
									print("</select>");
								?>	
								<div>Si vous ne trouvez pas la catégorie voulue, c'est <a href="ajout_categorie.php">ici</a></div>
							<div>
								<input type="submit" name="ajout_souscategorie" value="Enregistrer la sous-catégorie" class="btn btn-info">
								
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