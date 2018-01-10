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

<?php
echo"ZESTAWIENIA Kapitana Bomby<br>";
?>

<?php
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$dane="SELECT id_produktu, nazwa, kategoria, popularnosc FROM baza_produktow ORDER BY popularnosc DESC LIMIT 5";
	$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			echo $wiersz['id_produktu'];
			echo "<br>";
			echo $wiersz['nazwa'];
			echo "<br>";
			echo $wiersz['kategoria'];
			echo "<br>";
			echo $wiersz['popularnosc'];
			echo "<br>";
		}
?>