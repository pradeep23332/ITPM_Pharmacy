<?php
include 'connect.php'; 
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" contect="IE=width">
        <meta name= "viewport" content="width=device-width,
        initial-scale=1.0">
        
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
            <div style=" background: url(../Images/sales2.jpg) no-repeat; background-size: cover; padding-top:80px; padding-bottom:280px; padding-left:18px;" >


<div class="container">
    <button class="btn btn-primary my-5"><a href="addSales.php" 
    class="text-light"> Add User</a>
</button>
<button class="btn btn-primary my-5"><a href="searchSales.php" 
    class="text-light">Search</a>
</button>
<button class="btn btn-primary my-5"><a href="downloadSales.php" 
    class="text-light">Download PDF</a>
</button>

</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Pharmacist Name</th>
      <th scope="col">Description</th>
      <th scope="col">Issued date</th>
      <th scope="col">Delivered date</th>
      <th scope="col">amount</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>

<?php

$sql="Select * from crud ";
$result=mysqli_query($con,$sql);
if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $name=$row['name'];
            $pharmacist=$row['pharmacist'];
            $description=$row['description'];
            $issueddate=$row['issueddate'];
            $delivereddate=$row['delivereddate'];
            $amount = $row['amount'];
            echo '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$name.'</td>
            <td>'.$pharmacist.'</td>
            <td>'.$description.'</td>
            <td>'.$issueddate.'</td>
            <td>'.$delivereddate.'</td>
            <td>'.$amount.'</td>
            <td>
            <button class="btn btn-primary"><a href="updateSales.php?
            updateid='.$id.'"class="text-light">Update</a></button>
            <button class="btn btn-danger"><a href="deleteSales.php?
            deleteid='.$id.'" class="text-light">Delete</a></
            button>
            </td>
    

          </tr>';
            
        }
}

?>

  </tbody>
</table>
</div>
</div>
            </section>
</body>
</html>