<?php

	session_start();
	include_once('mysql-fix.php');
	include 'session.php';
	include 'adm.php';
	include 'conndb.php';
	include 'upper_menu.php';

	$dest = "dischi.php";

	if (!isset($_GET["id"])){
		header ("Location: ".$dest);
		exit();
	}
?>

<html>
<head>
	<title>Dettagli Dischi</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body background="style/bg3.jpg" style="background-repeat:no-repeat;">

<!-- Tabella dettaglio dischi -->
<div class='detail'>
	<?php
	$sql = "select * from $tbl_name where codice=$_GET[id]";
	
	$result = mysql_query($sql) or
		die ("<h4>database inaccessibile.</h4>");

	$line = mysql_fetch_array($result, MYSQL_ASSOC) or
		die ("<h4>database inaccessibile.</h4>");
	
	echo "
	<table class='table_dettagli' width='800px'>
	<tr>
			<td valign='top'>
				<img src='immagini/".$line['copertine']."'>"."
			</td>
			<td width='100%'><img src='style/line_vert.png' style='position:absolute; top:0px;'>
				<div style='line-height:30px; position:absolute; margin-left:5px; top:0px;'>Titolo:".$line['titolo']."</div>
				<br>
				<div style='line-height:65px; position:absolute; margin-left:5px;  top:0px;'>Artista: ".$line['artista']."</div>
				<br>
				<div style='line-height:95px; position:absolute; margin-left:5px;  top:0px;'>Prezzo: ".$line['prezzo']."&euro; Spedizione Gratuita </div>
				<br>
				<div style='line-height:125px; position:absolute; margin-left:5px;  top:0px;'>Genere: ".$line['genere']."</div>
				<br>
				<img src='style/linea.png' style='margin-left:5px; top:60px; position:absolute;'>
				<div style='line-height:20px; position:absolute; margin-left:5px;  top:80px;'>Tracklist:<br>".$line['descrizione']."<br><br>
				<a href='dischi.php'>Indietro</a></div>
			</td>
		</tr>
	</table>
";
	?>
</div>
</body>
</html>