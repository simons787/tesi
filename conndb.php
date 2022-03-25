<?php
	include_once('mysql-fix.php');
	$host="localhost"; // nome dell'Host
	$username="root";// username di Mysql
	$password=""; 	// password di Mysql 
	$db_name="tesi";// nome del Database
	$tbl_name="dischi";// nome della tabella a cui facciamo riferimento
	
	// Connettiamoci al server e al database.
	mysql_connect("$host", "$username", "$password")or die("non riesco a connettermi al database");
	mysql_select_db("$db_name")or die("non riesco a selezionare il database");
	?>