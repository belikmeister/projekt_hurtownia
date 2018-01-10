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
echo"SKURWESYŃSKO WYJEBANE ZESTAWIENIA SZMATO!";
?>

<?php
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$dane="SELECT id_produktu, nazwa, kategoria, popularnosc FROM baza_produktow ORDER BY popularnosc DESC";
	$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			echo 
			 $wiersz['id_produktu'];
			 $wiersz['nazwa'];
			 $wiersz['kategoria'];
		}
?>