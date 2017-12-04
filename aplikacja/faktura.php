<?php
require('fpdf/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('images/logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(40,10,'Faktura VAT',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Strona '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
	session_start();
	$id_klienta=$_SESSION['id_klienta'];
	require_once"connect.php";
	$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
	$dane="SELECT * from zamowienie where id_klienta=".$id_klienta."";
	$odpowiedz=$polaczenie->query($dane);
		while($wiersz=$odpowiedz->fetch_assoc())
    $pdf->Cell(0,10,$wiersz['miasto'],0,1);

$pdf->Output();
?>