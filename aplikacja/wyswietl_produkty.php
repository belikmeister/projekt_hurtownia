<!DOCTYPE HTML>
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
	<div id="NAGLOWEK"><img src="images/logo.png" class=srodek></div>
	<a href=wyloguj.php>Wyloguj</a>
	<div id="MENU">
		  <ul>
			  <li><a href="">Realizuj zamówienie</a></li>
			  <li><a href="">Zmień stan zamówienia</a></li>
			  <li><a href="">Zamów towar do magazynu</a></li>
			  <li><a href="">Sprawdź Stan Magazynu</a></li>
			  <li><a href="">Generuj fakturę</a></li>
		</ul></div>
			<div id="MENU">
		  <ul>
			  <li><a href="">Wyślij fakturę na email</a></li>
			  <li><a href="">Generuj zestawienie</a></li>
			  <li><a href="">Złóż zamówienie</a></li>
			  <li><a href="">Podgląd zamówień</a></li>
			  <li><a href="">Edytuj zamówienie</a></li>
		</ul></div>
			<div id="MENU">
		  <ul>
			  <li><a href="">Pobierz fakturę</a></li>
			  <li><a href="wyswietl_produkty.php">Podgląd dostępnych produktów</a></li>
			  <li><a href="">Wyszukaj produkt</a></li>
			  <li><a href="">Sprawdź stan realizacji zamówienia</a></li>
			  <li><a href="">Edytuj dane osobowe</a></li>
		</ul></div></div>
<div id="TRESC">


<?php
require_once"connect.php";
$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
$dane="SELECT * from magazyn inner join baza_produktow on magazyn.id_produktu=baza_produktow.id_produktu ";
$odpowiedz=$polaczenie->query($dane);
while($wiersz=$odpowiedz->fetch_assoc()){
echo 
"<div class=ramka><div>".$wiersz['nazwa'].
" </div><div>".$wiersz['cena'].
"</div><div> ".$wiersz['ilosc'].
"</div></div>";}
?>


</div>
</body>
</html>