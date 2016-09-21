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


include 'dbCredentials.php';
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
    $result = $conn->query($query);
    
    while($row = $result->fetch_assoc()) {
        $repair_ID = $row["repair_ID"];
        $name = $row["customer_name"];
        $phone = $row["customer_phone"];
        $email = $row["customer_email"];
        $product = $row["product_name"];
        $fault = $row["product_fault"];
        $accessories = $row["product_accessories"];
        $date = $row["repair_date"];
        $notes = $row["product_misc"];
        $salesperson = $row["salesperson"];
        $updates = $row["updates"];
        $tested = $row["tested"];
        $status = $row["status"];
    }
    
}else{
echo "no get record found";
}
$pdf->SetLeftMargin(30);
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(75,14,'Repair Docket', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->multiCell(75,7,"The Listening Post Wellington\n150 Willis Street",1);

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(75,7,"Reference: $repair_ID", 1);
$pdf->Cell(75,7,'(P)004 385 2919 (W)www.listeningpost.co.nz', 1);
$pdf->Ln();$pdf->Ln();
$pdf->Ln();
$pdf->Cell(75,7,'Customer: ', 1);
$pdf->Cell(75,7,'Date:', 1);
$pdf->Ln();
$pdf->Cell(75,7,"$name", 1);
$pdf->Cell(75,7,"$date", 1);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,7,'Product Details: ', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,7,"$product", 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,7,'Fault:', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,4,"$fault", 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,4,'Included Accessories:', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,4,"$accessories", 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,7,'Confirmed in Store?', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,7,"$tested", 0);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(150,7,'You have been dealing with:', 0);
$pdf->Ln();
$pdf->SetFont('Arial', '', 8);
$pdf->multiCell(150,7,"$salesperson", 0);
$pdf->Output();
?>
