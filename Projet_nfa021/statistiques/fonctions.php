<?php 

//affiche la liste des tests
function affiche_liste_tests()
{
global $bdd;
$sql = "SELECT * FROM test";
$reponse = $bdd->query($sql)		;

echo "<span>";
echo "<label>Tests:</label>";
echo "<select id'liste_tests' name='liste_tests' >";
echo "<option></option>";
while($donnees=$reponse->fetch())
{
echo "<option value='".$donnees['id_test']."'>".$donnees['nom_test']."</option>";	
}
echo "</select></span>";
$reponse->closeCursor();
}





//affiche la liste des outils
function affiche_liste_outils()
{
	global $bdd;
	$sql = "SELECT * FROM outil order by nom_outil asc";
	$reponse = $bdd->query($sql)		;
	echo "<span><label>Outils:</label><select id='liste_outils' name='liste_outils' >";
	echo "<option></option>";
	while($donnees=$reponse->fetch())
	{
		echo "<option value='".$donnees['id_outil']."'>".$donnees['nom_outil']."</option>";
	}
	echo "</select></span>";
	$reponse->closeCursor();
}

//affiche la liste des dates
function affiche_liste_dates()
{
	global $bdd;
	$sql = "SELECT * FROM date";
	$reponse = $bdd->query($sql)		;
	echo "<span><label>Dates:</label><select id='liste_dates' name='liste_dates' >";
	echo "<option></option>";
	while($donnees=$reponse->fetch())
	{
		echo "<option value='".$donnees['id_date']."'>".$donnees['date_action']."</option>";
	}
	echo "</select></span>";
	$reponse->closeCursor();
}


//affiche la liste des problèmes
function affiche_liste_problemes()
{
	global $bdd;
	$sql = "SELECT * FROM probleme";
	$reponse = $bdd->query($sql)		;
	echo "<span><label>Problèmes:</label><select id='liste_problemes' name='liste_problemes' >";
	echo "<option></option>";
	while($donnees=$reponse->fetch())
	{
		echo "<option value='".$donnees['id_probleme']."'>".$donnees['nom_probleme']."</option>";
	}
	echo "</select></span>";
	$reponse->closeCursor();
}


//affiche la liste des temps limite
function affiche_liste_temps_limite()
{
	global $bdd;
	$sql = "SELECT * FROM temps_limite";
	$reponse = $bdd->query($sql)		;
	echo "<span><label>Temps limites:</label><select id='liste_temps_limite' name='liste_temps_limite' >";
	echo "<option></option>";
	while($donnees=$reponse->fetch())
	{
		echo "<option value='".$donnees['id_temps_limite']."'>".$donnees['temps']."</option>";
	}
	echo "</select></span>";
	$reponse->closeCursor();
}




//affiche les résultats
function affiche_resulats($id_test,$id_probleme,$id_date,$id_outil)
{
	global $bdd;
	$sql="
			SELECT 
					test.nom_test, 
					probleme.nom_probleme,
					probleme.id_probleme,
					test.id_date,
					outil.nom_outil,
					test.preuve_trouvee,
					test.temps_execution,
					date.date_action
			FROM test 
					INNER JOIN probleme  on  probleme.id_probleme = test.id_probleme
					INNER JOIN outil  on  outil.id_outil = test.id_outil
					INNER JOIN date on date.id_date = test.id_date
			WHERE 1 ";
	
	if($id_test)
	{
		$sql.= " and test.id_test=" . $id_test;
		
	}
	
	if($id_probleme)
	{
		$sql.= " and test.id_probleme=" . $id_probleme;
	
	}
	
	if($id_date)
	{
		$sql.= " and test.id_date=" . $id_date;
	
	}
	
	if($id_outil)
	{
		$sql.= " and test.id_outil=" . $id_outil;
	
	}
	
	$sql.= " order by  id_probleme ";
		
	if($reponse = $bdd->query($sql))
		{
		echo
		"<table border ='1' class='tab'><tr>
		<th>Nom du test</th>
		<th>Probleme</th>
		<th>Date</th>
		<th>Outil</th>
		<th>Preuve</th>
		<th>Temps d'execution</th>
		</tr>";
		
		
		while($donnees=$reponse->fetch())
		{
			echo
			"<tr>
			<td>".$donnees['nom_test']."</td>
			<td><a href='detail_stat.php?prob=".$donnees['id_probleme']."&nom=".rawurlencode($donnees['nom_probleme'])."'>".$donnees['nom_probleme']."</a></td>
			<td>".$donnees['date_action']."</td>
			<td>".$donnees['nom_outil']."</td>
			<td>".$donnees['preuve_trouvee']."</td>
			<td>".$donnees['temps_execution']."</td>
			</tr>";
		
		}
		echo "</table>";
		$reponse->closeCursor();
		
	}
	else
	{
		echo "<span>Aucun résultat trouvé !</span>";
	}
	
}
?>;