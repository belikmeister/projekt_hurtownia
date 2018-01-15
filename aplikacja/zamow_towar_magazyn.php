<?php
session_start();
require_once"connect.php";
$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);