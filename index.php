<?php
	session_start();
	
	include_once('mysql-fix.php');
	//includiamo il file che aggiunge la voce login/logout al menu
	include 'session.php';
	//includiamo il file che permette di entrare nella sezione amministrativa
	include 'adm.php';
	
    include 'conndb.php';
	
	// Query,ordina i dischi in base alla data di arrivo 
	$sql="SELECT * FROM $tbl_name ORDER BY data DESC ";
	$result=mysql_query($sql);
	
	//Query che richiama i feed Rss 
	$sqlb="SELECT * FROM feed ORDER BY data DESC ";
	$resultb=mysql_query($sqlb);
	
?>
 
<html>

<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body background="style/bg.jpg" style="background-repeat:no-repeat">

<?php
	include 'upper_menu.php';
	
	//$num=mysql_numrows($result);mysql_close(); 

	/* Inziamo un ciclo for che stampa le copertine dei dischi in una tabella
		*/
	for ($i = 1; $i<8; $i++) {
		
		if ($i < 8 ) {
			$codice=mysql_result($result,$i,"codice");
			$copertine=mysql_result($result,$i,"copertine");
?>
			
<div class="alb_foto" style="left: 130px;">
	<?php  echo "<a class='td_title' href='detail.php?id=$codice'><img width='139' height='140'src='immagini/".$copertine."'></a>"; ?>
</div>
	
<?php 
			$i++;
			$codice=mysql_result($result,$i,"codice");
			$copertine=mysql_result($result,$i,"copertine");
?>
			
<div class="alb_foto" style="left: 290px;">
	<?php  echo "<a class='td_title' href='detail.php?id=$codice'><img width='139' height='140'src='immagini/".$copertine."'></a>"; ?>
</div>
	
<?php 
			$i++;
			$codice=mysql_result($result,$i,"codice");
			$copertine=mysql_result($result,$i,"copertine");
?>
			
<div class="alb_foto" style="left: 450px;">
	<?php  echo "<a class='td_title' href='detail.php?id=$codice'><img width='139' height='140'src='immagini/".$copertine."'></a>"; ?>
</div>
	
<?php 
			$i++;
			$codice=mysql_result($result,$i,"codice");
			$copertine=mysql_result($result,$i,"copertine");
?>
			
<div class="alb_foto" style="left: 610px;">
	<?php  echo "<a class='td_title' href='detail.php?id=$codice'><img width='139' height='140'src='immagini/".$copertine."'></a>"; ?>
</div>
	
<?php 
			$i++;
			$codice=mysql_result($result,$i,"codice");
			$copertine=mysql_result($result,$i,"copertine");
?>
			
<div class="alb_foto2" style="left: 130px;">
	<?php  echo "<a class='td_title' href='detail.php?id=$codice'><img width='139' height='140'src='immagini/".$copertine."'></a>"; ?>
</div>
	
<?php 
			$i++;
			$codice=mysql_result($result,$i,"codice");
			$copertine=mysql_result($result,$i,"copertine");
?>
			
<div class="alb_foto2" style="left: 290px;">
	<?php  echo "<a class='td_title' href='detail.php?id=$codice'><img width='139' height='140'src='immagini/".$copertine."'></a>"; ?>
</div>
	
<?php 
			$i++;
			$codice=mysql_result($result,$i,"codice");
			$copertine=mysql_result($result,$i,"copertine");
?>
			
<div class="alb_foto2" style="left: 450px;">
	<?php  echo "<a class='td_title' href='detail.php?id=$codice'><img width='139' height='140'src='immagini/".$copertine."'></a>"; ?>
</div>

<?php 
			$i++;
			$codice=mysql_result($result,$i,"codice");
			$copertine=mysql_result($result,$i,"copertine");
?>
			
<div class="alb_foto2" style="left: 610px;">
	<?php  echo "<a class='td_title' href='detail.php?id=$codice'><img width='139' height='140'src='immagini/".$copertine."'></a>"; ?>
</div>

<?php 
		} else {
			break;
		}

	}

?>

 
<!-- Feed Rss -->
<table cellpadding="0" cellspacing="0" class="feed">
	<?php
		while ($rowb = mysql_fetch_array($resultb))
		{
		$id=$rowb["id"];
		$testo=$rowb["testo"];
		$data=$rowb["data"];
		?>
	<tr>
		<td>
			<?php echo $data; ?></div> 
		</td>
	</tr>	
	<tr>
		<td>
			<?php echo $testo; ?></div>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo "--------------------------------";?>
		</td>
	</tr>
<?php
		}
		?>
</table>

<!-- Copyright -->
<div class="copyright">&#169 2012 Simone Sabatti. Tutti i diritti riservati. Autore <a href="mailto:abc@gmail.com">Simone Sabatti</a> </div>

</body>
</html>