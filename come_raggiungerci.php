<?php
	session_start();
	?>
<html>
	<head>
		<title>Come_Raggiungerci</title>
		<link rel="stylesheet" type="text/css" href="style2.css">
	</head>
<body background="style/bg2.jpg" style="background-repeat:no-repeat;">

<?php
	include 'session.php';
	include 'adm.php';
	include 'upper_menu.php';
?>

<!-- Cella contatti -->
<br>
<div class="contatti" >
	Via Antonio Cantore, 9, 25128 Brescia<br>
	Tel: 65487648465454<br>
	Mail: <a href="mailto:musicstore@gmail.com">musicstore@gmail.com</a>
</div>
	
<!-- Cella iframe Navigazione -->
<div style="top: 250px; position:absolute; z-index:0; margin-left:120px;" >
	<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=via+cantore+brescia&amp;aq=&amp;sll=45.55532,10.229168&amp;sspn=0.126691,0.308647&amp;ie=UTF8&amp;hq=&amp;hnear=Via+Antonio+Cantore,+25128+Brescia,+Lombardia,+Italy&amp;ll=45.555674,10.216932&amp;spn=0.007918,0.01929&amp;t=m&amp;z=14&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=via+cantore+brescia&amp;aq=&amp;sll=45.55532,10.229168&amp;sspn=0.126691,0.308647&amp;ie=UTF8&amp;hq=&amp;hnear=Via+Antonio+Cantore,+25128+Brescia,+Lombardia,+Italy&amp;ll=45.555674,10.216932&amp;spn=0.007918,0.01929&amp;t=m&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
</div>
	
</body>
</html>