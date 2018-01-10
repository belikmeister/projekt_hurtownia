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
<?php
require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$dane="SELECT * from klienci where id_klienta==".$_SESSION['id_klienta'].";";
		$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
		{
			echo $wiersz['imie'];
			echo $wiersz['nazwisko'];
			echo $wiersz['ulica'];
			echo $wiersz['miasto'];
			echo $wiersz['kod_pocztowy'];
			echo $wiersz['telefon'];
			echo $wiersz['nip'];
			
			
		}

Twoje dane:

 ?>
</div>
</body>
</html>