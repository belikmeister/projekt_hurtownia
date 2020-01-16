
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
<div id="bar"> 
	<div class="optionbar-nazwa">NAZWA</div> <div class="optionbar-cena">CENA(ZŁ/SZT)</div> <div class="optionbar-ilosc">ILOŚĆ</div> <div class="optionbar-ilosc">SZT</div> <div class="optionbar-koszyk">Dodaj do koszyka</div>
</div>
<?php
	$id_klienta=$_SESSION['id_klienta'];
	$wartosc=$_POST['wartosc'];
	$czego=$_POST['czego'];
	if(isset($czego) && isset($wartosc)){
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$polaczenie -> query ('SET NAMES utf8');
	$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
	if($czego=='kategoria')
	{$dane="SELECT magazyn.id_produktu,nazwa,cena,ilosc from baza_produktow inner join magazyn on baza_produktow.id_produktu=magazyn.id_produktu where baza_produktow.kategoria=".$wartosc.";";
	
	
	}
	if($czego=='nazwa')
	{$dane="SELECT magazyn.id_produktu,nazwa,cena,ilosc from baza_produktow inner join magazyn on baza_produktow.id_produktu=magazyn.id_produktu where baza_produktow.nazwa like '%".$wartosc."%';";
	
	
	}
	if($czego=='numer_katalogowy')
	{	$wartoscint= (int) $wartosc;
		$dane="SELECT magazyn.id_produktu,nazwa,cena,ilosc from baza_produktow inner join magazyn on baza_produktow.id_produktu=magazyn.id_produktu where baza_produktow.id_produktu=".$wartoscint.";";
	
	
	}
	
	

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
	}
	else{
		header('location:wyszukaj_produkt.php');
	
		};
?>
<!-- DIV Z TESCIA -->
</div>
</body>
</html>