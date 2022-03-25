<?php
	include 'conndb.php';

	$code_id= $_GET[codice];
	mysql_query("DELETE FROM dischi WHERE codice=$code_id");

	header("location:magazzino.php");

?>