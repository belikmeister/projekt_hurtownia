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
	<?php
include('menu.php');
?></div>
<div id="TRESC">
<?php
session_start();
require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$polaczenie -> query ('SET NAMES utf8');
	$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
	$dane="SELECT * from klienci where id_klienta=".$_SESSION['id_klienta'].";";
		$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			echo $wiersz['imie'];
			echo " ";
			echo $wiersz['nazwisko'];
			echo "<br> ul.";
			echo $wiersz['ulica'];
			echo "<br>";
			echo $wiersz['miasto'];
			echo "<br> Kod pocztowy: ";
			echo $wiersz['kod_pocztowy'];
			echo "<br> Tel: ";
			echo $wiersz['telefon'];
			echo "<br>";
			echo $wiersz['nip'];
			
			
		}
 ?>
 
 <form action=zmien_dane.php method=post>
<div>Podaj nowe dane (musisz uzupełnić wszystkie pola)<br>
<div>Imię<input type=text id=imie></input><br><div>
<div>Nazwisko <input type=text id=nazwisko></input><br>
<div>Ulica  <input type=text id=ulica></input><br>
<div>Miasto   <input type=text id=miasto></input><br>
<div>Kod <input type=text id=kod></input><br>
<div>Telefon <input type=text id=tel></input><br>
<div>NIP<input type=text id=nip></input><br>
</div>
</body>
</html>