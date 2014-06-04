<?php

// fonction enregistrement de la date dans la base de donnees  si elle n'existe pas - PAS DE DOUBLONS 
// il existe une contrainte d'unicité dans la table date dans phpmyadmin  mais qui ne semble pas fonctionner
// IGNORE dans la requête pour eviter les doublons en plus de la contrainte d'unicité

		function EnregistreDate($lien, $date){
		
					$sql_date = "INSERT IGNORE INTO date (date_action)
								VALUES ('$date')";
						
					$query_date = mysqli_query($lien, $sql_date) or die('Erreur date !<br />'.$sql_date. mysql_errno()); 
			
			
	}			
		

?>
