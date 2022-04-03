<?php

$con=new mysqli('localhost','root','','pharmacy');

if (!$con){
    die(mysqli_error($con));
}

?>