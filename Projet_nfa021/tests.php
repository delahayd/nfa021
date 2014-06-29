<?php require_once('Connections/bd_nfa021.php');            //mysql?>
<?php include ('Connections/connexion_bdd_mysqli.php');       //mysqli ?>

<?php
ini_set("display_errors",0);error_reporting(0);
?>



<?php
//require_once('Connections/bd_nfa021.php'); 					//mysql
include ('Connections/bd_nfa021.php');				//mysqli 

$date = date("Y-m-d");	//date au format PhpMyAdmin

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
			// si utilisateur est administrateur afficher menu latéral gauche avec options supplémentaires
			if(isset ($_SESSION['administrateur']) AND ($_SESSION['administrateur'] == 1))		
				include('aside.php'); 
?>
			
			
<body>
		<?php print("<font color =\"green\">". $_SESSION['prenom']."</font><br>"); 
			 include('menu.php'); ?>
	


      <?php 
        // Fonction resultat qui retourne le dernier id_operation dans une variable SESSION
        $sql='SELECT id_operation FROM problemes_choisies  WHERE id_utilisateur='.$_SESSION['id_utilisateur'].' ORDER BY id DESC LIMIT 0,1';
        $req=mysql_query ($sql);
        $_SESSION['id_last_op']=mysql_result($req,0,'id_operation');
        //--------------------------------------------------------

        // Fonction resultat qui retourne un BOOLEAN dans une variable SESSION
        $sql1='SELECT resultat FROM problemes_choisies  WHERE id_utilisateur='.$_SESSION['id_utilisateur'].' ORDER BY id DESC LIMIT 0,1';
        $req1=mysql_query ($sql1) or die ('Erreur SQL !'.$sql1.'<br />'.mysql_error());
        $_SESSION['boolean_resul']=mysql_result($req1,0,'resultat');
        //------------------------------------------


        //Permet d'inserer une requete des le debut de l'ouverture de la page si la variable id_operatition est vide(Permet ainsi un affichage plus clair sans erreurs.)
           if($_SESSION['id_last_op']==NULL){
                $sql='INSERT INTO problemes_choisies VALUES ("",1,0,"","'.$_SESSION['id_utilisateur'].'",NOW(),NOW())';
                mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                                             }
      ?>


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

    </select><input type="submit" name="chercher" value="Chercher">
 
  </div>
</div>
</fieldset>
</form>
<?php








?>





<!-------------------------------------------------------------------------------------------------------->

<form class="form-horizontal" method="POST" name="ajouter">
<div class="control-group">
  <label class="control-label" for="selectmultiple">Problemes proposes</label>
  <div class="controls">


    <select id="selectmultiple" name="selectmultiple[]" class="input-xlarge" multiple="multiple" style=width:100%;height:285px;>


<?php   
//Partie GAUCHE: PERMET L'AFFICHAGE DES PROBLEMES PAR RAPPORT A LA CATEGORIE SELECTIONNE AVEC LE BUTON RECHERCHER
if(isset($_POST['chercher'])) {
      $resultat_des_problemes = $_POST['selectbasic'];
 
      $sql = 'SELECT nom_probleme FROM probleme WHERE id_sous_categorie='.$resultat_des_problemes.' ';  //requete sql
      $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 
    
            while ($data = mysql_fetch_array($req)){ 
             ?><option value="<?php echo $data['nom_probleme'];?>"><?php echo $data['nom_probleme'];?></option><?php
                                                    }
                         }

//----------------------------------------------------------------------------------------------------------------
?>


     
    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="ajouter"></label>
  <div class="controls">
    <button id="ajouter" name="ajouter" class="btn btn-info">Ajouter</button>
  </div>
</div>

<?php 
       // PARTIE QUI PERMET L'ENREGISTREMENT DE PLUSIEURS PROBLEMES SELECTIONNES EN MEME TEMPS SUR LA BASE DE DONNEES.
        if(isset($_POST['ajouter'])){    

        $problemes =$_POST['selectmultiple'];

        if (isset($problemes)) {
         
              $a=count($problemes);
              $resultat=TRUE;
         
         for ($i=0; $i <$a ; $i++) { 
         
          
          $sql='INSERT INTO problemes_choisies VALUES ("","'.$_SESSION['id_last_op'].'","'.$resultat.'","'.$problemes[$i].'","'.$_SESSION['id_utilisateur'].'",NOW(),NOW())';
          mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
          header('Location:tests.php');
                                  }
                                }
          else { ?> <br><div class="alert alert-danger alert-dismissable" contenteditable="true">
      Vous n avez pas selectionne de problemes...
    </div> <?php }
                                  }
      //----------------------------------------------------------------------------------------------------------------
?>

</fieldset>
</form> 
  <br>
  <div class="alert alert-success alert-dismissable" contenteditable="true">
      Pour entrer plusieur problemes d'une meme catagorie, il vous suffit de maintenir la touche  <strong>CTRL</strong> de votre clavier et selectionné les problemes en question puis bouton <strong>AJOUTER</strong> .
    </div>
<!-------------------------------------------------------------------------------------------------------->

                </div>

                <div class="col-lg-6">

<form class="form-horizontal" name="valider" method="post">
<fieldset>


<legend>2- Parametrage et Execution de l'application</legend>


