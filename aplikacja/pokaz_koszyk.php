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
session_start();
include('menu.php');
if(!isset($_SESSION['koszyk']))
{
	$_SESSION['pusty_koszyk']="Niestety twój koszyk jest pusty. Może niżej znajdziesz coś dla siebie.";
	header('location: wyswietl_produkty.php');
	exit();
}
?></div>
<div id="TRESC">

<div id="bar"> 
	<div class="optionbar-nazwa">NAZWA</div> <div class="optionbar-cena">CENA(ZŁ/SZT)</div> <div class="optionbar-ilosc">ILOŚĆ</div> <div class="optionbar-ilosc">RAZEM</div> <div class="optionbar-koszyk">Usuń</div>
</div>
<div style="clear:both;"></div>
<?php
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$polaczenie -> query ('SET NAMES utf8');
	$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
	$kwota=0;
	$rozmiar= count($_SESSION['koszyk']);
	for($i=0;$i<$rozmiar;$i++)
	{
		for($s=0;$s<=1;$s++)
		{
			if(!isset($_SESSION['koszyk'][$i][$s]))
			{goto a;}
			
			if($s==0)
			{
				$id=$_SESSION['koszyk'][$i][$s];
			}
			if($s==1)
			{
				$ilosc=$_SESSION['koszyk'][$i][$s];
			}
			
			//echo $_SESSION['koszyk'][$i][$s]." ";
			
		}
		//echo $id." ".$ilosc;
		
		$dane="SELECT nazwa,cena,ilosc,baza_produktow.id_produktu from magazyn inner join baza_produktow on magazyn.id_produktu=baza_produktow.id_produktu where magazyn.id_produktu=".$id."";
		$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			$suma=$ilosc*$wiersz['cena'];
			$kwota=$kwota+$suma;
			echo 
			 "<div class=wpis>".
			 "<div class=nazwa>".$wiersz['nazwa']."</div>".
			 "<div class=cena>".$wiersz['cena']."</div>".
			 "<div class=ilosc> ".$ilosc."</div>".
			 "<div class=ilosc>".$suma."</div>".
			 "<form action=kasuj_produkt.php method=post><input name=id_prod type=hidden value=".$i."></input><div class=koszyk><input type='submit' value='Usuń' /></form></div></div>";}
		
		echo "<br>";
		a:
	}
	echo "Łączna wartość produktów w koszyku: ".$kwota."zł";
	$_SESSION['kwota']=$kwota;
	echo "<form action=zamow.php method=post><input type=submit value='złóż zamówienie'></form>";
	echo "<br>";
	echo "<form action=kasuj_koszyk.php method=post><input type=submit value='Kasuj Koszyk'></form>";
	
	unset($_SESSION['pusty_koszyk']);
?>


</div>
</body>
</html>