<?php
session_start();
unset($_SESSION['koszyk']);
header('location: wyswietl_produkty.php');
?>