<?php
session_start();
include 'session.php';
include 'adm.php';
include 'conndb.php';
include 'upper_menu.php';


//variabili che vengono acquisite dal form
$submit = (strip_tags ($_POST['submit']));

$codice = ($_POST['codice']);

$artista = (strip_tags ($_POST['artista']));

$titolo =  (strip_tags ($_POST['titolo']));

$prezzo = (strip_tags ($_POST['prezzo']));

$genere = (strip_tags ($_POST['genere']));

$voto = (strip_tags ($_POST['voto']));

$descrizione = (strip_tags ($_POST['descrizione']));

$disponibile = (strip_tags ($_POST['disponibile']));

$data = (strip_tags ($_POST['data']));

$keywords = (strip_tags ($_POST['keywords']));


if ($submit){
	
	//query
	$sqlcmd  = "
	UPDATE dischi 
	SET artista= '$artista', titolo= '$titolo', prezzo= '$prezzo', genere= '$genere', 
	voto= '$voto', descrizione= '$descrizione', disponibile= '$disponibile', data= '$data', keywords= '$keywords'  
	WHERE codice='$codice' "; 
	mysql_query($sqlcmd) or die (mysql_error());
		   
}


?>
<html>
<head>
<title>Private</title>
</head>
<link rel="stylesheet" type="text/css" href="style2.css">
<body background="style/bg2.jpg" style="background-repeat:no-repeat;">

<div class="fieldset">
<?php
include 'adm_menu.php';
?>
<br>
<br>
*aaaa-mm-gg
<br>
<br>
<fieldset>
<form action="mod_product.php" method="post" ENCTYPE="multipart/form-data">
<table width="40%" border="0">
  <tr>
    <td align="right">Codice: </td>
    <td><input type="text" name="codice" value="<?php $codice;?>"></td>
  </tr>
  <tr>
    <td align="right">Artista: </td>
    <td><input type="text" name="artista" value="<?php $artista;?>"></td>
  </tr>
  <tr>
    <td align="right">Titolo: </td>
    <td><input type="text" name="titolo" value="<?php $titolo;?>"></td>
  </tr>
  <tr>
    <td align="right">Prezzo: </td>
    <td><input type="text" name="prezzo" value="<?php $prezzo;?>"></td>
  </tr>
  <tr>
    <td align="right">Genere: </td>
    <td><input type="text" name="genere" value="<?php $genere;?>"></td>
  </tr>
   <tr>
    <td align="right">Voto: </td>
    <td><input type="text" name="voto" value="<?php $voto;?>"></td>
  </tr>
    <tr>
    <td align="right">Descrizione: </td>
    <td><input type="text" name="descrizione" value="<?php $descrizione;?>"></td>
  </tr>
  <tr>
    <td align="right">Disponibilita': </td>
    <td><input type="text" name="disponibile" value="<?php $disponibile;?>"></td>
  </tr>
    <tr>
    <td align="right">Data*: </td>
    <td><input type="text" name="data" value="aaaa-mm-gg<?php $data;?>"></td>
  </tr> 
   <tr>
    <td align="right">Keywords: </td>
    <td><input type="text" name="keywords" value="<?php $keywords;?>"></td>
  </tr> 
    <tr>
    <td align="right"></td>
    <td><input type="reset" value="reset"> <input type="submit" name="submit" value="registra"></td>
  </tr> 
</table>
</form>
</fieldset>
<br />
<a href="main_login.php">back</a> || <a href="index.php">home</a>
</div>
</body>
</html>
