<?php

require('fpdf.php');

include 'connect.php';


$select = 'SELECT * FROM prescriptionmanagement ORDER BY prescriptionID';
$result = $con->query($select);

$pdf =  new FPDF();
$pdf->AddPage('L','A3',0);
$pdf->SetFont('Times','B',12);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(276,5,'Prescription info Document',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','',14);
$pdf->Cell(276,10,'Prescription  Records',0,0,'C');
$pdf->Ln(20);


$pdf->SetFont('Times','B',12);
$pdf->cell(30,10,'Prescription ID',1,0,'C');
$pdf->cell(40,10,'Patient Name',1,0,'C');
$pdf->cell(25,10,'Patient Age',1,0,'C');
$pdf->cell(30,10,'Patient Gender',1,0,'C');
$pdf->cell(50,10,'Contact Number',1,0,'C');
$pdf->cell(50,10,'Medicine Requested Date',1,0,'C');
$pdf->cell(65,10,'Delivery Address',1,0,'C');
$pdf->cell(50,10,'Delivery Status',1,0,'C');
$pdf->cell(50,10,'Assigned Delivery Person',1,0,'C');
$pdf->Ln();

while($row = $result->fetch_object()){
  $prescriptionID = $row->prescriptionID;
  $patientName = $row->patientName;
  $patientAge = $row->age;
  $patientGender = $row->gender;
  $phone = $row->phone; 
  $MedicineRequestedDate = $row->orderDate;
  $deliveryAddress = $row->deliveryAddress; 
  $deliveryStatus = $row->deliveryStatus;  
  $assignedDelivPerson = $row->assignedDeliveryPerson; 

  $pdf->Cell(30,10,$prescriptionID,1);
  $pdf->Cell(40,10,$patientName,1);
  $pdf->Cell(25,10,$patientAge,1);
  $pdf->Cell(30,10,$patientGender,1);
  $pdf->Cell(50,10,$phone,1);
  $pdf->Cell(50,10,$MedicineRequestedDate,1);
  $pdf->Cell(65,10,$deliveryAddress,1);
  $pdf->Cell(50,10,$deliveryStatus,1);
  $pdf->Cell(50,10,$assignedDelivPerson,1);
  $pdf->Ln();
}

$pdf->Output();


$pdf->SetY(-15);
$pdf->SetFont('Arial','',8);
$pdf->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
?>