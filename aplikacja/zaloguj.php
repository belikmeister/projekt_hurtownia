<?php
session_start();

if(!isset($_POST['login']) || !isset($_POST['haslo']))
{
	header('location: index.php');
	exit();
}



require_once"connect.php";

$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);

if($polaczenie->connect_errno!=0)
{
	echo "Error:".$polaczenie->connect_errno;
}
else{
	$login=$_POST['login'];
	$haslo=MD5($_POST['haslo']);
	$login=htmlentities($login,ENT_QUOTES,"UTF-8");
	
	
	if($odpowiedz =$polaczenie->query(
	sprintf("SELECT * FROM logowanie WHERE login_klienta='%s' AND haslo_klienta='%s'",
	mysqli_real_escape_string($polaczenie,$login),
	mysqli_real_escape_string($polaczenie,$haslo))))
	{
		$poprawne_logowanie=$odpowiedz->num_rows;
		if($poprawne_logowanie>0)
		{
			$_SESSION['zalogowany']=true;
			$wiersz=$odpowiedz->fetch_assoc();
			$_SESSION['user']=$wiersz['login_klienta'];
			$_SESSION['id_klienta']=$wiersz['id_klienta'];
			$_SESSION['pracownik']=$wiersz['pracownik'];
			$odpowiedz->free_result();
			header('Location: main.php');
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