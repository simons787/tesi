<?php 
session_start(); 
include 'upper_menu.php';
include 'session.php';
include 'adm.php';
include 'upper_menu.php';
?>
<html>
<head>
	<title>Carrello</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>


<body background="style/bg2.jpg" style="background-repeat:no-repeat;">


<?php

$host="localhost"; // nome dell'Host
$username="root"; // username di Mysql
$password=""; // password di Mysql 
$db_name="tesi"; // nome del Database
$tbl_name="dischi"; // nome della tabella a cui facciamo riferimento

// Connettiamoci al server e al database.
mysql_connect("$host", "$username", "$password")or die("non riesco a connettermi al database");
mysql_select_db("$db_name")or die("non riesco a selezionare il database");

?>
<div class='carrello'>
<?php

	$product_id = $_GET[id];	 //Prende l'id del prodotto dalla URL
	$action 	= $_GET[action]; //Prende l'azione dall' URL 

	//Se troviamo un id_prodotto e quell'id prodotto non esiste mostra un messaggio d'errore 
	if($product_id && !productExists($product_id)) {
		die("Errore. il prodotto selezionato non esiste");
	}

	switch($action) {	//Decide cosa fare 
	
		case "add":
			$_SESSION['cart'][$product_id]++; //aggiunge un 1 alla quantità per il prodotto associato a product_id
		break;
		
		case "remove":
			$_SESSION['cart'][$product_id]--; //Rimuove di 1 la quantità per il prodotto associato a product_id  
			if($_SESSION['cart'][$product_id] == 0) unset($_SESSION['cart'][$product_id]); //Se la quantità è zero il prodotto viene rimosso dalla tabella  (usando la funzione 'unset')  
		break;
		
		case "empty":
			unset($_SESSION['cart']); //Svuota il carrello 
		break;
	
	}
	
?>


<?php	

	if($_SESSION['cart']) {	//Se il carrello NON è vuoto 
		//Mostra il contenuto del carrello
		echo "<table padding=\"3\" width=\"100%\">";	//Il carrello viene formattato utilizzando una tabella html
		
			// $product_id è la nostra chiave  and $quantity è il valore 
			foreach($_SESSION['cart'] as $product_id => $quantity) {	
				
				//Estrapola le informazioni relative al prodotto dal database
				//use sprintf to make sure that $product_id is inserted into the query as a number - to prevent SQL injection
				$sql = sprintf("SELECT artista,titolo,disponibile,prezzo FROM dischi WHERE codice = %d;",
								$product_id); 
					
				$result = mysql_query($sql);
					
				//Mostra la riga solo se c'è un prodotto nel carrello
				if(mysql_num_rows($result) > 0) {
				
					list($name, $title, $description, $price) = mysql_fetch_row($result);
				
					$line_cost = $price * $quantity;		//Calcola il costo in base alla quantità
					$total = $total + $line_cost;			//Aggiorna il valore del costo totale 
				
					echo "<tr >";
						//Mostra le informazioni in celle 
						echo "<td class=\"carrello_cella\" align=\"center\">$name</td>";
						echo "<td class=\"carrello_cella\" align=\"center\">$title</td>";
						//Piazza un link che rimuove i prodotti accanto ad ogni cella  
						echo "<td class=\"carrello_cella\" align=\"center\">$quantity <a href=\"$_SERVER[PHP_SELF]?action=remove&id=$product_id\">X</a></td>";
						echo "<td class=\"carrello_cella\" align=\"center\">$line_cost</td>";
					echo "</tr>";
					
				}
			
			}
			
			//Mostra il totale 
			echo "<tr class=\"carrello_cella\">";
				echo "<td colspan=\"3\" align=\"right\">Totale &euro;</td>";
				echo "<td align=\"center\">$total</td>";
			echo "</tr>";
			
			//show the empty cart link - which links to this page, but with an action of empty. A simple bit of javascript in the onlick event of the link asks the user for confirmation
			echo "<tr class=\"carrello_cella\" >";
				echo "<td colspan=\"4\" align=\"right\"><a href=\"$_SERVER[PHP_SELF]?action=empty\" onclick=\"return confirm('Sei sicuro ?');\">Svuota il carrello</a></td>";
			echo "</tr>";		
		echo "</table>";
		
		
		
	
	}else{
		//Altrimenti dice all'utente che non ci sono articoli nel carrello
		echo "Non hai articoli nel tuo carrello.";
		
	}
	
	//fFunzione che controlla l'esistenza di un prodotto 
	function productExists($product_id) {
			//Usiamo sprintf per essere sicuri che l'id sia preso come numero e non come carattere  
			//- per prevenire l'"SQL injection"
						$sql = sprintf("SELECT * FROM dischi WHERE codice = %d;",
						$product_id); 
				
			return mysql_num_rows(mysql_query($sql)) > 0;
	}
?>
<br>
<?php
if($_SESSION['cart']){
echo "<a href='https://www.paypal.com'>Paga</a>";
echo "<br>";
} 
?>

<a href="dischi.php">Continua i tuoi acquisti</a>
</div>


</body>
</html>