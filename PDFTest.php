<?php
require('includes/fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('images/TLPLogoFinal.jpg',120,6,60);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);

        // Line break
        $this->Ln(30);

    }
    // Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
    
$pdf = new PDF();
$pdf->SetLeftMargin(30);
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(75,14,'Repair Docket', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->multiCell(75,7,"The Listening Post Wellington\n150 Willis Street",1);

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(75,7,'Reference: NUMBER', 1);
$pdf->Cell(75,7,'(P)004 385 2919 (W)www.listeningpost.co.nz', 1);
$pdf->Ln();$pdf->Ln();
$pdf->Ln();
$pdf->Cell(75,7,'Customer: ', 1);
$pdf->Cell(75,7,'Date:', 1);
$pdf->Ln();
$pdf->Cell(75,7,'Test Guy ', 1);
$pdf->Cell(75,7,'Tuesday Today', 1);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,7,'Product Details: ', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,7,'Losts of product info', 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,7,'Fault:', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,4,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,4,'Included Accessories:', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,4,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,7,'Confirmed in Store?', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,7,'Yep', 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,7,'You have been dealing with:', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,7,'Jason', 0);
$pdf->Output();
?>
