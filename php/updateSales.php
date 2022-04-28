<?php
include 'connect.php';
$id=$_GET['updateid']; 
$sql="Select * from crud where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$name=$row['name'];
$pharmacist=$row['pharmacist'];
$description=$row['description'];
$issueddate=$row['issueddate'];
$delivereddate=$row['delivereddate'];
$amount=$row['amount'];


if(isset($_POST['submit'])){
      $name=$_POST['name'];
      $pharmacist=$_POST['pharmacist'];
      $description=$_POST['description'];
      $issueddate=$_POST['issueddate'];
      $delivereddate=$_POST['delivereddate'];
      $amount=$_POST['amount'];

  $sql= "update crud set id = $id,name='$name',
        pharmacist='$pharmacist',description='$description',
        issueddate='$issueddate', delivereddate='$delivereddate' ,
        amount='$amount'
        where id=$id";
  $result=mysqli_query($con,$sql);
  if($result){
    //echo "updated sucessfully";
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
            <div style=" background: url(../Images/supbg2.jpg) no-repeat; background-size: cover; padding-top:80px; padding-bottom:280px; padding-left:18px;" >



      <div class="container my-5">
      <form method="post">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" 
    name="name"  
    value=<?php echo $name;?>>

  </div>

<div class="form-group">
    <label>Pharmacist Name</label>
    <input type="text" class="form-control" 
    name="pharmacist"  
    value=<?php echo $pharmacist;?>>
</div>

<div class="form-group">
    <label>Item Description</label>
    <input type="text" class="form-control" 
    name="description"
    value=<?php echo $description;?>>
</div>

<div class="form-group">
    <label>Issued Date</label>
    <input type="date" class="form-control" 
    name="issueddate"
    value=<?php echo $issueddate;?>>
</div>

<div class="form-group">
    <label>Delivered Date</label>
    <input type="date" class="form-control"   
    name="delivereddate"
    value=<?php echo $delivereddate;?>>
</div>

<div class="form-group">
    <label>Amount</label>
    <input type="text" class="form-control" 
    name="amount"
    value=<?php echo $amount;?>>
</div>



  <button type="submit" 
  class="btn btn-primary" name="submit">Update</button>
</form>   
</div>
    </div>
            </section>

    
  </body>
</html>