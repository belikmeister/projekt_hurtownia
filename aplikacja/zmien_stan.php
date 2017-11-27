<?php
	session_start();
	require_once"connect.php";
	$stan=$_POST['stan'];
	$id=$_POST['id'];
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$dane="UPDATE zamowienie set status='".$stan."' where id_zamowienia=".$id.";";
	$odpowiedz=$polaczenie->query($dane);
	header("location:sprawdz_stan_zamowienia.php");
	exit();
?>