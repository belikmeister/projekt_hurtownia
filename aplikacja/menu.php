<?php
session_start();
if(!isset($_SESSION['zalogowany']))
{
	header('location: index.php');
	exit();
}
require_once"connect.php";
$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
$id=$_SESSION['id_klienta'];
$dane="SELECT imie,nazwisko from klienci where id_klienta='$id';";
$odpowiedz=$polaczenie->query($dane);
$wiersz=$odpowiedz->fetch_assoc();
$_SESSION['imie']=$wiersz['imie'];
$_SESSION['nazwisko']=$wiersz['nazwisko'];
echo "<a href=wyloguj.php>Wyloguj</a>";
echo "<div align=left> SIEMA ".$_SESSION['imie']." ".$_SESSION['nazwisko']."</div>";
?>




<!DOCTYPE HTML> 

<HTML lang="pl">

<HEAD>
	<title>Aplikacja hurtowni sprzętu komputerowego</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style.css" type="text/css" />
</HEAD>



<BODY>

<div id="container">

<div id="logo">
	<h1>Aplikacja hurtowni sprzętu komputerowego</h1>
</div>


	
<h3> Pracownik </h3> <br>

	<a href="realizuj_zamowienie.html">Realizuj zamówienie</a><br>
	<a href="zmien_stan_zamowienia.html">Zmień stan zamówienia</a><br>
	<a href="zamow_towar_magazyn.html">Zamów towar do magazynu</a><br>
	<a href="sprawdz_stan_magazynu.html">Sprawdź Stan Magazynu</a><br>
	<a href="generuj_fakture">Generuj fakturę</a><br>
	<a href="wyslij_fakture_mail">Wyślij fakturę na email</a><br>
	<a href="generuj_zestawienie">Generuj zestawienie</a><br>

<h3> Klient </h3> <br>

	<a href="zloz_zamowienie.html">Złóż zamówienie</a><br>
	<a href="podglad_zamowien.html">Podgląd zamówień</a><br>
	<a href="edytuj_zamowienie.html">Edytuj zamówienie</a><br>
	<a href="pobierz_fakture">Pobierz fakturę</a><br>
	<a href="wyswietl_produkty.php">Podgląd dostępnych produktów</a><br>
	<a href="wyszukaj_produkt.html">Wyszukaj produkt</a><br>
	<a href="sprawdz_stan_realizacji.html">Sprawdź stan realizacji zamówienia</a><br>
	<a href="Edytuj_dane_osobowe">Edytuj dane osobowe</a><br>
	
	
	
</div>	
	
</BODY>
</HTML> 
