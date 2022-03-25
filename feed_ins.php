<?php
	session_start();
	include 'session.php';
	include 'adm.php';
	include 'upper_menu.php';
	include 'conndb.php';
	
//variabili che vengono acquisite dal form
$submit = strip_tags ($_POST['submit']);

//il comando ' strip_tags' elimina i caratteri speciali, in questo modo evitiamo eventuali errori di inserimento

$data = (strip_tags ($_POST['data']));

$testo = (strip_tags($_POST['testo']));


if ($submit){
	//query
	$sqlcmd  = "INSERT INTO feed(data,testo) VALUES ('$data','$testo')"; 
	mysql_query( $sqlcmd );	   
}
?>

<html>
<head>
<title>Feed_ins</title>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body background="style/bg2.jpg" style="background-repeat:no-repeat;">

<div class="fieldset">
<?php
include 'adm_menu.php';
?>
<br>
* aaaa-mm-gg
<br>
<br>
<fieldset>
	<form action="feed_ins.php" method="post">
		<table class="magazzino">
			<tr>
				<td align="right"> Data*:</td>
				<td>
					<input type="text" name="data" value="<?php $data;?>">
				</td>
			</tr>
			<tr>
				<td align="right">Testo:</td>
				<td align="right">
					<input type="text" name="testo" value="<?php $testo;?>">
				</td>
			</tr>
            <tr>
    			<td align="right" colspan="2">
    				<input type="reset" value="reset"> <input type="submit" name="submit" value="submit">
    			</td>			
			</tr>
		</table>
	</form>
</fieldset>
<br>
<a href="private.php">Back</a> | <a href="index.php">Home</a>
</div>
</body>
</html>