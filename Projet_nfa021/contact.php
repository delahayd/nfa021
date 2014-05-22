<?php 
//on demarre la session
include ('Connections/connexion_bdd_mysqli.php');				//mysqli
session_start();
 ?>

<!DOCTYPE html>

<?php print_r($_SESSION); 					//	a supprimer une fois la page OK ?>

<?php
if(isset($_SESSION['pseudo']) AND isset($_SESSION['prenom']))
	{
?>

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
	
			<?php include('menu.php'); ?>
					
            <!--_____________________ARTICLE PRESENTATION DU PROJET LIGNE DE "12" DEBUT_____________________-->
            <section class="row" style=text-align:center;>
                
                <div class="col-lg-12">
                <form class="form-horizontal">
	
	
<fieldset>

<legend>Formulaire de remarques</legend>

<div class="control-group">
  <label class="control-label" for="textinput">Nom</label>
  <div class="controls">
    <input id="textinput" name="textinput" type="text" placeholder="Delahaye" class="input-xlarge" required="">
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="textinput">Email</label>
  <div class="controls">
    <input id="textinput" name="textinput" type="text" placeholder="d.delahaye@idf.pleiad.net" class="input-xlarge" required="">
   </div>
</div>


<div class="control-group">
  <label class="control-label" for="sujet">Sujet</label>
  <div class="controls">
    <select id="sujet" name="sujet" class="input-xlarge">
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
    <textarea id="textarea" name="textarea"></textarea>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="send"></label>
  <div class="controls">
    <button id="send" name="send" class="btn btn-success">Envoyer</button>
    <button id="delete" name="delete" class="btn btn-danger">Effacer</button>
  </div>
</div>

</fieldset>
</form>

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
	else print("SESSION NON DEMARREE");
	include('menu_index.php'); 
?>

	<script src="js/jquery-1.8.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
 </body>
 
</html>