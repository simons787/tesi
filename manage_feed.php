<?php
	include 'conndb.php';

	$feed_id= $_GET[id];
	mysql_query("DELETE FROM feed WHERE id=$feed_id");

	header("location:feed.php");

?>