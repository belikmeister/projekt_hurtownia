<!DOCTYPE HTML>
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
<h1>Twoje dane</h1>
<?php
session_start();
require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$polaczenie -> query ('SET NAMES utf8');
	$polaczenie -> query ('SET CHARACTER_SET utf8_unicode_ci');
	$dane="SELECT * from klienci where id_klienta=".$_SESSION['id_klienta'].";";
		$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			echo $wiersz['imie'];
			echo " ";
			echo $wiersz['nazwisko'];
			echo "<br> ul.";
			echo $wiersz['ulica'];
			echo "<br>";
			echo $wiersz['miasto'];
			echo "<br> Kod pocztowy: ";
			echo $wiersz['kod_pocztowy'];
			echo "<br> Tel: ";
			echo $wiersz['telefon'];
			echo "<br>";
			echo $wiersz['nip'];
			
			
		}
 ?>
 
 <form action=zmien_dane.php method=post>

<h1>Edytuj Dane</h1>

Podaj nowe dane (musisz uzupełnić wszystkie pola!)<br>
<table align="center">
<tr>
<td>Imię</td><td><input type=text id=imie></input></td>
</tr>
<td>Nazwisko</td><td> <input type=text id=nazwisko></input></td>
</tr>

<td>Ulica</td><td>  <input type=text id=ulica></input></td>
</tr>

<td>Miasto</td><td>   <input type=text id=miasto></input></td>
</tr>

<td>Kod</td><td> <input type=text id=kod></input></td>
</tr>

<td>Telefon </td><td><input type=text id=tel></input></td>
</tr>

<td>NIP</td><td><input type=text id=nip></input><br></td>
</tr>
<td></td><td> <input type=submit value="Zapisz"></td>
</tr>

</table>



</body>
</html>