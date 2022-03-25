<?php
if (isset($_SESSION["myusername"])){
	$check = $_SESSION["myusername"];
	$as = 'simone';
	if ($check == $as)
	{echo "<a style='top: 40px; margin-left: 825px; position:absolute;' href='private.php'><img src='style/adm.png'></a>";}
}
?>