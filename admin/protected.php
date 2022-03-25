<?php
session_start();

$dest = "admin.php";

if (!isset($_SESSION["admin"])){
	header ("Location: ".$dest);
	exit();
}
?>

<html>
<head>
  <title>Zona privata</title>
 </head>
<body>
<center>
	<b>Zona Privata</b>
    <br>
    <br>
	<a href="#">Form inserimento dati</a>
    <br>
    <br>
    <a href="#">Statistiche</a>
    <br>
    <br>
	<a href="logout.php" >clicca per terminare la sessione</a>
</center>
</body>
</html>
