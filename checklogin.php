<?php

include_once('mysql-fix.php');

$host="localhost"; // nome dell'Host
$username="root"; // username di Mysql
$password=""; // password di Mysql 
$db_name="tesi"; // nome del Database
$tbl_name="members"; // nome della tabella a cui facciamo riferimento

// Connettiamoci al server e al database.
mysql_connect("$host", "$username", "$password")or die("non riesco a connettermi al database");
mysql_select_db("$db_name")or die("non riesco a selezionare il database");

// Username e Password mandate dal form della pagina main_login.php
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$mypassword = md5 ($mypassword);


$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword' ";
$result=mysql_query($sql);

// Mysql_num_row serve per contare il numero di righe (row)
$count=mysql_num_rows($result);
// se il risultato coincide $myusername and $mypassword, la riga della tabella a cui facciamo riferimento deve essere composta da una riga sola 

if($count==1){
// Registra $username e $password e manda l'utente alla pagina "login_success.php"
	session_start();
	$_SESSION ['myusername']=$myusername;
	$riga = mysql_fetch_array($result);
	if ($riga["priorita"] == 1)
	{
	header("location:private.php");}
	else {
	header ("location:login_success.php")
	;}
}
	else{
	echo "
	<html>
	<head>
	<title>Dischi</title>
	<link rel='stylesheet' type='text/css' href='style2.css'>
	</head>


	<body background='style/bg2.jpg' style='background-repeat:no-repeat;'>";
	include 'upper_menu.php';
	include 'adm.php';
	include 'session.php';
	echo "
	<div class='registrazione'>
	Userneme o password errati <br><br>
	<a href='main_login.php'>back</a>
	</div>
	</body></html>
	";
}

?>