<div class="control-group">
  <label class="control-label" for="selectmultiple">Problemes selectionnes</label>
  <div class="controls">
    <select id="selectmultiple" name="problemes_selec[]" class="input-xlarge" multiple="multiple">
         <?php 
              //PARTIE AFFICHAGE DES PROBLEMES QUE L'UTILISATEUR SOUHAITE TESTEES.
               if($_SESSION['boolean_resul']==1) {

                    $sql='SELECT probleme FROM problemes_choisies WHERE id_operation='.$_SESSION['id_last_op'].' AND resultat="1" AND id_utilisateur='.$_SESSION['id_utilisateur'].'';
                    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 
    
                        while ($data = mysql_fetch_array($req)){ 
                           ?><option selected="selected" value="<?php echo $data['probleme'];?>"> <?php echo $data['probleme'];?></option><?php
                                                                }
                                                 }
                //------------------------------------------------------------------
           ?>
    </select>
      <input type="submit" name="vider" value="Vider"><br>
          <?php     
          //FONCTION PERMETTANT DE SUPPRIMER L'ENSEMBLE DES PROBLEMES SELECTIONNES
                   
                   if(isset($_POST['vider'])){ 
                          if ($_SESSION['boolean_resul']==1) {
                           
                          
                 $sql='DELETE FROM problemes_choisies WHERE id_utilisateur='.$_SESSION['id_utilisateur'].' AND id_operation='.$_SESSION['id_last_op'].' AND resultat=1';
                 mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
                 header('Location:tests.php');
                                    }

                          else{ echo '<div class="alert alert-danger alert-dismissable" contenteditable="true">
      Vous n avez selectionner aucun problemes a teste...
    </div>'; }
                                    }
          //----------------------------------------------------------------------
        ?>
      </div>
</div>


<div class="control-group">
  <label class="control-label" for="Selection des outils">Outils</label>
  <div class="controls">
    <select id="outils" name="outils" class="input-xlarge">
      <option value="Zenon">Zenon</option>
      <option value="Zenon Modulo">Zenon Modulo</option>
      <option value="Zenon et Zenon Modulo">Zenon et Zenon Modulo</option>
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
      <option>7</option>
    </select>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="temps">Temps limite</label>
  <div class="controls">
    <input id="temps" name="temps" type="number" placeholder="10s" class="input-xlarge" value="6">
    <p class="help-block">Temps maximal par probleme en seconde.</p>
  </div>
</div>


<div class="control-group">
  <label class="control-label" for="memoire">Memoire limite</label>
  <div class="controls">
    <input id="memoire" name="memoire" type="number" placeholder="1gb" class="input-xlarge" value="3">
    <p class="help-block">Memoire limite par probleme en gigabit.</p>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="textarea">Text Area</label>
  <div class="controls">                     
    <textarea id="textarea" name="textarea"></textarea>
  </div>
</div>

<div class="control-group">
  <label class="control-label" for="lancement_execution"></label>
  <div class="controls">
    <button id="valider" name="valider" class="btn btn-success">Lancer l'execution</button>
    <button id="lancement_arret" name="lancement_arret" class="btn btn-danger">Arreter l'execution</button>
  </div>
</div>



</fieldset>
</form>



<?php 
        //FONCTION PERMETTANT DE STOCKER L'ENSEMBLE DES PROBLEMES DANS LA VARIABLE  problem_selec[]
        $sql_main='SELECT probleme FROM problemes_choisies WHERE id_operation='.$_SESSION['id_last_op'].' ';
        $req_main=mysql_query ($sql_main);
        while ($data=mysql_fetch_array($req_main)) {
              $problem_selec[]=$data['probleme'];     
                                                    }
        //----------------------------------------------------------------------------



          
          if(isset($_POST['valider'])){ 
            if ($_SESSION['boolean_resul']==TRUE) {
            
            
            // VARIABLE DONT VOUS AVEZ BESOIN POUR LE LANCEMENT LINUX, AU TOTAL IL Y A 6 VARIABLES.
            $outils=$_POST['outils'];
            $nbre_coeurs=$_POST['nbre_de_coeur'];
            $tps_limite=$_POST['temps'];
            $memoire=$_POST['memoire'];
            $commentaire=$_POST['textarea'];
            

            //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!






                            // VOTRE CONTENU SERA ICI
                              //PS: POur voir afficher les erreurs de la page en PHP ou SQL pour votre developpement desactivé avec // le code    ini_set("display_errors",0);error_reporting(0); (Il est tout en haut de cette page.)










             //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

         
          $sql2='INSERT INTO benchmark VALUES ("","'.$outils.'","'.$tps_limite.'","'.$memoire.'","'.$commentaire.'",NOW(),"'.$_SESSION['id_utilisateur'].'")';
          mysql_query ($sql2) or die ('Erreur SQL !'.$sql2.'<br />'.mysql_error());


          
          $resultat=FALSE;
          $dernier_op=$_SESSION['id_last_op']+1;
          $sql='INSERT INTO problemes_choisies VALUES ("","'.$dernier_op.'","'.$resultat.'","","'.$_SESSION['id_utilisateur'].'",NOW(),NOW())';
          mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
          header('Location:tests.php');
    }

    else{
           
      echo '<div class="alert alert-danger alert-dismissable" contenteditable="true">Les champs ne sont pas remplies correctement. Veuillez proceder a une verification </div>';
    

    }    
 }

?>





                </div>
            </section>
         




















            

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

