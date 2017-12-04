<?php
session_start();

if($_SESSION['pracownik']==0)
{
	$stan="<h1>NIE MASZ DOSTĘPU DO TEJ STRONY - ACCESS DENIED</h1>";
	header('location:zakaz.php');
	
}
if(isset($stan))
{
	echo $stan;
}
?>