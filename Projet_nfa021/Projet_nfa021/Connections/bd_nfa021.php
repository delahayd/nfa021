<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_bd_nfa021 = "localhost";
$database_bd_nfa021 = "projet_nfa021";
$username_bd_nfa021 = "root";
$password_bd_nfa021 = "root";
$bd_nfa021 = mysql_pconnect($hostname_bd_nfa021, $username_bd_nfa021, $password_bd_nfa021) or trigger_error(mysql_error(),E_USER_ERROR); 
?>