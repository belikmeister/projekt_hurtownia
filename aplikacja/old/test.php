<?php
session_start();
$produkt='fioletowe dildo';
$ilosc=65;
function dodaj_do_koszyka($produkt,$ilosc)
{	
	$koszyk[][0]=$produkt;
	$rozmiar= count($koszyk);
	$koszyk[$rozmiar-1][1]=$ilosc;
	$_SESSION['koszyk']=$koszyk;
	$rozmiar= count($koszyk);
	for($i=0;$i<$rozmiar;$i++)
	{
		for($s=0;$s<=1;$s++)
		{
			echo $koszyk[$i][$s]."<br>";
		}
	}
};
dodaj_do_koszyka($produkt,$ilosc);

?>