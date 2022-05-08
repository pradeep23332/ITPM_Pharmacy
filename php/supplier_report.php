<?php

require('fpdf.php');

include 'connect.php';


$select = 'SELECT * FROM supplier_management ORDER BY supplierID';
$result = $con->query($select);

$pdf =  new FPDF();
$pdf->AddPage('L','A3',0);
$pdf->SetFont('Times','B',12);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(276,5,'Supplier Info Document',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','',14);
$pdf->Cell(276,10,'Supplier Records',0,0,'C');
$pdf->Ln(20);


$pdf->SetFont('Times','B',12);
$pdf->cell(30,10,'Supplier ID',1,0,'C');
$pdf->cell(40,10,'Supplier Name',1,0,'C');
$pdf->cell(30,10,'Company Name',1,0,'C');
$pdf->cell(90,10,'Supplier Address',1,0,'C');
$pdf->cell(60,10,'Supplier Email',1,0,'C');
$pdf->cell(50,10,'Contact Number',1,0,'C');
$pdf->cell(45,10,'Registered Date',1,0,'C');
$pdf->cell(40,10,'Postal Code',1,0,'C');
$pdf->Ln();

while($row = $result->fetch_object()){
  $supplierID = $row->supplierID;
  $supplierName = $row->supplierName;
  $companyName = $row->companyName;
  $supplierAddress = $row->supplierAddress;
  $supplierEmail = $row->supplierEmail; 
  $supplierPhone = $row->supplierPhone;
  $registeredDate = $row->registeredDate; 
  $postalCode = $row->postalCode;  

  $pdf->Cell(30,10,$supplierID,1);
  $pdf->Cell(40,10,$supplierName,1);
  $pdf->Cell(30,10,$companyName,1);
  $pdf->Cell(90,10,$supplierAddress,1);
  $pdf->Cell(60,10,$supplierEmail,1);
  $pdf->Cell(50,10,$supplierPhone,1);
  $pdf->Cell(45,10,$registeredDate,1);
  $pdf->Cell(40,10,$postalCode,1);
  $pdf->Ln();
}

$pdf->Output();


$pdf->SetY(-15);
$pdf->SetFont('Arial','',8);
$pdf->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
?>