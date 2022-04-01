<?php
     $con = mysqli_connect("localhost","root","","pharmacy");

    $output='';

    if(isset($_POST["export_excelPrescription"])){
        $sql="SELECT * FROM prescriptionmanagement ORDER BY prescriptionID DESC";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            $output.='
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>Prescription ID</th>
                            <th>Patient Name</th>
                            <th>Patient Age</th>
                            <th>Patient Gender</th>
                            <th>E-mail</th>
                            <th>Contact Number</th>
                            <th>Medicine Requested Date</th>
                            <th>Delivery Address</th>
                            <th>Comments</th>
                            <th>Delivery Status</th>
                            <th>Assigned Delivery Person</th>
                        </tr>
                    </thead>    
                
            
            ';
            while($row=mysqli_fetch_array($result)){
                
                $output.='
                    
                        <tbody>
                            <tr>
                                <td>'.$row['prescriptionID'].'</td>
                                <td>'.$row['patientName'].'</td>
                                <td>'.$row['age'].'</td>
                                <td>'.$row['gender'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['phone'].'</td>
                                <td>'.$row['orderDate'].'</td>
                                <td>'.$row['deliveryAddress'].'</td>
                                <td>'.$row['comments'].'</td>
                                <td>'.$row['deliveryStatus'].'</td>
                                <td>'.$row['assignedDeliveryPerson'].'</td>  
                            </tr>
                        </tbody>    
                    
                ';
            }

            $output .='</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=downloadPrescriptionExcel.xls");
            echo $output;
        }


    }




?>