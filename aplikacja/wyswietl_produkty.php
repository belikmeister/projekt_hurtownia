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
</div>
<div id="TRESC">
<?php
if(isset($_SESSION['pusty_koszyk']))
{
	echo $_SESSION['pusty_koszyk'];
}; ?>
<div id="bar"> 
	<div class="optionbar-nazwa">NAZWA</div> <div class="optionbar-cena">CENA(ZŁ/SZT)</div> <div class="optionbar-ilosc">ILOŚĆ</div> <div class="optionbar-ilosc">SZT</div> <div class="optionbar-koszyk">Dodaj do koszyka</div>
</div>
<div style="clear:both;"></div>
<?php
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$dane="SELECT * from magazyn_widok inner join baza_produktow on magazyn_widok.id_produktu=baza_produktow.id_produktu;";
	$polaczenie -> query ('SET NAMES utf8');
	$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
	$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			echo "<form action='koszyk.php' method=post>";
			echo 
			 "<div class=wpis>".
			 "<div class=nazwa>".$wiersz['id_produktu']." - ".$wiersz['nazwa']."</div>".
			 "<div class=cena>".$wiersz['cena']."</div>".
			 "<div class=ilosc>".$wiersz['ilosc']."</div>".
			 "<div class=ilosc><input type=number name='ilosc' min=1 max=".$wiersz['ilosc']."></div>".
			 "<div><input type=hidden name='id' value=".$wiersz['id_produktu']."></div>".
			 "<div class=koszyk><input type='submit' value='Dodaj do koszyka'/></div></div>";
			echo "</form>";
		}
?>


</div>
</body>
</html>