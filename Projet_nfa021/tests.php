<?php require_once('Connections/bd_nfa021.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_bd_nfa021, $bd_nfa021);
$query_cat_problemes = "SELECT id_categorie_categorie FROM probleme";
$cat_problemes = mysql_query($query_cat_problemes, $bd_nfa021) or die(mysql_error());
$row_cat_problemes = mysql_fetch_assoc($cat_problemes);
$totalRows_cat_problemes = mysql_num_rows($cat_problemes);
?>
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
                      <li class="active"> <a href="tests.php">Tests</a> </li> 
                      <li> <a href="statistiques.php">Statistique</a> </li>
                      <li> <a href="historique.php">Historique</a> </li>
                      <li> <a href="contact.php">Contact</a> </li>
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
            <section class="row">
                
                <div class="col-lg-6">
<form class="form-horizontal">
<fieldset>


<legend>1- Selectionnez les problemes a tester.</legend>


<div class="control-group">
  <label class="control-label" for="selectbasic">Categories</label>
  <div class="controls">
    <select id="selectbasic" name="selectbasic" class="input-xlarge">
      <option>Mathematique</option>
      <option>Geometrie</option>
      <option>Physique</option>
      <option>etc...</option>
    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="selectmultiple">Problemes proposes</label>
  <div class="controls">
    <select id="selectmultiple" name="selectmultiple" class="input-xlarge" multiple="multiple">
      <option>Probleme 1</option>
      <option>Probleme 2</option>
      <option>Probleme 3</option>
      <option>Probleme 4</option>
      <option>Probleme 5</option>
      <option>Probleme 6</option>
      <option>Probleme 7</option>
      <option>Probleme 8</option>
      <option>Probleme 9</option>
    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="singlebutton"></label>
  <div class="controls">
    <button id="singlebutton" name="singlebutton" class="btn btn-info">Valider</button>
  </div>
</div>

</fieldset>
</form> 

                </div>

                <div class="col-lg-6">

<form class="form-horizontal">
<fieldset>


<legend>2- Parametrage et Execution de l'application</legend>


<div class="control-group">
  <label class="control-label" for="selectmultiple">Problemes selectionnes</label>
  <div class="controls">
    <select id="selectmultiple" name="selectmultiple" class="input-xlarge" multiple="multiple">
      <option>Probleme 3</option>
      <option>Probleme 5</option>
      <option>Probleme 7</option>
      <option>Probleme 8</option>
      <option>Probleme 9</option>
    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="Selection des outils">Outils</label>
  <div class="controls">
    <select id="Selection des outils" name="Selection des outils" class="input-xlarge">
      <option>Zenon</option>
      <option>Zenon Modulo</option>
      <option>Zenon et Zenon Modulo</option>
    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="temps">Temps limite</label>
  <div class="controls">
    <input id="temps" name="temps" type="text" placeholder="10s" class="input-xlarge" required>
    <p class="help-block">Temps maximal par probleme en seconde.</p>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="memoire">Memoire limite</label>
  <div class="controls">
    <input id="memoire" name="memoire" type="text" placeholder="1gb" class="input-xlarge">
    <p class="help-block">Memoire limite par probleme en gigabit.</p>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="lancement_execution"></label>
  <div class="controls">
    <button id="lancement_execution" name="lancement_execution" class="btn btn-success">Lancer l'execution</button>
    <button id="lancement_arret" name="lancement_arret" class="btn btn-danger">Arreter l'execution</button>
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
<?php
mysql_free_result($cat_problemes);
?>
