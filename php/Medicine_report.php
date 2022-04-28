<?php

require('pdfsetting_medicine.php');

include 'Connect_medicine.php';


$select = 'SELECT * FROM medi ORDER BY id';
$result = $con->query($select);

$pdf =  new FPDF();
$pdf->AddPage('L','A3',0);
$pdf->SetFont('Times','B',12);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(276,5,'Medicine info Document',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','',14);
$pdf->Cell(276,10,'Medicine  Details',0,0,'C');
$pdf->Ln(20);


$pdf->SetFont('Times','B',12);
$pdf->cell(50,10,'Medicine ID',1,0,'C');
$pdf->cell(50,10,'Name',1,0,'C');
$pdf->cell(58,10,'Quantity',1,0,'C');
$pdf->cell(50,10,'Manufacture Date',1,0,'C');
$pdf->cell(50,10,'Expiry Date',1,0,'C');
$pdf->cell(50,10,'Brand Name',1,0,'C');
$pdf->cell(50,10,'Type',1,0,'C');
$pdf->Ln();

while($row = $result->fetch_object()){
  $id = $row->id;
  $name = $row->name;
  $quantity = $row->quantity;
  $manufacture = $row->manufacture;
  $expiry = $row->expiry;
  $brand = $row->brand; 
  $type = $row->type; 

  $pdf->Cell(50,10,$id,1);
  $pdf->Cell(50,10,$name,1);
  $pdf->Cell(58,10,$quantity,1);
  $pdf->Cell(50,10,$manufacture,1);
  $pdf->Cell(50,10,$expiry,1);
  $pdf->Cell(50,10,$brand,1);
  $pdf->Cell(50,10,$type,1);
  $pdf->Ln();
}

$pdf->Output();


$pdf->SetY(-15);
$pdf->SetFont('Arial','',8);
$pdf->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
?>