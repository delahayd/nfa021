<?php 
//on demarre la session
include ('Connections/connexion_bdd_mysqli.php');				//mysqli
session_start();
 ?>

<!DOCTYPE html>

<?php //print_r($_SESSION); 					//	a supprimer une fois la page OK ?>


<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>PROJET-NFA021</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<link href="css/style.css" rel="stylesheet" media="screen"> 
</head>

<?php
if(isset($_SESSION['pseudo']) AND isset($_SESSION['prenom']))
	{
?>

    <body>
	
		<?php include('menu.php'); ?>
		
     
          <!--_____________________ARTICLE PRESENTATION DU PROJET LIGNE DE "12" DEBUT_____________________-->
            <section class="row" style=text-align:center;>
                
                <div class="col-lg-12">
					

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