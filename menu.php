<?php session_start();?> 
<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<title>
		Logowanie Klienta
		</title>
	</head>
	
	<body>
	<!--//////////////////////////
	//							//
	//							//
	//TUTAJ BĘDZIE LOGO I MENU	//
	//							//
	///////////////////////////-->
 <?php echo "<p> WITAJ ".$_SESSION['user']."!" ?>
</body>
</html>
