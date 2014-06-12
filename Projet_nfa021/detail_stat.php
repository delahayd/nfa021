<?php 
//on demarre la session
include ('Connections/connexion_bdd_mysqli.php');				//mysqli
session_start();
 ?>

<!DOCTYPE html>

<?php //print_r($_SESSION); 	//	a supprimer une fois la page OK ?>



<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>PROJET-NFA021</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<link href="css/style.css" rel="stylesheet" media="screen"> 
	<link href="statistiques/style.css" rel="stylesheet" media="screen">
</head>

<?php
if(isset($_SESSION['pseudo']) AND isset($_SESSION['prenom']))
	{
?>

    <body>
		<?php print("<font color =\"green\">". $_SESSION['prenom']."</font><br>"); ?>
		<?php include('menu.php'); ?>
		
		
		
		<?php
		include('Connections/pdo.php');
				
		?>
      
          <!--_____________________ARTICLE PRESENTATION DU PROJET LIGNE DE "12" DEBUT_____________________-->
            <section class="row" style=text-align:center;>
                
                <div class="col-lg-12">
                
                <div class="res">
                <h1 class="titre-res">Statistiques du problème <?php echo (isset($_GET['nom'])?rawurldecode($_GET['nom']):'');  ?></h1>
                <?php
				$id_probleme = isset($_GET['prob'])  ? $_GET['prob'] :  '';
				
				
				//Nombre de fois testés
				$sql_nombre_de_fois ="select  count(*)  as nombre_test from test where id_probleme= " . $id_probleme  ;

				//Nombre de fois trouvé par zenon
				$sql_trouv_zenon ="select  count(*)  from test where preuve_trouvee=1 and id_outil=1  and  id_probleme= " . $id_probleme  ;

				//Nombre de fois trouvé par zenon modulo
				$sql_trouv_zenon_modulo ="select  count(*)  from test where preuve_trouvee=1 and id_outil=2  and  id_probleme= " . $id_probleme ;

				//Nombre de fois trouvé par zenon et non par zenon modulo
				$sql_nombre_zenon_pas_modulo =
				"select  count(*) as nb from test where preuve_trouvee=1 and id_outil=1 and  id_probleme= " . $id_probleme  .   
				" union all select  count(*) as nb  from test where preuve_trouvee=0 and id_outil=2  and  id_probleme= " . $id_probleme;

				//Nombre de fois trouvé par zenon modulo et non parzenon  
				$sql_nombre_modulo_pas_zenon=
				"select  count(*)  from test where preuve_trouvee=1 and id_outil=2 and  id_probleme= " . $id_probleme  .   
				" union select  count(*)  from test where preuve_trouvee=0 and id_outil=1  and  id_probleme= " . $id_probleme;
				
				
				
				//Affichage nombre de fois testé 
				
				$response =  $bdd->query($sql_nombre_de_fois);
				$donnees=$response->fetch(); 
				echo "Nombre fois testé :" . $donnees[0]. "<br/>";;
				
				
				//Affichage nombre de preuve trouvées par zenon
				$response =  $bdd->query($sql_trouv_zenon );
				$donnees=$response->fetch();
				echo "Nombre de preuves trouvées par zenon:" . $donnees[0] . "<br/>";;

				
				//Affichage nombre de preuve trouvées par zenon modulo
				$response =  $bdd->query($sql_trouv_zenon_modulo );
				$donnees=$response->fetch();
				echo "Nombre de preuves trouvées par zenon modulo:" . $donnees[0]. "<br/>";;
				
				
				
				//Affichage Nombre de fois trouvé par zenon et non par zenon modulo
				$response =  $bdd->query($sql_nombre_zenon_pas_modulo);
				$donnees=$response->fetchAll();
				echo "Nombre de preuves trouvées zenon ". $donnees[0][0] ." et nombre de preuves non trouvées par zenon modulo" . $donnees[1][0]. "<br/>";
				
				
					//Nombre de fois trouvé par zenon modulo et non parzenon
				$response =  $bdd->query($sql_nombre_modulo_pas_zenon);
				$donnees=$response->fetchAll();
				echo "Nombre de preuves trouvées  par zenon modulo ". $donnees[0][0] ." et nombre de preuves non trouvées par zenon" . $donnees[1][0]. "<br/>";
				
				
				
                ?>
                
                </div>

                </div>
            </section>
         


            <!------------------------------------------------------------------------------------------------------------------------>

<!--_____________________FOOTER SIMPLE LIGNE DE "12" DEBUT____________________ -->
      <footer class="row">
           <div class="col-md-12" style=text-align:center;>
               <div class="navbar navbar-inverse navbar-fixed-bottom" style=height:10px;>   
              
               </div>
           </div>
      </footer>
<!--_____________________FOOTER SIMPLE LIGNE DE "12" FIN____________________ -->


        </div>


<?php
	}
	else 
	{
		print("<font color =\"red\">SESSION NON DEMARREE</font>");
		include('menu_index.php'); 
	} 
?>

	<script src="js/jquery-1.8.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
 </body>
 
</html>


