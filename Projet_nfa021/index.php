<?php require_once('Connections/bd_nfa021.php');						//mysql?>
<?php include ('Connections/connexion_bdd_mysqli.php');				//mysqli ?>

<?php

//print_r($_POST);			//a supprimer quand page OK

// Date
$date = date("Y-m-d");	//date au format PhpMyAdmin


if(isset($_SESSION['pseudo']) AND isset($_SESSION['prenom']))
		print("<font color =\"green\">". $_SESSION['prenom']." </font><br>"); 

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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {

	// enregistre la date dans la table date
	$sql_date = "INSERT INTO date (date_action)
				VALUES ('$date')";
				
			//print($date);   //OK la date est correcte
	//$query_date = mysql_query($bd_nfa021, $sql_date);			//erreur à l'éxécution
				 
				
				
	// récupere la clé primaire de la date dans la table date
	$sql_pk = "SELECT id_date
				WHERE date = $date";
				
	// Inserer ensuite la clé primaire de la date dans la table utilisateur (champ id_date_date)
	
}


//si le formulaire d'enregistrement n'est pas vide
if (!empty ($_POST) && (isset($_POST['nom'])))
	{
	//teste si tous les champs sont remplis
	if(($_POST['nom'] == "") OR ($_POST['prenom'] == "") OR ($_POST['nom_utilisateur'] == "") OR ($_POST['adresse_mail'] == "") OR ($_POST['mot_de_passe'] == "") OR ($_POST['conf_mot_passe'] == ""))
		print("<font color =\"red\">FORMULAIRE INCOMPLET - RECOMMENCEZ</font><br>");					//dans formulaire d'inscription
		
	// il faut avant d'enregistrer dans la BDD que mot de passe et confirmation mot de passe soient égaux	
	elseif ($_POST['conf_mot_passe'] != $_POST['mot_de_passe'])			 
				print("<font color =\"red\">MOT DE PASSE ERRONE - RECOMMENCEZ</font>");
	
	//sinon si tous les champs sont OK on remplit la BDD
	else
			{
				$insertSQL = sprintf("INSERT INTO utilisateur (nom, prenom, pseudo, email, password, sexe ) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nom'], "text"),
                       GetSQLValueString($_POST['prenom'], "text"),
                       GetSQLValueString($_POST['nom_utilisateur'], "text"),
                       GetSQLValueString($_POST['adresse_mail'], "text"),
                       GetSQLValueString($_POST['mot_de_passe'], "text"),
                       GetSQLValueString($_POST['Sexe'], "text"));

				mysql_select_db($database_bd_nfa021, $bd_nfa021);
				$Result1 = mysql_query($insertSQL, $bd_nfa021) or die(mysql_error());
				print("<font color =\"green\">UTILISATEUR ENREGISTRE</font>");
			}
	}

//traitement du formulaire de connexion n'est pas vide
elseif (!empty ($_POST))				//contenu de la fonction test_connexion();
		{
		if(($_POST['pseudo_connexion'] == "") OR ($_POST['password'] == ""))
				print("<font color =\"red\">CONNEXION ECHOUEE - Essayez de nouveau</font><br>");		

			elseif(($_POST['pseudo_connexion'] != "") AND ($_POST['password'] != ""))	
				{
					$pseudo_connexion = $_POST['pseudo_connexion'];		//pour simplifier requete sql
					$password = $_POST['password'] ;					//pour simplifier requete sql
				
			
		// comparaison avec la bdd pour pouvoir établir la session	
		$lien = mysqli_connect($server, $user, $pass, $bdd);					//connexion à la base de données - utilise mysqli
		mysqli_query($lien, "SET NAMES UTF8");
		
		//verifier existence des identifiants - mysqli
		$sql_verif = "select prenom, pseudo, password from utilisateur where pseudo = '$pseudo_connexion' and password = '$password'";	//requete sql
		$query_verif = mysqli_query($lien, $sql_verif);								//execution de la requete
		
		$resultat = mysqli_fetch_assoc($query_verif);			//stocke le résultat de la requete dans un tableau associatif $resultat
		
			if(($resultat["pseudo"] == $pseudo_connexion) AND ($resultat["password"] == $password))
					{
					//print("<font color =\"green\">Bonjour ". $resultat['prenom']."</font><br>");
					//$succes = 1;
					session_start();
					$_SESSION["pseudo"]=$resultat["pseudo"];
					$_SESSION["prenom"]=$resultat["prenom"];
			
					//redirige utilisateur vers une page de la section membre
					header('location: tests.php');
					}
						else
							{
							//utilisateur non reconnu
							print("<body onLoad=\"alert\"('Utilisateur non reconnu')\">");
							print("<font color =\"red\">ACCES REFUSE</font><br>");
			
							}	
					}
	
	
	////if(isset($succes))
	//{
	//ouverture de session
	//session_start();
	//$_SESSION["pseudo"]=$resultat["pseudo"];
	//$_SESSION["prenom"]=$resultat["prenom"];
	//$pseudo=$_SESSION["pseudo"];
	//print("<span class=\"pseudo\">Bonjour</span>");
			
	//affichage du menu
	//include "menu.php";

	}	
		
	
