<?php
	session_start();
	include 'conndb.php';

	//Query 
	$sql="SELECT * FROM $tbl_name ";
	$result=mysql_query($sql);
?>
<html>
<head>
	<title>Dischi</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>


<body background="style/bg2.jpg" style="background-repeat:no-repeat;">

<?php
	include 'session.php';
	include 'adm.php';
	include 'upper_menu.php';
?>


<!-- Stampa i prodotti presenti in catalogo con i relativi dati  -->
<table width="50%" border="0" cellpadding="10" cellspacing="0" class="table" >
	<?php
		while ($row = mysql_fetch_array($result))
			{
				$codice=$row["codice"];
				$artista=$row["artista"];
				$titolo=$row["titolo"];
				$copertine=$row["copertine"];
				$prezzo=$row["prezzo"];
				$genere=$row["genere"];
				$descrizione=$row["descrizione"];
				$disponibile=$row["disponibile"];
	?>
	<tr>
		<td align="left" rowspan="1" width="150px">
			<?php echo "<img width='150' height='150'src='immagini/".$copertine."'>"; ?>
		</td>
		<td align="left" height="10px" valign="top"><img src="style/line_vert.png" style="position:absolute">
			<?php echo "
			<div style='line-height:20px; position:absolute; margin-left:5px;'><a class='td_title' href='detail.php?id=$codice'>".$titolo."</a></div>"." <br> "
			."<div style='line-height:35px; position:absolute; margin-left:5px;'>Artista:".$artista."</a></div><br>
			<div style='line-height:30px; position:absolute; margin-left:5px;'>"
			.$genere."</div><br>"
			."<img src='style/linea.png' style='margin-left:5px;'><div style='line-height:30px; position:absolute;margin-left:5px;'>" ."&euro;".$prezzo." Spedizione gratuita<br></div>";?>
			<?php if(isset($_SESSION['myusername'])){	echo "<div style='line-height:90px; position:absolute; margin-left:5px;'><a href='cart.php?action=add&id=".$codice."'><img src='style/cart.png' style='top:30px; position:absolute;'></a></div>"; }?>
		</td>
	</tr>
	<?php 
			}
	?>
</table>
</body>
</html>