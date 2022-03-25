<?php
if (isset($_SESSION["myusername"])){
?>
<SCRIPT LANGUAGE="JavaScript">
	<!-- Begin
	loadImage6 = new Image();
	loadImage6.src = "style/logout_bt_ov.png";
	staticImage6 = new Image();
	staticImage6.src = "style/logout_bt.png";

	// End -->
</script>  

<div class="button" style="margin-left: 705px;">
	<a href="logout.php" onMouseOver="image6.src=loadImage6.src;" onMouseOut="image6.src=staticImage6.src;">
	<img name="image6" src="style/logout_bt.png" border=0></a>
</div>
<?php
}
else {
?>	
<SCRIPT LANGUAGE="JavaScript">
	<!-- Begin
	loadImage5 = new Image();
	loadImage5.src = "style/login_bt_ov.png";
	staticImage5 = new Image();
	staticImage5.src = "style/login_bt.png";

	// End -->
</script>  

<div class="button" style="margin-left: 705px;">
	<a href="main_login.php" onMouseOver="image5.src=loadImage5.src;" onMouseOut="image5.src=staticImage5.src;">
	<img name="image5" src="style/login_bt.png" border=0></a>
</div>
<?php 
}
?>
