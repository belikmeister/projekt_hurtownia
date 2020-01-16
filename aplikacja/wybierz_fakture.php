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
?></div>

<div id="TRESC">

<div id="bar"> 
	<div class="r7procent"><b>Zam.</b></div> <div class="r7procent"><b>ID Kl.</b></div> <div class="r15procent"><b>Data zamówienia</b></div> <div class="r17procent"><b>Status</b></div> <div class="r17procent"><b>Kwota</b></div><div class="r15procent"><b>***</b></div>
</div>
<?php
	$id_klienta=$_SESSION['id_klienta'];
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$dane="SELECT * from zamowienie";
	$polaczenie -> query ('SET NAMES utf8');
	$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
	$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			echo "<form action='faktura.php' method=post>";
			 echo 
			 "<div class=wpis>".
			 "<div class='r7procent'>".$wiersz['id_zamowienia']."</div>".
			 "<div class=r7procent>".$wiersz['id_klienta']."</div>".
			 "<div class=r15procent>".$wiersz['data_zamowienia']."</div>".
			 "<div class=r17procent>".$wiersz['status']."</div>".
			 "<div class=r17procent>".$wiersz['kwota']."</div>".
			 "<div class=r15procent><input type=submit value='Wyświetl Fakturę'></div>".
			 "<div><input type=hidden name='id' value=".$wiersz['id_zamowienia']."></div></div>";
			 echo "</form>";
		}
?>
<!-- DIV Z TESCIA -->
</div>
</body>
</html>