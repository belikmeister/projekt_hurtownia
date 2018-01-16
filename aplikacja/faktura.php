<?php
	session_start();
?>
<html>
	<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styl.css">
		<title>
		Hurtownia WWW
		</title>
	</head>
	
	<body>
<div id="top">
</div>
<div id="TRESC">
<?php
	$nr=$_POST['id'];
	$id_klienta=$_SESSION['id_klienta'];
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$dane="SELECT imie,nazwisko,ulica,miasto,kod_pocztowy,telefon,nip from klienci where id_klienta=".$_SESSION['id_klienta'].";";
	$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			echo "<div class=wiersz>";
			echo "<div class=danek> <b>Dane kupującego:</b><br>".
			"<div>".$wiersz['imie']." ".$wiersz['nazwisko']."</div>".
			"<div>Ul: ".$wiersz['ulica']."</div>".
			"<div>Poczta : ".$wiersz['kod_pocztowy']." ".$wiersz['miasto']."</div>".
			"<div>Tel: ".$wiersz['telefon']."</div>".
			"<div>NIP: ".$wiersz['nip']."</div></div>";
			
		}
			echo "<div class=danes> <b>Dane Sprzedającego:</b><br>".
			"<div>Hurtownia WWW Sp. Cywilna</div>".
			"<div>Ul: Abstynencji 16</div>".
			"<div>Poczta: 33300 Nowy Sącz</div>".
			"<div>Tel: 517312374</div>".
			"<div>NIP: 7341278556</div></div></div>";
			//echo"<div class=naglowek> FAKTURA VAT </div>"
			echo "<div id='bar'> 
	<div class='r15procent'>LP</div> <div class='r25procent'>NAZWA</div> <div class='cena'>CENA</div> <div class='cena'>ILOŚĆ</div> <div class='r15procent'>RAZEM</div>
</div>";
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$dane="SELECT dane_zamowienia.id_produktu,nazwa,ilosc_zamowionych,cena from zamowienie inner join dane_zamowienia on zamowienie.id_zamowienia=dane_zamowienia.id_zamowienia inner join baza_produktow on dane_zamowienia.id_produktu=baza_produktow.id_produktu inner join magazyn on baza_produktow.id_produktu=magazyn.id_produktu where zamowienie.id_zamowienia=dane_zamowienia.id_zamowienia AND zamowienie.id_zamowienia=".$nr.";";
	$odpowiedz=$polaczenie->query($dane);
	$kwota=0;
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			
			$razem=$wiersz['cena']*$wiersz['ilosc_zamowionych'];
			$suma=$wiersz['ilosc_zamowionych']*$wiersz['cena'];
			$kwota=$kwota+$suma;
			echo 
			 "<div class=wpis>".
			 "<div class=r15procent>".$wiersz['id_produktu']."</div>".
			 "<div class=r25procent>".$wiersz['nazwa']."</div>".
			 "<div class=cena>".$wiersz['cena']."zł</div>".
			 "<div class=cena>".$wiersz['ilosc_zamowionych']."</div>".
			 "<div class=r15procent>".$razem."zł</div></div>";
			
		}
		$netto=round($kwota/1.23,2);
		echo "<div class=wartosci>";
		echo "Wartość netto: ".$netto."zł<br> Warość brutto: ".$kwota."zł";
		echo "</div>";
?>
</div>
</body>
</html>
