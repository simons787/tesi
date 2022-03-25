<?php
	session_start();
	include 'session.php';
	include 'adm.php';
	include 'upper_menu.php';
	include 'conndb.php';
	$sql="SELECT * FROM feed ";
	$resultb=mysql_query($sql);
?>

<html>
<head>
<title>Feed</title>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body background="style/bg2.jpg" style="background-repeat:no-repeat;">

<div class="fieldset">
<div>
<?php
include 'adm_menu.php';
?>
<br>
<br>
<br>
<table cellspacing="0" cellpadding="0" class="magazzino" style="width:100%; height:100%;">
	<tr>
		<th class="magazzino">id</th>
		<th class="magazzino">Testo</th>
		<th class="magazzino">data</th>
        <th class="magazzino">Modifica</th>
        <th class="magazzino">Elimina</th>
	</tr>
	<?php
		while ($rowb = mysql_fetch_array($resultb)){
			$id=$rowb["id"];
			$username=$rowb["testo"];
			$data=$rowb["data"];
	?>
	<tr>
		<td align="center" class="magazzino"><?php echo $id; ?></td>
		<td align="center" class="magazzino"><?php echo $username; ?></td>
		<td align="center" class="magazzino"><?php echo $data; ?></td>
        <td align="center" class="magazzino"><?php echo "<img src='thumb/pencil.png' width='30' heigt='30'>"; ?></td>
		<td align="center" class="magazzino"><?php echo "<a href='manage_feed.php?action=add&id=".$id."'>"."<img src='thumb/delete.png' width='30' heigt='30'>"."</a>"; ?></td>
	</tr>
	<?php
		}
	?>
</table>
</body>
</html>