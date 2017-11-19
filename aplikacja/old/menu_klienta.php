<?php session_start();?> 
<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<title>
		Logowanie Klienta
		</title>
	</head>
	
	<body>
	<!--//////////////////////////
	//							//
	//							//
	//TUTAJ BĘDZIE LOGO I MENU	//
	//							//
	///////////////////////////-->
<?php
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
echo "<p> SIEMA ".$_SESSION['imie']." ".$_SESSION['nazwisko'];
?>
</body>
</html>
