<?php
include 'Connect_medicine.php';
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from medi where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
       // echo "Delete Successfully";
       header('location:Display_medicine.php');
    }else{
        die(mysqli_error($con));
    }
}


?>