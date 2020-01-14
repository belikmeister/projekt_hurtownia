<?php
session_start();
require_once"connect.php";
$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
$polaczenie -> query ('SET NAMES utf8');
	$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
	$polaczenie->begin_transaction();
	$dane="INSERT INTO zamowienie(id_klienta,status,kwota) values('".$_SESSION['id_klienta']."','zamowione','".$_SESSION['kwota']."');";
	$polaczenie->query($dane);
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
		}
		$dane="SELECT id_zamowienia from zamowienie ORDER BY data_zamowienia desc limit 1;";
		$odpowiedz=$polaczenie->query($dane);
		$wiersz=$odpowiedz->fetch_assoc();
		
		
		$dane="INSERT INTO dane_zamowienia(id_produktu,id_zamowienia,ilosc_zamowionych) VALUES(".$id.", ".$wiersz['id_zamowienia'].", ".$ilosc.");";
		$polaczenie->query($dane);
		
		$dane="UPDATE baza_produktow SET popularnosc=popularnosc+".$ilosc." WHERE id_produktu=".$id.";";
		$polaczenie->query($dane);
		
		$dane="UPDATE magazyn SET ilosc=ilosc-".$ilosc." WHERE id_produktu=".$id.";";
		$polaczenie->query($dane);
		
		$dane="SELECT ilosc from magazyn WHERE id_produktu=".$id.";";
		$odpowiedz=$polaczenie->query($dane);
		$wiersz=$odpowiedz->fetch_assoc();
		if ($wiersz['ilosc']<0){
		$polaczenie->rollback();
		$_SESSION['zamowiono']="Wystąpił błąd, nie mamy na stanie tylu sztuk.";
		break;
		unset($_SESSION['koszyk']);
		header('location:main.php');
		}
		else {
			$_SESSION['zamowiono']="Dziękujemy za złożenie zamówienia w naszym sklepie";
		}
		
		
		
	}
	
	$polaczenie->commit();
unset($_SESSION['koszyk']);
header('location:main.php');
?>
