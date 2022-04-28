<?php

require('fpdf.php');

include 'conn.php';


$select = 'SELECT * FROM `staff` ORDER BY staffID';
$result = $con->query($select);

$pdf =  new FPDF();
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Times','B',12);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(276,5,'Staff Document',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','',14);
$pdf->Cell(276,10,'Staff Member Details',0,0,'C');
$pdf->Ln(20);


$pdf->SetFont('Times','B',12);
$pdf->cell(20,10,'ID',1,0,'C');
$pdf->cell(50,10,'Name',1,0,'C');
$pdf->cell(58,10,'Email',1,0,'C');
$pdf->cell(50,10,'Home Town',1,0,'C');
$pdf->cell(50,10,'Phone',1,0,'C');
$pdf->cell(50,10,'Position',1,0,'C');
$pdf->Ln();

while($row = $result->fetch_object()){
  $staffID = $row->staffID;
  $name = $row->name;
  $email = $row->email;
  $hometown = $row->hometown;
  $phone = $row->phone;
  $position = $row->position; 

  $pdf->Cell(20,10,$staffID,1);
  $pdf->Cell(50,10,$name,1);
  $pdf->Cell(58,10,$email,1);
  $pdf->Cell(50,10,$hometown,1);
  $pdf->Cell(50,10,$phone,1);
  $pdf->Cell(50,10,$position,1);
  $pdf->Ln();
}

$pdf->Output();


$pdf->SetY(-15);
$pdf->SetFont('Arial','',8);
$pdf->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
?>