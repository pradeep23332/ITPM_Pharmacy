<?php

$con=new mysqli('localhost','root','','medicine');

if (!$con){
    die(mysqli_error($con));
}

?>