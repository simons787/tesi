<?php
	include 'conndb.php';

	$user_id= $_GET[id];
	mysql_query("DELETE FROM $tbl_name WHERE id=$user_id");

	header("location:manage.php");

?>