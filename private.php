<?php
session_start();
include 'session.php';
include 'adm.php';
include 'conndb.php';
include 'upper_menu.php';


//variabili che vengono acquisite dal form
$submit = (strip_tags ($_POST['submit']));

$artista = (strip_tags ($_POST['artista']));

$titolo =  (strip_tags ($_POST['titolo']));

$copertine = $_FILES['userfile']['name'];

$prezzo = (strip_tags ($_POST['prezzo']));

$genere = (strip_tags ($_POST['genere']));

$voto = (strip_tags ($_POST['voto']));

$descrizione = (strip_tags ($_POST['descrizione']));

$disponibile = (strip_tags ($_POST['disponibile']));

$data = (strip_tags ($_POST['data']));

$keywords = (strip_tags ($_POST['keywords']));


if ($submit){
	
	// Configuration - Your Options
      $allowed_filetypes = array('.jpg','.gif','.bmp','.png'); // These will be the types of file that will pass the validation.
      $max_filesize = 524288; // Massima grandezza consentita per il caricamento dell'immagine
      $upload_path = 'immagini/'; // The place the files will be uploaded to (currently a 'files' directory).
 
   $filename = $_FILES['userfile']['name']; // Get the name of the file (including file extension).
   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
   
      // Now check the filesize, if it is too large then DIE and inform the user.
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
      die('Il file da caricare è troppo grande.');
 
   // Controlla se è possibile caricare il file nella directory.
   if(!is_writable($upload_path))
      die('Non puoi caricare il file nella directory.');
 
   // Upload del file nell percorso specificato da $upload_path.
   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
         echo 'Caricamento del file eseguito con successo, vedi il file <a href="'.$upload_path.$filename.'"title="Your File">here</a>'; // It worked.
      else
         echo '';  
		 
		 
	//query
	$sqlcmd  = "INSERT INTO $tbl_name (artista,titolo,copertine,prezzo,genere,descrizione,voto,disponibile,data,keywords)VALUES 
	('$artista','$titolo','$copertine','$prezzo','$genere','$descrizione','$voto','$disponibile','$data','$keywords')"; 
	mysql_query( $sqlcmd );
		   
}

$submit = '';
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
<form action="private.php" method="post" ENCTYPE="multipart/form-data">
<table width="40%" border="0">
  <tr>
    <td align="right">Artista: </td>
    <td><input type="text" name="artista" value="<?php $artista;?>"></td>
  </tr>
  <tr>
    <td align="right">Titolo: </td>
    <td><input type="text" name="titolo" value="<?php $titolo;?>"></td>
  </tr>
    <tr>
    <td align="right" valign="top">Copertina: </td>
    <td><label for="file"></label> <input type="file" name="userfile" id="file"> <br />
      </td>
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