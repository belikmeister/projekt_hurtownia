<!DOCTYPE HTML>
<html>
	<head>
<?php session_start() ?>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
		<title>
		Hurtownia WWW
		</title>
	</head>
	
	<body>
<div id="top">
<?php include('menu.php'); ?>
</div>
<div id="TRESC">
<div id="bar"> 
	<div class="nazwa">Numer Zamówienia</div> <div class="cena">ID Klienta</div> <div class="ilosc">Data zamówienia</div> <div class="ilosc">Aktualny stan</div>
</div>
<?php
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$dane="SELECT id_zamowienia,id_klienta,data_zamowienia,status from zamowienie";
	$polaczenie -> query ('SET NAMES utf8');
	$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
	$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			 echo 
			 "<div class=wpis>".
			 "<div class=nazwa>".$wiersz['id_zamowienia']."</div>".
			 "<div class=cena>".$wiersz['id_klienta']."</div>".
			 "<div class=ilosc>".$wiersz['data_zamowienia']."</div>".
			 "<div class=ilosc>".$wiersz['status']."</div></div>";
		}
?>


</div>
</body>
</html>