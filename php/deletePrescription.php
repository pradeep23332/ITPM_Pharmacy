<?php 
    include 'connect.php';

    if(isset($_GET['deletePrescriptionId'])){
        $id=$_GET['deletePrescriptionId'];

        $sql="DELETE FROM prescriptionmanagement WHERE prescriptionID=$id";

         $result=mysqli_query($con,$sql);

        if($result){
            //echo '<script>alert("Prescription Record Deleted Successfully!")</script>';
             header('location:displayPrescriptions.php');
             echo'<div class="alert alert-success" role="alert">
                    Prescription Record Deleted Successfully!
                    </div>';
        }else{
            die(mysqli_error($con));
        }


}

?>