<?php
session_start();
?>
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
if(isset($_SESSION['blad'])){
echo $_SESSION['blad'];}
if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==true)
{header('Location: menu_klienta.php');
exit();}
?>	
<form action=zaloguj.php method="post">
<table>
  <tr>
    <td>Login</td>
    <td><input type=text name=login class=logowanie></td>
  </tr>
  <tr>
    <td>Hasło</td>
    <td><input type=password name=haslo class=logowanie></td>
  </tr>
  <tr>
    <td colspan="2"><input type=submit value=Zaloguj class=przycisk></td>
  </tr>
</table>