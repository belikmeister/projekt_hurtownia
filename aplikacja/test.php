<?php
$produkt='fioletowe dildo';
$ilosc=65;
function dodaj_do_koszyka($produkt,$ilosc)
{
	$z1='id1';
	$z2='ile1';
	$z3='id2';
	$z4='ile2';

	
	$rozmiar= count($koszyk); //Wyświetla rozmiar tablicy
	for($i=0;$i<=$rozmiar;$i++)
	{
		for($s=0;$s<=1;$s++)
		{
			$koszyk[$i][$s]=$z.['df'];
			
		}
	}
};
dodaj_do_koszyka($produkt,$ilosc);

?>