<?php
session_start();
$produkt=$_POST['id'];
$ilosc=$_POST['ilosc'];
function dodaj_do_koszyka($produkt,$ilosc)
{	
	if(!isset($_POST['ilosc'])||!isset($_POST['id']))
	{
		header('location: wyswietl_produkty.php');
		exit();
	}
	$_SESSION['koszyk'][][0]=$produkt;
	$rozmiar= count($_SESSION['koszyk']);
	$_SESSION['koszyk'][$rozmiar-1][1]=$ilosc;
	$_SESSION['koszyk']=$_SESSION['koszyk'];
	$rozmiar= count($_SESSION['koszyk']);
	unset($_SESSION['pusty_koszyk']);
	header("location:wyswietl_produkty.php");
};
dodaj_do_koszyka($produkt,$ilosc);

?>