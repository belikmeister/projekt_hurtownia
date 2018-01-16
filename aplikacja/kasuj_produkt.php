<?php
session_start();
$kappa=$_POST['id_prod'];

unset($_SESSION['koszyk'][$kappa][0]);
unset($_SESSION['koszyk'][$kappa][1]);



?>