<?php
session_start();
	
	//includiamo il file che permette la connessione al database 
    include 'conndb.php';
	//includiamo il file che aggiunge la voce login/logout al menu
	include 'session.php';
	//includiamo il file che permette di entrare nella sezione amministrativa
	include 'adm.php';
	//includiamo il file del menu
	include 'upper_menu.php';

?>

<html>
<head>
	<title>Ricerca_Dischi</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body background="style/bg2.jpg" style="background-repeat:no-repeat;">

<p class='carrello'>
<?php

//Riceviamo il submit dal form presente in upper_menu.php
$button = $_GET ['submit'];
$search = $_GET ['search']; 

if(!$button)
	// Se il bottone non viene premuto visualizziamo un messaggio (questo codice è stato utilizzato nelle prime fasi di test del sito) 
	echo "<p class='carrello' style='top:250px;'>Non hai inserito una parola chiave</p>";
	else{
		if(strlen($search)<=1)
		echo "<p class='carrello' style='top:230px;'>la parola da cercare e' troppo corta</p>";
		else
		{
			echo "<p class='carrello' style='top:230px;'>hai cercato <b>$search</b><br></p>";
			mysql_connect("localhost","root","");
			mysql_select_db("tesi");
			$search_exploded = explode (" ", $search);
			foreach($search_exploded as $search_each)
				{
					$x++;
					if($x==1){
							$construct .="keywords LIKE '%$search_each%'";
					}
						else{
								$construct .="AND keywords LIKE '%$search_each%'";
						}	
					$construct ="SELECT * FROM dischi WHERE $construct";
					$run=mysql_query($construct) or die("Error: ". mysql_error(). " with query ". $construct);
					$foundnum = mysql_num_rows($run);
					if ($foundnum==0){
							echo "<p class='carrello' style='top:300px;'>Siamo spiacenti, non ci sono risultati per <b>$search</b>.</br></br> 
							Riprova con un altra parola chiave.</p>";
					}
						else{
							echo "<p class='carrello' style='top:200px;'>$foundnum";
							if ($foundnum == 1 ){
								//Se viene trovato un riscontro allora viene stampata la tabella 
								echo " risultato trovato<br></p>";
							} 
							else{
								echo " risultati trovati<br></p>";
							}
						}			
?>
					<table width="50%" border="0" cellpadding="4" cellspacing="0" class="table4" >
						<?php
							while($runrows = mysql_fetch_assoc($run)){
								$codice = $runrows ['codice'];
								$artista = $runrows ['artista'];
								$titolo = $runrows ['titolo'];
								$copertine = $runrows ['copertine'];
								$prezzo = $runrows ['prezzo'];
								$genere = $runrows ['genere'];
								$descrizione=$runrows ["descrizione"];
								$disponibile=$runrows ["disponibile"];
						?>
					<tr>
						<td align="left" width="150px">
							<?php echo "<img width='150' height='150'src='immagini/".$copertine."'>"; ?>
						</td>
						<td align="left" height="10px" valign="top"><img src="style/line_vert.png" style="position:absolute">
							<?php echo "
							<div style='line-height:20px; position:absolute; margin-left:5px; '><a class='td_title' href='detail.php?id=$codice'>".$titolo."</a></div>"." <br> "
							."<div style='line-height:35px; position:absolute; margin-left:5px; '>Artista: <a href='detail.php?id=$codice'>".$artista."</a></div><br>
							<div style='line-height:30px; position:absolute; margin-left:5px;'>"
							.$genere."</div><br>"
							."<img src='style/linea.png' style='margin-left:5px; top:250px;'><div style='line-height:30px; position:absolute;margin-left:5px;'>" ."&euro;".$prezzo." Spedizione gratuita<br></div>";?>
							<?php if(isset($_SESSION['myusername'])){	echo "<div style='line-height:90px; position:absolute; margin-left:5px;'><a href='cart.php?action=add&id=".$codice."'><img src='style/cart.png' style='top:30px; position:absolute;'></a></div>"; }?>
						</td>
					</tr> 
						<?php 
							} echo "</table>";
				}

		}
	}
?>
</p>
</body>
</html>