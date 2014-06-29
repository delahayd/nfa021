<?php require_once('Connections/bd_nfa021.php');            //mysql?>
<?php include ('Connections/connexion_bdd_mysqli.php');       //mysqli ?>


<?php
//require_once('Connections/bd_nfa021.php'); 					//mysql
include ('Connections/bd_nfa021.php');				//mysqli 

$date = date("Y-m-d");	//date au format PhpMyAdmin

// On lance la commande (avec le shell script launch.sh)
// Pour l'appeler, on fournit (au script) :
// - le nom du problème (prob.p ici)
// - le temps maximum (30s ici)
// - la mémoire maximum (1G ici)
echo 'Launching Zenon:<br>';
$command='launch.sh prob.p 30s 1G'; // variables php que viens d arphi
`$command`;

// On récupère le résultat (preuve trouvée ou non)
$res=`grep PROOF-FOUND res.tmp | sed s/\(\\\*//| sed s/\\\*\)//`;

// On récupère le temps mis pour trouver la preuve
// Il faut sommer les temps utilisateur et système
$utime=`grep user time.tmp | cut -f 1 -d " " | sed s/user//`;
$stime=`grep user time.tmp | cut -f 2 -d " " | sed s/system//`;
$time=$utime + $stime;

// On construit le tableau associatif des résultats
$tab=array(res=>$res, time=>$time);

// On l'affiche pour vérifier
foreach ($tab as $elem)
  echo "$elem<br>";


// enregistrement de l'utilisateur dans la DBB
 $sql_insert  = "INSERT INTO test (nom_test,preuve_trouvee,temps_execution, date_test)
			VALUES ("prob.p","$res", "$time", "$date" )";  
										
				mysql_query ($sql_insert) or die ('Erreur SQL !'.$sql_insert.'<br />'.mysql_error());
													

?>