//mysql_select_db($database_bd_nfa021, $bd_nfa021);
//$query_cnxuser = "SELECT pseudo, password FROM utilisateur";
//$cnxuser = mysql_query($query_cnxuser, $bd_nfa021) or die(mysql_error());
//$row_cnxuser = mysql_fetch_assoc($cnxuser);
//$totalRows_cnxuser = mysql_num_rows($cnxuser);

	
?>
<!DOCTYPE html>

<?php// print_r($_session); ?>
<html lang="fr">
<head>
<title>PROJET-NFA021</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
<link href="css/style.css" rel="stylesheet" media="screen"> 
</head>


 <body>
	<?php include('menu_index.php'); ?>
	


          <!--_____________________ARTICLE PRESENTATION DU PROJET LIGNE DE "12" DEBUT_____________________-->
            <article class="row">
                
                <div class="col-lg-12">
                    <div class="thumbnail" style=float:left;>
                        <img src="img/calcules.jpg" width="230px;" alt="" style=float:left;>
                          <h3>&nbsp Zenon...  ou bien... Zenon Modulo  ?</h3>
                          <p>Bienvenue sur cette petite application qui vous permettra notament de comparer et de determiner lequel de ces deux outils est le plus efficace, pour ce faire nous vous invitons des a present a vous inscrire ci-dessous afin d'effectuer tres simplement vos tests. </br>
                          </br>L'equipe NFA21</p>
                    </div>
                </div>
            </article>
          <!--_____________________ARTICLE PRESENTATION DU PROJET LIGNE DE "12" FIN _____________________-->


          <!--_____________________SECTION FORMULAIRE D'INSCRIPTION LIGNE DE "12" DEBUT____________________ -->
          <section class="row">
              <div class="col-lg-12">
          
                  <form action="<?php echo $editFormAction; ?>" method="POST" name="form" class="form-horizontal">
                       <fieldset>
                            <legend style=text-align:center;>Inscription</legend>
                            <!--_________________________________________________-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="Sexe">Sexe</label>
                                   <div class="col-md-4"> 
                                        <label class="radio-inline" for="Sexe-0">
                                           <input type="radio" name="Sexe" id="Sexe-0" value="homme" checked="checked">
                                            Homme
                                        </label> 
                                        <label class="radio-inline" for="Sexe-1">
                                           <input type="radio" name="Sexe" id="Sexe-1" value="femme">
                                            Femme
                                        </label>
                                  </div>
                            </div>
                            <!--_________________________________________________-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nom">Nom</label>  
                                    <div class="col-md-4">
                                         <input id="nom" name="nom" type="text" placeholder="Delahaye" class="form-control input-md">
                                   </div>
                           </div>
                            <!--_________________________________________________-->
                           <div class="form-group">
                               <label class="col-md-4 control-label" for="prenom">Prenom</label>  
                                    <div class="col-md-4">
                                         <input id="prenom" name="prenom" type="text" placeholder="David" class="form-control input-md">
                                    </div>
                          </div>
                            <!--_________________________________________________-->
                          <div class="form-group">
                                <label class="col-md-4 control-label" for="nom_utilisateur">Nom d'utilisateur</label>  
                                    <div class="col-md-4">
                                         <input id="nom_utilisateur" name="nom_utilisateur" type="text" placeholder="Delahaye" class="form-control input-md">
                                    </div>
                          </div>
                            <!--_________________________________________________-->
                          <div class="form-group">
                               <label class="col-md-4 control-label" for="adresse_mail">Adresse mail</label>  
                                    <div class="col-md-4">
                                         <input id="adresse_mail" name="adresse_mail" type="email" placeholder="d.delahaye@idf.pleiad.net" class="form-control input-md">
                                    </div>
                          </div>
                            <!--_________________________________________________-->
                          <div class="form-group">
                               <label class="col-md-4 control-label" for="mot_de_passe">Mot de passe</label>
                                    <div class="col-md-4">
                                         <input id="mot_de_passe" name="mot_de_passe" type="password" placeholder="**********" class="form-control input-md">                  
                                   </div>
                           </div>
                            <!--_________________________________________________-->
                          <div class="form-group">
                               <label class="col-md-4 control-label" for="conf_mot_passe">Confirmation du mot de passe</label>
                                     <div class="col-md-4">
                                          <input id="conf_mot_passe" name="conf_mot_passe" type="password" placeholder="**********" class="form-control input-md">                   
                                     </div>
                          </div>
                            <!--_________________________________________________-->
                          <div class="form-group">
                               <label class="col-md-4 control-label" for="inscription"></label>
                                     <div class="col-md-4">
                                           <button id="inscription" name="inscription" class="btn btn-primary">Inscription</button>
                                     </div>
                          </div>

                     </fieldset>
                       <input type="hidden" name="MM_insert" value="form">
                  </form>
        </div>
      </section>
                <!--_____________________SECTION FORMULAIRE D'INSCRIPTION LIGNE DE "12" DEBUT____________________ -->


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

<?php //mysql_free_result($cnxuser); ?>
