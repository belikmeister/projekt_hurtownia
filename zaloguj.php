<?php
session_start();

require_once"connect.php";

$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);

if($polaczenie->connect_errno!=0)
{
	echo "Error:".$polaczenie->connect_errno;
}
else{
	$login=$_POST['login'];
	$haslo=MD5($_POST['haslo']);
	$sql="SELECT * FROM logowanie_klienta WHERE login_klienta='$login' AND haslo_klienta='$haslo'";
	
	if($odpowiedz =$polaczenie->query($sql))
	{
		$poprawne_logowanie=$odpowiedz->num_rows;
		if($poprawne_logowanie>0)
		{
			$wiersz=$odpowiedz->fetch_assoc();
			$_SESSION['user']=$wiersz['login_klienta'];
			$_SESSION['id_klienta']=$wiersz['id_klienta'];
			$odpowiedz->free_result();
			header('Location: menu_klienta.php');
			unset($_SESSION['blad']);
			
		}	else
		{
			$_SESSION['blad']='<span style="color:red"> Nieprawidłowy login lub hasło!</span>';
			header('Location: index.php');
		}
		
	}
	
	$polaczenie->close();
	}

?>