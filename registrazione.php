<?php
session_start();
include_once('mysql-fix.php');
include 'session.php';
include 'adm.php';	
include 'conndb.php';
include 'upper_menu.php';

//variabili che vengono acquisite dal form
//$submit = ($_POST['submit']);

if (isset($_POST['submit'])) 
{ 
	$submit = ($_POST['submit']);       // Istruzioni se $_POST['myVar'] esiste 
}

//il comando ' strip_tags' elimina i caratteri speciali, in questo modo evitiamo eventuali errori di inserimento

//$username = ( ($_POST['username']));

if (isset($_POST['username'])) 
{ 
	$submit = ($_POST['username']);       // Istruzioni se $_POST['myVar'] esiste 
}

//$password = (  ($_POST['password']));

if (isset($_POST['password'])) 
{ 
	$submit = ($_POST['password']);       // Istruzioni se $_POST['myVar'] esiste 
}

//$repeatpassword = (($_POST['repeatpassword']));

if (isset($_POST['repeatpassword'])) 
{ 
	$submit = ($_POST['repeatpassword']);       // Istruzioni se $_POST['myVar'] esiste 
}

/* per gestire gli accessi introduciamo la variabile priorità in questo modo 
possiamo differenziare i normali users dagli amministratori,sarà l'amministratore super user che potrà gestire i permessi amministratore.
super user: 111
admin: 1
utente: 0
*/
$priorita = 0;

$data = date("y-m-d");

//if ($submit)
if (isset($submit))
{
// controlla l'esistenza della password
if ($username&&$password&&$repeatpassword)
	{
		
		if ($password==$repeatpassword)
			{
				//controllo caratteri dello username
				if (strlen($username)>25)
					{
				 		echo " lunghezza username superiore a 25 caratteri ";
					}
				else
				if (strlen($password)>25||strlen($repeatpassword)<3)
					{
				 		echo "la password deve essere tra i 4 e i 25 caratteri ";
					}
					else
					{
						//register user 
						// se il check va a buon fine allora codifica la password in md5
						$password = md5($password);
						$repeatpassword = md5($repeatpassword);
						
						//apre il database
						$host="localhost"; // nome dell'Host
						$usr="root"; // username di Mysql
						$psw=""; // password di Mysql 
						$db_name="tesi"; // nome del Database
						$tbl_name="members"; // nome della tabella a cui facciamo riferimento
						
						

						// Connettiamoci al server e al database.
						mysql_connect("$host", "$usr", "$psw")or die("non riesco a connettermi al database");
						mysql_select_db("$db_name")or die("non riesco a selezionare il database");
						
						$sqlcmd  = "INSERT INTO $tbl_name VALUES";
						$sqlcmd .= "('','$data','$username','$password','$priorita')";
						mysql_query( $sqlcmd );
						if ( mysql_errno()== 0 ){
							echo "comando eseguito con successo <a href='index.php'>Torna all'index</a>";													
							} else {
								echo "errore nel comando";}				
						
						
					}
			}
		else 
		echo "le password non coincidono";	
	}
else 
echo "inserisci tutti i campi";

}

?>

<head>
<title>Registrazione</title>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body background="style/bg2.jpg" style="background-repeat:no-repeat;">

<div class="registrazione">
<fieldset>
	<form action="registrazione.php" method="post">
		<table>
			<tr>
				<td align="right"> Username:</td>
				<td>
					<input type="text" name="username" value="<?php $username;?>">
				</td>
			</tr>
			<tr>
				<td align="right">Password:</td>
				<td align="right">
					<input type="password" name="password" value="<?php $password;?>">
				</td>
			</tr>
			<tr>
				<td>Ripeti Password:</td>
				<td align="right">
					<input type="password" name="repeatpassword">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="registra">
				</td>
			</tr>
		</table>
	</form>
</fieldset>
<br>
<a href="main_login.php">Indietro</a>
</div>
</body>
</html>