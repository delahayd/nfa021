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
				
	//		<_________________________________________________traitement du formulaire_____________________________________________________>

		if(isset($_SESSION['administrateur']) && ($_SESSION['administrateur'] == 1))		//si administrateur afficher la page
			{		
			
			
				if(isset($_POST['ajout_categorie']))
				{
				//variables renommées pour simplifier la requête sql
				$nom_categorie = $_POST['nom_categorie'];
				$id_biblio=$_POST['id_biblio'];
				$id_admin = $_SESSION['id_utilisateur'];
				
				$sql_ajout_categorie = "INSERT INTO categorie
										VALUES('', '$nom_categorie', '$id_biblio', '$id_admin')";
				 try {							
					$query_ajout_categorie= mysqli_query($lien, $sql_ajout_categorie);
					print("<font color =\"green\">Catégorie ".$nom_categorie." ajoutéé</font>");
							}catch(Exception $e){print("erreur exécution");			//or die(mysql_error());
					}
				}
			
					
			
			// requete pour recupérer nom et version des bibliothèques existantes - OK
				$sql_biblio = "SELECT id_biblio, nom_biblio, version
								FROM bibliotheque_tptp
								ORDER BY nom_biblio, version";
								
				$query_biblio = mysqli_query($lien, $sql_biblio);			//execution de la requête
							
		  ?>
		 
					<form method="POST" action="ajout_categorie.php">
						<legend>Ajouter une catégorie de problèmes</legend>
						<p>
							<label>Nom de la catégorie à ajouter :</label>  
								<input type="text" name="nom_categorie" />
								
							<label>Dans quelle bibliothèque? </label> 
								<?php
									print("<select  name=\"id_biblio\" class=\"input-xlarge\">");
										while($biblio = mysqli_fetch_assoc($query_biblio))		//tableau associatif OK
											{
												$id_biblio = $biblio['id_biblio'];
												if(empty ($biblio['version']))	 print("<option value=\"".$id_biblio."\">".$biblio['nom_biblio']."</option>");
													else 						 print("<option value=\"".$id_biblio."\">".$biblio['nom_biblio']." version ".$biblio['version']."</option>");
											}
									print("</select>");
								?>	
								<div>Si vous ne trouvez pas la bibliothèque voulue, c'est <a href="ajout_biblio.php">ici</a></div>
							<div>
								<input type="submit" name="ajout_categorie" value="Enregistrer la catégorie" class="btn btn-info">
								
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