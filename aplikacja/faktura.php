 
class faktura extends FPDF {
 
function sizeOfText( $texte, $largeur )
{
    $index    = 0;
    $nb_lines = 0;
    $loop     = TRUE;
    while ( $loop )
    {
        $pos = strpos($texte, "\n");
        if (!$pos)
        {
            $loop  = FALSE;
            $ligne = $texte;
        }
        else
        {
            $ligne  = substr( $texte, $index, $pos);
            $texte = substr( $texte, $pos+1 );
        }
        $length = floor( $this->GetStringWidth( $ligne ) );
        $res = 1 + floor( $length / $largeur) ;
        $nb_lines += $res;
    }
    return $nb_lines;
}   
 
    function addSociete( $nom, $adresse )
{
    $x1 = 15;
    $y1 = 20;
    $this->SetXY( $x1, $y1 );
    $this->SetFont('arial_ce','B',10);
    $length = $this->GetStringWidth( $nom );
    $this->Cell( $length, 2, $nom);
    $this->SetXY( $x1, $y1 + 4 );
    $this->SetFont('arial_ce','',8);
    $length = $this->GetStringWidth( $adresse );
    $lignes = $this->sizeOfText( $adresse, $length) ;
    $this->MultiCell($length, 4, $adresse);
}
 
    private $PG_W = 190;
 
    public function __construct($passInYourDataHere = NULL) {
        parent::__construct();
        $this->Ln();
        $this->Ln();
        $this->LineItems();     
    }
 
    
 
    public function LineItems() {
        $this->AddFont('arial_ce','','arial_ce.php');
        $this->AddFont('arial_ce','I','arial_ce_i.php');
        $this->AddFont('arial_ce','B','arial_ce_b.php');
        $this->AddFont('arial_ce','BI','arial_ce_bi.php');
 
        $header = array("Nazwa towaru lub usługi", "Ilość", "Cena jednostkowa netto", "Wartość netto", "VAT", "Wartość brutto");
 
        // Data
 
        $textWrap = str_repeat("this is a word wrap test ", 3);
        $textNoWrap = "there will be no wrapping here thank you";
 
        $data = array();
 
        $data[] = array($textWrap, 1, 50, 50, 0, 50);
        $data[] = array($textNoWrap, 1, 10500, 10500, 0, 10500);
        $data[] = array($textWrap, 1, 50, 50, 0, 50);
        $data[] = array($textNoWrap, 1, 10500, 10500, 0, 10500);
 
        /* Layout */
 
        $this->SetFont('arial_ce', 'B', 8);
        $this->AddPage();
 
        // Headers and widths
 
        $w = array(65, 15, 35, 25, 15, 25);
 
        for($i = 0; $i < count($header); $i++) {
        //$this->MultiCell($w[$i], 10, $header[$i], 1, 'C');
        $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        }
 
        $this->Ln();
 
        // Mark start coords
        $this->SetFont('arial_ce', '', 8);
        $x = $this->GetX();
        $y = $this->GetY();
        $i = 0;
 

 
        $this->Ln();
 
        $this->setTextFont();
        $this->Cell($w[0] + $w[1], 6, 'SUMA', 'TB', 0, 'L');
        $this->SetFont('arial_ce', '', 8);
        $this->Cell($w[2], 6, number_format(2, 2), 'TB', 0, 'R');
        $this->Cell($w[3], 6, number_format(2, 2), 'TB', 0, 'R');
        $this->Cell($w[4], 6, number_format(2, 2), 'TB', 0, 'R');
        $this->Cell($w[5], 6, number_format(2, 2), 'TB', 0, 'R');
        $this->Ln();
 
        $this->setTextFont();
        $this->Ln();
        $this->Ln();
        $this->SetFont('arial_ce', 'B', 10);
        $this->Cell($this->PG_W / 4, 5,"Do zapłaty: ", 'B', 0, 'L');
        $this->Ln(10);  
 
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->Ln();
        $this->SetFont('arial_ce', '', 8);
        $this->Cell($this->PG_W / 3, 5,"Osoba upoważniona do wystawienia faktury", 'T', 0, 'L');
        $this->Cell($this->PG_W / 3, 5,"", 0, 0, 'L');
        $this->Cell($this->PG_W / 3, 5,"Osoba upoważniona do odbioru faktury", 'T', 0, 'L');
        $this->Ln(10);  
    }
 
    public function Footer() {
 
        // Footer address
 
        $address = "www\nfirma\nadres\nadres\n";
 
        $this->SetY(-(($this->getAddressLength($address) * 5) + 20));
 
        $this->SetFont('arial_ce', '', 7);
 
        $this->Ln();
        $this->writeAddress($address);
    }
 
    private function setTextFont($isBold = false) {
        $this->SetFont('arial_ce', $isBold ? 'B' : '', 9);
    }
 
    private function setDataFont($isBold = false) {
        $this->SetFont('Courier', $isBold ? 'B' : '', 8);
    }
 
    private function getAddressLength($address) {
        return count(explode("\n", $address));
    }
 
    private function writeAddress($address) {
        $lines = explode("\n", $address);
        foreach ($lines as $line) {
            $this->Cell($this->PG_W, 5, $line, 0, 0, 'C');
            $this->Ln(4);
        }
    }   
}