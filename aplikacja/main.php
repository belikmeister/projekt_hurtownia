<html>
	<head>
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="style.css">
		<title>
		Hurtownia WWW
		</title>
	</head>
	
	<body>
<div id="top"><?php
session_start();
include('menu.php');
?></div>
<div id="TRESC">
<?php
	if(isset($_SESSION['zamowiono']))
	{
		echo $_SESSION['zamowiono'];
		unset($_SESSION['zamowiono']);
	} else { echo "WITAJ NA NASZEJ STRONIE";};
?>
</div>
</body>
</html>