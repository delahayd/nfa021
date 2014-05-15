<!DOCTYPE html>
<html lang="fr">
<head>
<title>PROJET-NFA021</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" media="screen"> 
</head>


    <body>
        <div class="container">

        <!--_________________________________________HEADER NAVIGATION DEBUT_________________________________________-->
            <nav class="navbar navbar-inverse navbar-static-top">
               <div class="navbar-header" style=height:110px>   
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                    </button>

               <a class="navbar-brand" href="index.php"><img src="img/cnam.png" height="70%">&nbsp &nbsp &nbspPROJET NFA021</a>
              </div>
              <div class="collapse navbar-collapse">
                 <ul class="nav navbar-nav">
                      <li> <a href="index.php">Accueil</a> </li> 
                      <li> <a href="tests.php">Tests</a> </li> 
                      <li> <a href="statistiques.php">Statistique</a> </li>
                      <li> <a href="historique.php">Historique</a> </li>
                      <li  class="active"> <a href="contact.php">Contact</a> </li>
                 </ul>

                 <form class="navbar-form pull-right">
                     <span style=color:#999;>Se connecter</span>
                         <input type="text" style="width:130px" class="input-small" placeholder="Nom d'utilisateur">
                         <input type="text" style="width:130px" class="input-small" placeholder="Mot de Passe">
                         <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-eye-open"></span> Connexion</button><br>

                          <!-- Lien Mot de passe oublié -->
                          <div style=text-align:right;color:#999; ><a href="mdp_oublie.php" style=text-decoration:none;> Nom utilisateur ou mot de passe oublie ?</a></div>
                          <!-- _________________________-->
                   </form>
              </div>
            </nav>
          <!--_________________________________________HEADER NAVIGATION FIN_________________________________________-->

          <!----------------------------------------------------------------------------------------------------------------------->



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



<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </body>
</html>   