<?php

    $con = new mysqli("localhost","root","","pharmacy");

    /*if($con){
        echo "Connection Successful!";
    }else{
        die(mysqli_error($con));
    }*/

    if(!$con){
        die(mysqli_error($con));
    }


?> 