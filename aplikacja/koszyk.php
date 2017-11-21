<?php
session_start();
$produkt=$_POST['id'];
$ilosc=$_POST['ilosc'];
function dodaj_do_koszyka($produkt,$ilosc)
{	
	if(!isset($_POST['ilosc'])||$_POST['ilosc']==0||!isset($_POST['id']))
	{
		header('location: wyswietl_produkty.php');
		exit();
	}
	if(!isset($_SESSION['koszyk']))
	{
		$_SESSION['koszyk'][][0]=$produkt;
		$rozmiar= count($_SESSION['koszyk']);
		$_SESSION['koszyk'][$rozmiar-1][1]=$ilosc;
		$_SESSION['koszyk']=$_SESSION['koszyk'];
		$rozmiar= count($_SESSION['koszyk']);
		unset($_SESSION['pusty_koszyk']);
		header("location:wyswietl_produkty.php");
		exit();
	}
	else
	{	
		$rozmiar= count($_SESSION['koszyk']);
		for($i=0;$i<$rozmiar;$i++)
		{
			$id=$_SESSION['koszyk'][$i][0];
			
			if($id==$produkt)
			{
				$_SESSION['koszyk'][$i][1]=$_SESSION['koszyk'][$i][1]+$ilosc;
				header("location:wyswietl_produkty.php");
				exit();
			}
		};	
		$_SESSION['koszyk'][][0]=$produkt;
		$rozmiar= count($_SESSION['koszyk']);
		$_SESSION['koszyk'][$rozmiar-1][1]=$ilosc;
		$_SESSION['koszyk']=$_SESSION['koszyk'];
		$rozmiar= count($_SESSION['koszyk']);
		unset($_SESSION['pusty_koszyk']);
		header("location:wyswietl_produkty.php");
		exit();
	};
};
dodaj_do_koszyka($produkt,$ilosc);

?>
