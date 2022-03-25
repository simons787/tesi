<?php
	session_start();
?>
<html>
<title>main_login</title>
<link rel="stylesheet" type="text/css" href="style2.css">
<body background="style/bg2.jpg" style="background-repeat:no-repeat;">

<?php
	include 'session.php';
	include 'adm.php';
	include 'upper_menu.php';
?>


<!-- Login -->
<div class="login">
	<fieldset>
		<form name="form1" method="post" action="checklogin.php">
			<br>
			<table border="0" align="center">
				<tr>
					<td>Nome utente</td>
					<td>:</td>
					<td><input name="myusername" type="text" id="myusername"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input name="mypassword" type="password" id="mypassword"></td>
				</tr>
				<tr>
					<td><input type="submit" name="Submit" value="Login"></td>
					<td></td>
					<td><a href="registrazione.php">Registrazione</a></td>
				</tr>
			</table>
		</form>
    </fieldset>
	<br>
	<p align="center"><a href="index.php">Indietro</a> || <a href="index.php">Home</a></p>
</div>
</body>
</html>