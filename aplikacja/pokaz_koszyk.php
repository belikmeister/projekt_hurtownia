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
	<div class="optionbar-nazwa">NAZWA</div> <div class="optionbar-cena">CENA(ZŁ/SZT)</div> <div class="optionbar-ilosc">ILOŚĆ</div> <div class="optionbar-ilosc">RAZEM</div> <div class="optionbar-koszyk">NWMCO</div>
</div>
<div style="clear:both;"></div>
<?php
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	
	$rozmiar= count($_SESSION['koszyk']);
	for($i=0;$i<$rozmiar;$i++)
	{
		for($s=0;$s<=1;$s++)
		{
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
		$dane="SELECT nazwa,cena from magazyn inner join baza_produktow on magazyn.id_produktu=baza_produktow.id_produktu where magazyn.id_produktu=".$id."";
		$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			$suma=$ilosc*$wiersz['cena'];
			echo 
			 "<div class=wpis>".
			 "<div class=nazwa>".$wiersz['nazwa']."</div>".
			 "<div class=cena>".$wiersz['cena']."</div>".
			 "<div class=ilosc>".$ilosc."</div>".
			 "<div class=ilosc>".$suma."</div>".
			 "<div class=koszyk><input type='submit' value='Dodaj do koszyka' /></div></div>";}
		
		echo "<br>";
	}
	echo "<form action=zamow.php method=post><input type=submit value='złóż zamówienie'></form>";
	unset($_SESSION['pusty_koszyk']);
?>


</div>
</body>
</html>