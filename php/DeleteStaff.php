<?php

include 'conn.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `staff` where staffID=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Deleted successfully";
        header('location:ViewAllStaff.php');
    }else{
        die(mysqli_error($con));
    }
}
?>