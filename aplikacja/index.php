<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="pl">
	<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
		<title>
		Logowanie Klienta
		</title>
	</head>
	
	<body>
<div id="top">
	<div id="NAGLOWEK"><img src="images/logo.png" class=srodek></div>
	
<div id="TRESC">
<div id="LOGOWANIE">
<?php 
if(isset($_SESSION['blad'])){
echo $_SESSION['blad'];}
if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==true)
{header('Location: main.php');
exit();}
?>
<form action=zaloguj.php method="post">
<div > Login: <input type=text name=login class=logowanie></div><br>
<div class=srodek> Hasło: <input type=password name=haslo class=logowanie></div><br>
<div class=srodek><input type=submit value=Zaloguj class=przycisk></div></form></div>
<!-- DIV Z TESCIA -->
</div>
</body>
</html>