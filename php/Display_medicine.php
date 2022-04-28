<?php
include 'Connect_medicine.php';?>












<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Details </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dabbda7d23.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/displaymedi.css">
    <style>
      table,th,td{
           background-color: yellow;
           text-align:center;
       }
       
      </style>
</head>
<body>
<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">HEALTH CARE</label>
     
      <ul>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
		 <li><a href="#">Contact Us</a></li>
        <li><a href="#">Online Pharamacy Services</a></li>
        <li><a href="logout.php">Log Out</a></li>        
      </ul>
    </nav>
     <!--sidebar start-->
     <div class="sidebar">
      <center>
        <img src="../Images/22.png" class="profile_image" alt="">
        <h4>Admin</h4>
      </center>
      <a href="Display_medicine.php"><i class="fa-solid fa-pills"></i><span>Manage Medicines</span></a> 
      <a href="#"><i class="fa-solid fa-users"></i><span>Manage Staff</span></a> 
      <a href="#"><i class="fa-solid fa-people-roof"></i><span>Manage Suppliers</span></a>          
      <a href="#"><i class="fa-solid fa-chart-bar"></i><span>Manage Sales</span></a>    
      <a href="displayPrescriptions.php"><i class="fa-solid fa-file-prescription"></i><span>Manage Prescriptions</span></a>   
      
    </div>
    <!--sidebar end-->
    <section></section>
<ul><h1>ALL MEDICINE DETAILS</h1></ul> 
<div class="container" style="padding-left:180px;">
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
        <button class="btn btn-primary"><a href="Update_medicine.php?updateid='.$id.'" class="text-light">Update</a></button>
        <button class="btn btn-warning"><a href="Delete_medicine.php? deleteid='.$id.'" class="text-light">Delete</a></button>
        </td> 
        </tr>';
     }
 }



   ?>

  
   
  </tbody>
</table>

<button class="btn btn-primary my-5"><a href="Add_medicine.php"class="text-light">Add Medicine details</a></button> 
<button class="btn btn-warning my-9"><a href="Search_medicine.php"class="text-light">Search Medicine deatils</a> </button>
<button class="btn btn-success my-9"><a href="Medicine_report.php"class="text-light">Generate PDF Report</a> </button>


        


</div>





</body>
</html>
