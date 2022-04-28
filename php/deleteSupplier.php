<?php 
    include 'connect.php';

    if(isset($_GET['deleteSupplierId'])){
        $id=$_GET['deleteSupplierId'];

        $sql="DELETE FROM supplier_management WHERE supplierID=$id";

         $result=mysqli_query($con,$sql);

        if($result){
            //echo '<script>alert("Supplier Record Deleted Successfully!")</script>';
             header('location:displaySupplier.php');
             echo'<div class="alert alert-success" role="alert">
                     Supplier Record Deleted Successfully!
                    </div>';
        }else{
            die(mysqli_error($con));
        }


}

?>