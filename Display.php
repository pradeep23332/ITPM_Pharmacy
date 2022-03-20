<?php
include 'Connect.php';?>












<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Details </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
      table,th,td{
           background-color: yellow;
           text-align:center;
       }
       body{
         background-color:lightgreen;
       }
      </style>
</head>
<body>
<br/>
<ul><h1>ALL MEDICINE DETAILS</h1></ul> 
<div class="container">
   <br/><br/>


   <br/>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Medicine ID</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Manufacture Date</th>
      <th scope="col">Expiry Date</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Type</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>


   <?php
 
 $sql="Select * from medi ";
 $result=mysqli_query($con,$sql);
 if ($result){
     while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $quantity=$row['quantity'];
        $manufacture=$row['manufacture'];
        $expiry=$row['expiry'];
        $brand=$row['brand'];
        $type=$row['type'];
        echo ' <tr>

        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td>'.$quantity.'</td>
        <td>'.$manufacture.'</td>
        <td>'.$expiry.'</td>
        <td>'.$brand.'</td>
        <td>'.$type.'</td>
        <td>
        <button class="btn btn-primary"><a href="Update.php?updateid='.$id.'" class="text-light">Update</a></button>
        <button class="btn btn-warning"><a href="Delete.php? deleteid='.$id.'" class="text-light">Delete</a></button>
        </td> 
        </tr>';
     }
 }



   ?>

  
   
  </tbody>
</table>

<button class="btn btn-primary my-5"><a href="Add_medicine.php"class="text-light">Add Medicine details</a></button> 
<button class="btn btn-warning my-9"><a href="Search.php"class="text-light">Search Medicine deatils</a> </button>
        


</div>
</body>
</html>
