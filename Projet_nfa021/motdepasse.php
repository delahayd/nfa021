<?php
ini_set("display_errors",0);error_reporting(0);
?>


<!DOCTYPE html>
<?php require_once('Connections/bd_nfa021.php');			//mysql?>
<?php include ('Connections/connexion_bdd_mysqli.php');?>

<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>PROJET-NFA021</title>
	<!-- On ouvre la fenêtre à la largeur de l'écran -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Intégration du CSS Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<link href="css/style.css" rel="stylesheet" media="screen"> 
</head>


<body>
	
	<?php include('menu_index.php'); ?>
		  
			  
          <!--_____________________ARTICLE PRESENTATION DU PROJET LIGNE DE "12" DEBUT_____________________-->
            <section class="row" style=text-align:center;>
                
                <div class="col-lg-12">
                
                    <form class="form-horizontal" method="post" action="motdepasse.php" name="valider">
<fieldset>

<legend>Recuperer votre nom d'utilisateur ainsi que votre mot de passe. </legend>

<div class="control-group">
  <label class="control-label" for="textinput">Adresse Mail</label>
  <div class="controls">
    <input id="email" name="email" type="text" placeholder="oupsss@oublie.cnam" class="input-xlarge">
    <p class="help-block">Veuillez entrer votre adresse mail puis valider.</p>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="singlebutton"></label>
  <div class="controls">
    <button id="singlebutton" name="valider" class="btn btn-primary">Valider</button>
  </div>
</div>

</fieldset>
</form>



<?php
      



  if(isset($_POST['valider'])){

    $email = $_POST['email'];
	mysql_select_db($database_bd_nfa021, $bd_nfa021);
    $sql = '   SELECT `password`,`pseudo` FROM `utilisateur` WHERE email="'.$email.'"    ';
    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
    $mdp = mysql_result($req,0,"password");
    $pseudo = mysql_result($req,0,"pseudo");


    if(empty($email) OR empty($pseudo) OR empty($mdp)){

      echo 'Votre email n\'est pas identifié.';
    }

    else{

      

    $headers ='Content-type: text/html; charset="utf-8"'."\r\n"; 
    $headers.='From: "L equipe NFA021"<sav@nfa021.com>'."\r\n"; 
    $headers.='Reply-To: sav@nfa021.com'."\n"; 
    $headers.='Content-Transfer-Encoding: 8bit';                 
    
    
    $message = '<p>Madame,Monsieur,<br><br>Veuillez trouver ci-joint votre Pseudo ainsi que votre mot de passe comme demandé.<br><br>Pseudo= '.$pseudo.'<br>Mot de passe= '.$mdp.'<br><br>
                Si necessaire n\'hesitez pas a nous contacter via notre formulaire de contact.<br><br>L\équipe NFA021. Vous souhaite une bonne continuation.';
    
       
      mail('maryse.chedanne@free.fr','Vous les aviez égarés...',$message,$headers);
	 
      echo '<br>Un email vient de vous être envoyé.';





    }
    


  }

?>


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



<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </body>
</html>   