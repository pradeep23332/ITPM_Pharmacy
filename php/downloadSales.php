<?php

require('pdfsetting_Sales.php');

include 'connect.php';


$select = 'SELECT * FROM crud ORDER BY id';
$result = $con->query($select);

$pdf =  new FPDF();
$pdf->AddPage('L','A3',0);
$pdf->SetFont('Times','B',12);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(276,5,'Sales Report',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','',14);
$pdf->Cell(276,10,'Sales Details',0,0,'C');
$pdf->Ln(20);


$pdf->SetFont('Times','B',12);
$pdf->cell(50,10,'id',1,0,'C');
$pdf->cell(50,10,'Name',1,0,'C');
$pdf->cell(58,10,'Pharmacist Name',1,0,'C');
$pdf->cell(50,10,'Description',1,0,'C');
$pdf->cell(50,10,'Issued date',1,0,'C');
$pdf->cell(50,10,'Delivered date',1,0,'C');
$pdf->cell(50,10,'amount',1,0,'C');
$pdf->Ln();

while($row = $result->fetch_object()){
  $id = $row->id;
  $name = $row->name;
  $pharmacist = $row->pharmacist;
  $description = $row->description;
  $issueddate = $row->issueddate;
  $delivereddate = $row->delivereddate; 
  $amount = $row->amount; 

  $pdf->Cell(50,10,$id,1);
  $pdf->Cell(50,10,$name,1);
  $pdf->Cell(58,10,$pharmacist,1);
  $pdf->Cell(50,10,$description,1);
  $pdf->Cell(50,10,$issueddate,1);
  $pdf->Cell(50,10,$delivereddate,1);
  $pdf->Cell(50,10,$amount,1);
  $pdf->Ln();
}

$pdf->Output();


$pdf->SetY(-15);
$pdf->SetFont('Arial','',8);
$pdf->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
?>