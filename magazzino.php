<?php
session_start();
include 'session.php';
include 'adm.php';
include 'conndb.php';
include 'upper_menu.php';
	$sql="SELECT * FROM dischi";
	$resultb=mysql_query($sql);
?>
<html>
<head>

<title>Modifica/elimina prodotti</title>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body background="style/bg2.jpg" style="background-repeat:no-repeat;">

<div class="fieldset">
<?php
include 'adm_menu.php';
?>
<br>
<br>
<br>

<table cellspacing="0" cellpadding="0" class="magazzino" style="width:100%; height:100%;">
	<tr class="magazzino">
		<th class="magazzino">Codice</th>
		<th class="magazzino">Artista</th>
		<th class="magazzino">Titolo</th>  
        <th class="magazzino">Modifica</th>
        <th class="magazzino">Cancella</th>        
	</tr>
	<?php
		while ($rowb = mysql_fetch_array($resultb)){
			$codice=$rowb["codice"];
			$artista=$rowb["artista"];
			$titolo=$rowb["titolo"];	
	?>
	<tr>
		<td align="center" class="magazzino"><?php echo $codice; ?></td>
		<td align="center" class="magazzino"><?php echo $artista; ?></td>
		<td align="center" class="magazzino"><?php echo $titolo; ?></td>
        <td align="center" class="magazzino"><?php echo "<a href='mod_product.php'>"."<img src='thumb/pencil.png' width='30' heigt='30'>"."</a>"; ?></td>
		<td align="center" class="magazzino"><?php echo "<a href='manage_prd.php?action=add&codice=".$codice."'>"."<img src='thumb/delete.png' width='30' heigt='30'>"."</a>"; ?></td>
	</tr>
	<?php
		}
	?>
</table>

</div>
</body>
</html>