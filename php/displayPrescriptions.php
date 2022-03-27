<?php
   
    if(isset($_POST['search'])){
        $valueToSearch = $_POST['valueToSearch'];
        $query = "SELECT * FROM `prescriptionmanagement` WHERE CONCAT(`prescriptionID`,`patientName`,`age`,`gender`,`email`,`phone`,`orderDate`,`deliveryAddress`,`comments`,`deliveryStatus`) LIKE '%".$valueToSearch."%' " ;
        $search_result = filterTable ($query);
   
    }else{
        $query = "SELECT * FROM `prescriptionmanagement`";
        $search_result = filterTable ($query);
    }

    function filterTable($query){
        $con = mysqli_connect("localhost","root","","pharmacy");
        $filter_Result = mysqli_query($con,$query);
        return $filter_Result;

    }    
    
    

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/displayPrescriptions.css">

    <title>Display All Prescriptions</title>
    
  </head>
  <body>

            <div style="width:1600px; margin:60px" >

                <div class="row">
                    <div class="col-lg-9 mt-2 mb-2"><br/>
                            <h4 style="color:#0091ff">All Prescription Records</h4>
                        
                    </div>
                    <div class="col-lg mt-2 mb-2">
                        <form action="displayPrescriptions.php" method="post">
                            <input
                                class="form-control"
                                type="text"
                                placeholder="Search"
                                name="valueToSearch"
                            /><br/>

                            <input type="submit" name="search" value="Search" class="btn btn-info" style="color:white"/>
                        </form>
                    </div>
                </div>
                <hr style="color:#00aeff"/>
            
                <br/><br/>
                
                <div class="transbox1">
                <table class="table">
                    <thead  style="color:#00a6ff"> 
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Prescription ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Patient Age</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Requested Date</th>
                            <th scope="col">Assigned Delivery Person</th>
                            <th scope="col">Delivery Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php

                                $index=1; 

                                    while($row=mysqli_fetch_array($search_result)):
                                        $prescriptionID = $row['prescriptionID'];
                                        $patientName = $row['patientName'];
                                        $patientAge = $row['age'];
                                        $patientGender = $row['gender'];
                                        $deliveryStatus = $row['deliveryStatus'];
                                        $MedicineRequestedDate = $row['orderDate']; 
                                        $assignedDeliveryPerson=$row['assignedDeliveryPerson'];?>

                                        <tr style="color:#000000">

                                        <th scope="row">
                                            <?php

                                                echo $index;
                                                $no=$index++;
                                        
                                            ?>
                                        </th>

                                        <?php

                                        echo '

                                        <td>
                                        <a href="singlePrescription.php?singlePrescriptionID='.$prescriptionID.'" style="text-decoration: none">
                                        '.$prescriptionID.'
                                        </a>
                                        </td>
                                        <td>'.$patientName.'</td>
                                        <td>'.$patientAge.'</td>
                                        <td>'.$patientGender.'</td>
                                        <td>'.$MedicineRequestedDate.'</td>
                                        <th style="color:#004f99">'.$assignedDeliveryPerson.'</th>
                                        <th style="color:#00a305">'.$deliveryStatus.'</th>

                                        <td>

                                        <button class="btn btn-warning" style="color: white">
                                        <a php href="updatePrescription.php?updatePrescriptionId='.$prescriptionID.'" style="text-decoration: none" class="text-light">
                                        Change Delivery Status
                                        </a>
                                        </button> 

                                        <br/><br/>

                                        <button class="btn btn-danger">
                                        <a php href="deletePrescription.php?deletePrescriptionId='.$prescriptionID.'" style="text-decoration: none" class="text-light">
                                        Delete Prescription Record
                                        </a>
                                        </button>
   
                                        </td>

                                        '

                                        ?>
                                        
                                        </tr>

                                        <?php
                                         endwhile;
                                            
                                            ?>
                                        
                                
                    </tbody>

                </table>

                </div>

               <!-- <h5 style="color:#00b395">No. Of Prescription Records: <?php //echo $no;?></h5> -->

                <button class="btn btn-primary my-5">
                    <a href="addPrescription.php" class="text-light" style="text-decoration: none">
                    Add Pres Record
                    </a>
                </button>

                <form action="prescriptionExcel.php" method="POST">
                    <input type="submit" name="export_excelPrescription" class="btn btn-success" value="Export to Excel">                                
                </form>


             </div>


   
  </body>

</html>