<?php
require('includes/fpdf.php');

$terms = file_get_contents('local/repairTerms.txt');
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
    #$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();

include $_SERVER['DOCUMENT_ROOT'].'/local/dbCredentials.php';
include $_SERVER['DOCUMENT_ROOT'].'/local/locals.php';
include 'local/functions.php';

if($_GET["docket"]) {
    $record = $_GET["docket"];
    
    if($_GET["state"]) {
        $status = test_input($_GET["state"]);
        if($status = "complete"){        
            $query = "UPDATE repairs SET status='$status' where repair_ID=$record";
            $result = $conn->query($query);
  
        }
    }


    $query = "SELECT * FROM repairs WHERE repair_ID=$record";
    $result = $repairDB->query($query);
    
    while($row = $result->fetch_assoc()) {
        $repair_ID = $row["repair_ID"];
        $name = $row["customer_name"];
        $phone = $row["customer_phone"];
        $email = $row["customer_email"];
        $product = $row["product_name"];
        $dos = $row["dos"];
        $fault = htmlspecialchars_decode($row["product_fault"]);
        $accessories = $row["product_accessories"];
        $date = date('d M Y', strtotime($row["repair_date"]));
        $notes = htmlspecialchars_decode($row["product_misc"]);
        $salesperson = $row["salesperson"];
        $updates = htmlspecialchars_decode($row["updates"]);
        $lastUpdate = date('d M Y', strtotime($row["lastUpdate"]));
        $tested = $row["tested"];
        $status = $row["status"];
        $completeDate = date('d M Y', strtotime($row["completeDate"]));
		$title = "Repair ".$repair_ID." | The Listening Post";
    }
    
}else{
echo "no get record found";
}
$pdf->SetTitle($title);
$pdf->SetLeftMargin(30);
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(75,12,'Repair Docket', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->multiCell(75,6,"$locName\n$locAdd",1);

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(75,7,"Reference: $repair_ID", 1);
$pdf->Cell(75,7,"(P)$locPho (W) www.listeningpost.co.nz", 1);
$pdf->Ln();$pdf->Ln();
$pdf->Ln();
$pdf->Cell(75,7,'Customer: ', 1);
$pdf->Cell(75,7,'Date:', 1);
$pdf->Ln();
$pdf->Cell(75,5,"$name", 0);
$pdf->Cell(75,5,"$date", 0);
$pdf->Ln();
$pdf->Cell(75,4,"$phone", 0);
$pdf->Ln();
$pdf->Cell(75,4,"$email", 0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,4,'Product Details: ', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,4,"$product", 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,4,'Date of Sale: ', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,4,"$dos", 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,4,'Fault:', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,4,"$fault", 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,4,'Updates as of '.$lastUpdate, 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,4,"$updates", 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,4,'Included Accessories:', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,4,"$accessories", 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,4,'Confirmed in Store?', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,4,"$tested", 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,4,'You have been dealing with:', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,4,"$salesperson", 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,4,'Terms of Repair:', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,4, $terms, 0);
$pdf->Ln();
$pdf->Cell(150,7,'I agree to these terms:', 0);
if($status != 'active'){
    $pdf->SetFont('Arial', '', 10);
    #$pdf->multiCell(150,7,"This is a reprinted docket. This repair was marked as complete on $completeDate", 0);
}
$pdf->Output();
?>
