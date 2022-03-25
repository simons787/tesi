<?php
session_start();

$dest = "protected.php";

if (isset($_SESSION["admin"])){
	header ("Location: ".$dest);
	exit();
}

function ctrlLoginPasswd($login,$password) {
	if ($login!="simone")
		return -1;
	if ($password!="1234")
		return -2;
	return 0;
}

if (isset($_POST["login"])){
		$iret = ctrlLoginPasswd($_POST["login"],$_POST["password"]);
		if ($iret == -1){
			echo "<h2>Attenzione: login cliente non registrata</h2>";
			exit;
		}
		if ($iret == -2){
			echo "<h2>Attenzione: password errata per il cliente <em>$_POST[login]</em></h2>";
			exit;
		}
		$_SESSION["admin"] = $_POST["login"];
		header ("Location: ".$dest);
		exit();
}
?>

<html>
<head>
  <title>Immissione Password</title>
  <script type="text/javascript">
	function controllaDatiPassword() {
		if (document.formPasswd.login.value == "") {
			alert("Inserire login");
			document.formPasswd.login.focus();
			return false;
		}
		if (document.formPasswd.password.value == "") {
			alert("Inserire la password");
			document.formPasswd.password.focus();
			return false;
		}
		return true;
	}
  </script>
</head>

<body>
<form name="formPasswd" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" onSubmit="return controllaDatiPassword();">
<center>
	<table width="30%" border="0">
  <tr>
    <td align="right">Login:</td>
    <td><input type="text" name="login" size="20"></td>
  </tr>
  <tr>
    <td align="right">Password:</td>
    <td><input type="password" name="password" size="20"></td>
  </tr>
  <tr>
    <td align="right"><input type="reset" value="resetta"></td>
    <td><input type="submit" value="Registra password" ></td>
  </tr>
</table>

	<h1>Immissione password</h1>
	<hr>
		<form name="formPasswd" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"
		  onSubmit="return controllaDatiPassword();">
		
		Login:<input type="text" name="login" size="20">
		<br>Password:<input type="password" name="password" size="20">
		<hr>
		<input type="reset" value="resetta">
		<input type="submit" value="Registra password" >
	</form>
	<hr>
</center>
</body>
</html>
