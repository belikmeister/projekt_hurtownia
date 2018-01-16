<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
require_once"connect.php";

	$pracownik=$_SESSION['pracownik'];
	if($pracownik==1)
	{
		echo"<a href=main.php><div id='NAGLOWEK'><img src='images/logo.png' class=srodek></div></a>
			<a href=wyloguj.php><div id='wyloguj'>Wyloguj</div></a>
			<div id='MENU'>
		  <ol>
			  <li><a href=''>MAGAZYN</a>
			  <ul>
						<li><a href='sprawdz_stan_magazynu.php'>Sprawdź stan</a></li>
						<li><a href='zmien_stan_zamowienia.php'>Realizuj zamówienie</a></li>
					</ul>
			  </li>
			  <li><a href=''>FAKTURY/ZESTAWIENIA</a>
			  <ul>
						<li><a href='wybierz_fakture.php'>Generuj fakturę</a></li>
						<li><a href='zestawienia.php'>Bestsellery</a></li>
					</ul>
			  </li>
			  <li><a href=''>INNE</a>
			  <ul>
						<li><a href='wyszukaj_produkt.php'>Wyszukaj produkt</a></li>
					</ul>
			  </li>
		</ol></div></br>";
	}
	else
	{
		echo"<a href=main.php><div id='NAGLOWEK'><img src='images/logo.png' class=srodek></div></a>
		<a href=wyloguj.php><div id='wyloguj'>Wyloguj</div></a>
		<div id='MENU'>
			  <ol>
				  <li><a href=''>ZAMÓWIENIA</a>
				  <ul>
							<li><a href='wyswietl_produkty.php'>Złóż zamówienie</a></li>
							<li><a href='wyswietl_zamowienia.php'>Podgląd zamówień</a></li>
							<li><a href='pokaz_koszyk.php'>Pokaż koszyk</a></li>
							<li><a href='sprawdz_stan_zamowienia.php'>Sprawdź stan realizacji</a></li>
						</ul>
				  </li>
				  <li><a href=''>ZESTAWIENIA</a>
				  <ul>
							<li><a href='faktura_klient.php'>Moje faktury</a></li>
							<li><a href='zestawienia.php'>Bestsellery</a></li>

						</ul>
				  </li>
				  <li><a href=''>INNE</a>
				  <ul>
							<li><a href='wyszukaj_produkt.php'>Wyszukaj produkt</a></li>
							<li><a href='edytuj_dane_osobowe.php'>Edytuj dane osobowe</a></li>
						</ul>
				  </li>
			</ol></div></br>";
	}
?>