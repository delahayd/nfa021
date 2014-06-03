<?php require_once('Connections/bd_nfa021.php');            //mysql?>
<?php include ('Connections/connexion_bdd_mysqli.php');       //mysqli ?>


<?php
//require_once('Connections/bd_nfa021.php'); 					//mysql
include ('Connections/bd_nfa021.php');				//mysqli 

/*
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

*/

//on demarre la session
session_start();
?>

<!DOCTYPE html>
<?php  //print_r($_SESSION); 					//	a supprimer une fois la page OK?> 


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
		<?php print("<font color =\"green\">". $_SESSION['prenom']."</font><br>"); ?>
		<?php include('menu.php'); ?>
      
          <!--_____________________ARTICLE PRESENTATION DU PROJET LIGNE DE "12" DEBUT_____________________-->
            <section class="row">
                
                <div class="col-lg-6">



<form class="form-horizontal" method="POST" name="test">
<fieldset>


<legend>1- Selectionnez les problemes a tester.</legend>




<div class="control-group">
  <label class="control-label" for="selectbasic">Sous Categories</label>
  <div class="controls">
    <select id="selectbasic" name="selectbasic" class="input-xlarge">

<?php   
    
	  //$sql_verif = 'SELECT nom_sous_categorie,id_sous_categorie FROM sous_categorie';  //requete sql - recupere toutes les sous categories (même les vides')
	  
	  $sql_verif='SELECT DISTINCT nom_sous_categorie,sg.id_sous_categorie
					FROM sous_categorie AS sg, probleme AS p
					WHERE sg.id_sous_categorie = p.id_sous_categorie';					//requete sql - recupere les sous categories NON VIDES uniquement
				
    
      $req = mysql_query($sql_verif) or die('Erreur SQL !<br />'.$sql_verif.'<br />'.mysql_error()); 
    
            while ($data = mysql_fetch_array($req)){ 
             ?><option value="<?php echo $data['id_sous_categorie'];?>"><?php echo $data['nom_sous_categorie'];?></option><?php
    }



    ?>
   



    </select><input type="submit" name="test" value="Chercher">
   
  </div>
</div>



</fieldset>
</form>






<!-------------------------------------------------------------------------------------------------------->

<form class="form-horizontal" method="POST" name="singlebutton">
<div class="control-group">
  <label class="control-label" for="selectmultiple">Problemes proposes</label>
  <div class="controls">


    <select id="selectmultiple" name="selectmultiple[]" class="input-xlarge" multiple="multiple" style=width:100%;height:285px;>
<?php   

if(isset($_POST['test'])) {
      $a = $_POST['selectbasic'];
 



      $sql_verif1 = 'SELECT nom_probleme FROM probleme WHERE id_sous_categorie='.$a.' ';  //requete sql
      $req1 = mysql_query($sql_verif1) or die('Erreur SQL !<br />'.$sql_verif1.'<br />'.mysql_error()); 
    
            while ($data = mysql_fetch_array($req1)){ 
             ?><option value="<?php echo $data['nom_probleme'];?>"><?php echo $data['nom_probleme'];?></option><?php
    }
  }
    ?>


     
    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="singlebutton"></label>
  <div class="controls">
    <button id="singlebutton" name="singlebutton" class="btn btn-info">Ajouter</button>
  </div>
</div>

<?php 
      
      if(isset($_POST['singlebutton'])){ 

        $problemes =$_POST['selectmultiple'];

          $a=count($problemes);
         
         for ($i=0; $i <$a ; $i++) { 
         
          
          $sql='INSERT INTO problemes_choisies VALUES ("",1,"'.$problemes[$i].'",1,NOW(),NOW())';
          mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
 }


}
?>

</fieldset>
</form> 
<!-------------------------------------------------------------------------------------------------------->

                </div>

                <div class="col-lg-6">

<form class="form-horizontal">
<fieldset>


<legend>2- Parametrage et Execution de l'application</legend>


<div class="control-group">
  <label class="control-label" for="selectmultiple">Problemes selectionnes</label>
  <div class="controls">
    <select id="selectmultiple" name="selectmultiple" class="input-xlarge" multiple="multiple">
      <?php 
            //Fonctions

            //Fonctions



     $sql='SELECT probleme FROM problemes_choisies WHERE id_operation="1"';
          $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 
    
  while ($data = mysql_fetch_array($req)){ 
             ?><option selected="selected" value="<?php echo $data['probleme'];?>"> <?php echo $data['probleme'];?></option><?php
    
  }
    ?>

      ?>

    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="Selection des outils">Outils</label>
  <div class="controls">
    <select id="outils" name="outils" class="input-xlarge">
      <option>Zenon</option>
      <option>Zenon Modulo</option>
      <option>Zenon et Zenon Modulo</option>
    </select>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="Nombre de coeurs">Nombre de coeurs</label>
  <div class="controls">
    <select id="nbre_de_coeur" name="nbre_de_coeur" class="input-xlarge">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
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

