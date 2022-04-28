<?php 
    include 'connect.php';

    $id = $_GET['singleSupplierID'];

    $sql="SELECT * FROM  supplier_management WHERE supplierID=$id";

    $result=mysqli_query($con,$sql);

    $row=mysqli_fetch_assoc($result);
        $supplierID = $row['supplierID'];
        $supplierName = $row['supplierName'];
        $companyName = $row['companyName'];
        $supplierAddress = $row['supplierAddress'];
        $supplierEmail = $row['supplierEmail'];
        $supplierPhone = $row['supplierPhone']; 
        $registeredDate = $row['registeredDate'];
        $supplierDescription = $row['supplierDescription'];
        $postalCode = $row['postalCode'];

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/dabbda7d23.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../styles/displayPrescriptions.css"/>

    <title>Supplier Record Details</title>
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
      <a href="#"><i class="fa-solid fa-chart-bar"></i><span>Manage Sales</span></a>    
      <a href="#"><i class="fa-solid fa-file-prescription"></i><span>Manage Prescriptions</span></a>   
      
    </div>
    <!--sidebar end-->


    <section>

      <div style=" background: url(../Images/supbg2.jpg) no-repeat; background-size: cover; padding-top:90px; padding-bottom:200px;" >

       <div class="container" style="marginTop:20px">

            <h4 style="color:#00aeff">Supplier Record Details</h4>
            <hr style="color:#00aeff"/>

            <h5 style="color:#0081d1"><u>Supplier Information</u></h5><br>


            <dl class="row">
                <dt class="col-sm-3">Supplier ID</dt>
                <dd class="col-sm-9"><?php echo $supplierID; ?></dd>
                <br/><br/><br/>

                <dt class="col-sm-3">Supplier Name</dt>
                <dd class="col-sm-9"><?php echo $supplierName; ?></dd>
                <br/><br/><br/>

                <dt class="col-sm-3">Company Name (If Available)</dt>
                <dd class="col-sm-9"><?php echo $companyName; ?></dd>
                <br/><br/><br/>

                <dt class="col-sm-3">Supplier Address</dt>
                <dd class="col-sm-9"><?php echo $supplierAddress; ?></dd>
                <br/><br/><br/>
 
                <dt class="col-sm-3">Supplier Email</dt>
                <dd class="col-sm-9"><?php echo $supplierEmail; ?></dd>
                <br/><br/><br/>
                
                <dt class="col-sm-3">Supplier Contact Number</dt>
                <dd class="col-sm-9"><?php echo  $supplierPhone; ?></dd>
                <br/><br/><br/>

                <dt class="col-sm-3">Registered Date</dt>
                <dd class="col-sm-9"><?php echo $registeredDate; ?></dd>
                <br/><br/><br/>

                <dt class="col-sm-3">Supplier Description</dt>
                <dd class="col-sm-9" ><?php echo $supplierDescription; ?></dd>
                <br/><br/><br/>

                <dt class="col-sm-3">Postal Code</dt>
                <dd class="col-sm-9" ><?php echo $postalCode; ?></dd>
                <br/><br/><br/>

                
                
            </dl>

       </div>

        </div>

      </section>



   
  </body>
</html>