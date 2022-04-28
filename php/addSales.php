<?php
include 'connect.php';

if (isset($_POST['submit'])){
      $name=$_POST['name'];
      $pharmacist=$_POST['pharmacist'];
      $description=$_POST['description'];
      $issueddate=$_POST['issueddate'];
      $delivereddate=$_POST['delivereddate'];
      $amount=$_POST['amount'];

  $sql= "insert into crud (name,pharmacist,description,issueddate,delivereddate,amount)
  values ('$name','$pharmacist','$description','$issueddate','$delivereddate','$amount')";
  $result=mysqli_query($con,$sql);
  if($result){
    //echo "Data inserted sucessfully";
    header('location:displaySales.php');
  }else{
    die(myqli_error($con));
        }
 }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../css/addsales.css">
    <script src="https://kit.fontawesome.com/dabbda7d23.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../styles/displayPrescriptions.css"/>


  </head>

  <body>

  <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">HEALTH CARE</label>
     
      <ul>
        <li><a  href="Homepage.php">Home</a></li>
        <li><a href="#">About Us</a></li>
		<li><a href="#">Contact Us</a></li>
        <li><a href="addPrescription.php">Online Pharamacy Services</a></li>
        <li><a href="logout.php">Log Out</a></li>        
      </ul>
    </nav>
     <!--sidebar start-->
     <div class="sidebar">
      <center>
        <img src="../Images/22.png" class="profile_image" alt="">
        <h4>Admin</h4>
      </center>
      <a href="#"><i class="fa-solid fa-pills"></i><span>Manage Medicines</span></a> 
      <a href="#"><i class="fa-solid fa-users"></i><span>Manage Staff</span></a> 
      <a href="#"><i class="fa-solid fa-people-roof"></i><span>Manage Suppliers</span></a>          
      <a href="displaySales.php"><i class="fa-solid fa-chart-bar"></i><span>Manage Sales</span></a>    
      <a href="#"><i class="fa-solid fa-file-prescription"></i><span>Manage Prescriptions</span></a>   
      
    </div>
    <!--sidebar end-->

    <section >
            <div style=" background: url(../Images/sales2.jpg) no-repeat; background-size: cover; padding-top:80px; padding-bottom:280px; padding-left:18px;" >




      <div class="container my-5">
      <form method="post">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" 
    placeholder="Enter your name" 
    name="name" autocomplete="off">
</div>

<div class="form-group">
    <label>Pharmacist Name</label>
    <input type="text" class="form-control" 
    placeholder="Enter pharmacist name" 
    name="pharmacist" autocomplete="off">
</div>

<div class="form-group">
    <label>Item Description</label>
    <input type="text" class="form-control" 
    placeholder="Description" 
    name="description" autocomplete="off">
</div>

<div class="form-group">
    <label>Issued Date</label>
    <input type="date" class="form-control" 
    placeholder="YYYY/MM/DD" 
    name="issueddate">
</div>

<div class="form-group">
    <label>Delivered Date</label>
    <input type="date" class="form-control" 
    placeholder="YYYY/MM/DD"  
    name="delivereddate">
</div>

<div class="form-group">
    <label>Amount</label>
    <input type="text" class="form-control" 
    placeholder="Type the amount"  
    name="amount">
</div>
  <button type="submit" 
  class="btn btn-primary" name="submit">Submit</button>
</form>   
</div>
</div>
            </section>

    
  </body>
</html>