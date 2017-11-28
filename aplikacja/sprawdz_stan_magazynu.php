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

<div id="bar"> 
	<div class="optionbar-nazwa">NAZWA PRODUKTU</div>  <div class="optionbar-ilosc">ILOŚĆ</div> 	<div class="optionbar-nazwa">NAZWA PRODUKTU</div>  <div class="optionbar-ilosc">ILOŚĆ</div> 


	
</div>
<div style="clear:both;"></div>
<?php
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$dane="SELECT * from magazyn inner join baza_produktow on magazyn.id_produktu=baza_produktow.id_produktu ";
	$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			echo 
			 "<div class=nazwa>".$wiersz['id_produktu']." - ".$wiersz['nazwa']."</div>".
			 "<div class=ilosc>".$wiersz['ilosc']."</div>";
			echo "</form>";

		}
?>


</div>
</body>
</html>