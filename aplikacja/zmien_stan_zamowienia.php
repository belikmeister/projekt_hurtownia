<!DOCTYPE HTML>
<?php include('sprawdz_pracownika.php'); ?>
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
<?php include('menu.php'); ?>
</div>
<div id="TRESC">
<div id="bar"> 
	<div class="r7procent">Nr Zam.</div> <div class="r7procent">ID Klienta</div> <div class="r15procent">Data zamówienia</div> <div class="r15procent">Aktualny stan</div> <div class="r15procent">Nowy Stan</div> <div class="r15procent">Zmień</div> <div class="r15procent">Data zmiany</div>
</div>
<?php
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$dane="SELECT * from zamowienie";
	$polaczenie -> query ('SET NAMES utf8');
	$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
	$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			
			 echo "<form action='zmien_stan.php' method=post>";
			 echo 
			 "<div class=wpis>".
			 "<div class='r7procent'>".$wiersz['id_zamowienia']."</div>".
			 "<div class=r7procent>".$wiersz['id_klienta']."</div>".
			 "<div class=r15procent>".$wiersz['data_zamowienia']."</div>".
			 "<div class=r15procent>".$wiersz['status']."</div>".
			 "<div class=r15procent><select name='stan'>
			  <option value='zamowione'>Zamówione</option>".
			 "<option value='realizacja'>W Realizacji</option>".
			 "<option value='wyslane'>Wysłane</option></select></div>".
			 			 "<div class=r15procent><input type=submit value='Zmień stan'></div>".
			 "<div class=r15procent>".$wiersz['data_zmiany']."</div>"."</div>".
			 "<div><input type=hidden name='id' value=".$wiersz['id_zamowienia']."></div>";
			 echo "</form>";
			 
		}
?>


</div>
</body>
</html>