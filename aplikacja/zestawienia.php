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
<?php
include('menu.php');
?>


<center><h1><i>TOP 5 NAJCZĘŚCIEJ KUPOWANYCH PRODUKTÓW</h1></center><br><br></i>
<div id="bar"><div class="zestawienia-id">ID</div><div class="zestawienia-nazwa">NAZWA</div><div class="zestawienia-kategoria">KATEGORIA</div><div class="zestawienia-popularnosc">SPRZEDANYCH</div></div>


<?php
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$dane="SELECT id_produktu, nazwa, kategoria, popularnosc FROM baza_produktow ORDER BY popularnosc DESC LIMIT 5";
	$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			echo "<div class=wpis><div class=zestawienia-id-wpis>". $wiersz['id_produktu']."</div>";
			echo "<div class=zestawienia-nazwa-wpis>".$wiersz['nazwa']."</div>";
			echo "<div class=zestawienia-kategoria-wpis>".$wiersz['kategoria']."</div>";
			echo "<div class=zestawienia-popularnosc-wpis>".$wiersz['popularnosc']."</div>";
			echo "</div>";
		}
?>