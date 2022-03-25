<?php
session_start();

$dest = "protected.php";

unset($_SESSION["admin"]);
header ("Location: ".$dest);
?>
