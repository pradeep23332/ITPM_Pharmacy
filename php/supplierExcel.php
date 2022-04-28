<?php
     $con = mysqli_connect("localhost","root","","pharmacy");

    $output='';

    if(isset($_POST["export_excelSupplier"])){
        $sql="SELECT * FROM supplier_management ORDER BY supplierID DESC";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            $output.='
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>Supplier ID</th>
                            <th>Supplier Name</th>
                            <th>Company Name</th>
                            <th>Supplier Address</th>
                            <th>Supplier E-mail</th>
                            <th>Supplier Contact Number</th>
                            <th>Registered Date</th>
                            <th>Supplier Description</th>
                            <th>Postal Code</th>
                        </tr>
                    </thead>    
                
            
            ';
            while($row=mysqli_fetch_array($result)){
                
                $output.='
                    
                        <tbody>
                            <tr>
                                <td>'.$row['supplierID'].'</td>
                                <td>'.$row['supplierName'].'</td>
                                <td>'.$row['companyName'].'</td>
                                <td>'.$row['supplierAddress'].'</td>
                                <td>'.$row['supplierEmail'].'</td>
                                <td>'.$row['supplierPhone'].'</td>
                                <td>'.$row['registeredDate'].'</td>
                                <td>'.$row['supplierDescription'].'</td>
                                <td>'.$row['postalCode'].'</td> 
                            </tr>
                        </tbody>    
                    
                ';
            }

            $output .='</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=downloadSupplierExcel.xls");
            echo $output;
        }


    }




?>