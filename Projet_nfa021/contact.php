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

 <body>
 <?php
if(isset($_SESSION['pseudo']) AND isset($_SESSION['prenom']))
	{
?>
			<?php print("<font color =\"green\">". $_SESSION['prenom']."</font><br>"); ?>
			<?php include('menu.php'); ?>
					
            <!--_____________________ARTICLE PRESENTATION DU PROJET LIGNE DE "12" DEBUT_____________________-->
            <section class="row" style=text-align:center;>
                
                <div class="col-lg-12">
                <form class="form-horizontal" name="valider" method="post" action="contact.php">
	
	
<fieldset>

<legend>Formulaire de remarques</legend>

<div class="control-group">
  <label class="control-label" for="textinput">Nom</label>
  <div class="controls">
    <input id="textinput" name="NOM" type="text" placeholder="Delahaye" class="input-xlarge" required="">
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="textinput">Email</label>
  <div class="controls">
    <input id="textinput" name="EMAIL" type="text" placeholder="d.delahaye@idf.pleiad.net" class="input-xlarge" required="">
   </div>
</div>


<div class="control-group">
  <label class="control-label" for="sujet">Sujet</label>
  <div class="controls">
    <select id="sujet" name="SUJET" class="input-xlarge">
      <option>Remarque Generale</option>
      <option>Question sur notre Application</option>
      <option>Probleme Technique</option>
      <option>Suggestion d'Amelioration</option>
    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="textarea">Veuillez entrez votre message ici</label>
  <div class="controls">                     
    <textarea id="textarea" name="MESSAGE"></textarea>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="send"></label>
  <div class="controls">
    <button id="valider" name="valider" class="btn btn-success">Envoyer</button>
    <button id="delete" name="delete" class="btn btn-danger">Effacer</button>
  </div>
</div>

</fieldset>
</form>

                </div>
            </section>
         















      <?php   


      if (isset ($_POST['valider'])){
    
                    
                      $nom = $_POST['NOM'];
                      $email = $_POST['EMAIL'];
                      $objets = $_POST['SUJET'];
                      $message = $_POST['MESSAGE'];
    
    
    if(empty($nom)  OR empty($email) OR empty($objets) OR empty($message))     {

    echo '<p style=text-align:center;>Vous n avez pas remplie tous les champs.</p>'; 
      }
      
      else {
                      
    
    $headers ='Content-type: text/html; charset="iso-8859-1"'."\r\n"; 
    $headers.='From: "L equipe NFA021"<sav@nfa021.com>'."\r\n"; 
    $headers.='Reply-To: sav@nfa021.com'."\n"; 
    $headers.='Content-Transfer-Encoding: 8bit';                 
    
    
    $message = '<p>Madame,Monsieur, '.$nom.',<br><br>Nous contacte au sujet de: '.$objets.'<br><br>Son message est le suivant: <br>'.$message.'<br><br>Adresse mail: '.$email.'</p>';
    
       
       mail('maryse.chedanne@gmail.com','Demande d informations',$message,$headers);
       mail ($email,'Demande Recu', 'Nous vous informons que nous avons bien recu vos remarques.<br><br>L equipe technique NFA021 vous fera un retour au plus vite.<br> Merci et a Bientot ^_^',$headers);
     

             echo '<p style=text-align:center;>Votre message a bien été envoyer.</p>';

    } 

  
  }
    
    ?>
















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