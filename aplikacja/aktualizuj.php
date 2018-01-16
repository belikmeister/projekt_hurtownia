<?php
session_start();
require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$polaczenie -> query ('SET NAMES utf8');
	$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
	$dane="UPDATE klienci SET imie='".$_POST['imie']."', nazwisko='".$_POST['nazwisko']."', ulica='".$_POST['ulica']."', miasto='".$_POST['miasto']."', kod_pocztowy='".$_POST['kod_pocztowy']."', telefon='".$_POST['telefon']."', nip='".$_POST['nip']."' WHERE id_klienta=".$_SESSION['id_klienta'].";";
	$polaczenie -> query ($dane);
	header('location: edytuj_dane_osobowe.php');
	
?>	