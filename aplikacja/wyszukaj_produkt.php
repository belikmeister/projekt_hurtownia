
<html>
	<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
		<title>
		Hurtownia WWW
		</title>
	</head>
	
	<body>
<div id="top">
	<?php
include('menu.php');
?></div>
<div id="TRESC">
<h1>Wyszukiwanie produktów:</h1>
<form action="szukaj.php" method=post>
Wpisz wyszukiwaną frazę:<br>
<input type=text name="wartosc"></input><br><br>
Szukaj Wg:<br>
<input type=radio name="czego" value="kategoria">Kategoria<br>
<input type=radio name="czego" value="nazwa">Nazwa<br>
<input type=radio name="czego" value="numer_katalogowy">Numer katalogowy<br><br>
<input type=submit value="Szukaj">
</form>
<!-- DIV Z TESCIA -->
</div>
</body>
</html>