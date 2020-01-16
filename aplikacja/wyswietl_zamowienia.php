<?php session_start(); ?>
<html>
	<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
		<title>
		Hurtownia WWW
		</title>
	</head>
	
	<body>
<div id="top">
	<?php
include('menu.php');
?>
</div>
<div id="TRESC">
<?php
	$id_klienta=$_SESSION['id_klienta'];
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
		//$dane="SELECT * from zamowienie where id_klienta=".$id_klienta."";
	$dane="CALL `PokazZamowieniaKlienta`('".$id_klienta."');";
	$polaczenie -> query ('SET NAMES utf8');
	$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
	$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			echo "<form action='szczegoly.php' method=post>";
			 echo 
			 "<div class=wpis>".
			 "<div class='r15procent'>".$wiersz['id_zamowienia']."</div>".
			 "<div class=r15procent>".$wiersz['id_klienta']."</div>".
			 "<div class=r15procent>".$wiersz['data_zamowienia']."</div>".
			 "<div class=r17procent>".$wiersz['status']."</div>".
			 "<div class=r17procent>".$wiersz['kwota']."</div>".
			 "<div class=r15procent><input type=submit value='Szczegóły'></div>".
			 "<div><input type=hidden name='id' value=".$wiersz['id_zamowienia']."></div></div>";
			 echo "</form>";
		}
?>
<!-- DIV Z TESCIA -->
</div>
</body>
</html>