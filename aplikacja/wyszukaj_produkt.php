<?php session_start(); ?>
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
<h1>Wyszukiwanie produktów</h1>
<form action="szukaj.php" method=post>
Wpisz wyszukiwaną frazę:<br>
<input type=text name="wartosc"></input><br><br>
<h3>Szukaj według:<h3>

<table align="center">
<tr>
<td><input type=radio name="czego" value="kategoria">Kategoria</td>
</tr>

<td><input type=radio name="czego" value="nazwa">Nazwa</td>
</tr>

<td><input type=radio name="czego" value="numer_katalogowy">Numer katalogowy</td>
</tr>


</form>
</table>
<br>
<input type=submit value="Szukaj"><br>
<!-- DIV Z TESCIA -->
</div>
</body>
</html>