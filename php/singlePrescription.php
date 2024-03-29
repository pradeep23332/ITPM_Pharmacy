<?php 
    include 'connect.php';

    $id = $_GET['singlePrescriptionID'];

    $sql = "SELECT * FROM prescriptionmanagement WHERE prescriptionID=$id";

    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
        $prescriptionID = $row['prescriptionID'];
        $patientName = $row['patientName'];
        $patientAge = $row['age'];
        $patientGender = $row['gender'];
        $email = $row['email'];
        $phone = $row['phone']; 
        $MedicineRequestedDate = $row['orderDate'];
        $deliveryAddress = $row['deliveryAddress'];
        $comments = $row['comments'];
        $deliveryStatus = $row['deliveryStatus'];
        $prescriptionImage=$row['prescriptionPhoto'];
        $assignedDelivPerson=$row['assignedDeliveryPerson'];

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

    <title>Prescription Record Details</title>
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

      <div style=" background: url(../Images/pres3.jpg) no-repeat; background-size: cover; padding-top:90px;" >

        <div class="container" style="marginTop:20px">
        
            <h4 style="color:#00aeff">Prescription Record Details</h4>
            <hr style="color:#00aeff"/>

            <h5 style="color:#0081d1"><b>Contact Information</b></h5><br>

            <dl class="row">

                <dt class="col-sm-3">E-mail</dt>
                <dd class="col-sm-9"><?php echo $email; ?></dd>
                <br/><br/>

                <dt class="col-sm-3">Contact Number</dt>
                <dd class="col-sm-9"><?php echo $phone; ?></dd>
                <br/><br/>

            </dl>

            <h5 style="color:#0081d1"><b>Prescription Information</b></h5><br>

            <dl class="row">
                <dt class="col-sm-3">Prescription ID</dt>
                <dd class="col-sm-9"><?php echo $prescriptionID; ?></dd>
                <br/><br/>

                <dt class="col-sm-3">Patient Name</dt>
                <dd class="col-sm-9"><?php echo $patientName; ?></dd>
                <br/><br/>

                <dt class="col-sm-3">Patient Age</dt>
                <dd class="col-sm-9"><?php echo $patientAge; ?></dd>
                <br/><br/>

                <dt class="col-sm-3">Patient Gender</dt>
                <dd class="col-sm-9"><?php echo $patientGender; ?></dd>
                <br/><br/>
 
                <dt class="col-sm-3">Medicine Requested Date</dt>
                <dd class="col-sm-9"><?php echo $MedicineRequestedDate; ?></dd>
                <br/><br/>
                
                <dt class="col-sm-3">Delivery Address</dt>
                <dd class="col-sm-9"><?php echo  $deliveryAddress; ?></dd>
                <br/><br/>

                <dt class="col-sm-3">Comments</dt>
                <dd class="col-sm-9"><?php echo $comments; ?></dd>
                <br/><br/>

                <dt class="col-sm-3">Assigned Delivery Person</dt>
                <dt class="col-sm-9" style="color:#004f99"><?php echo $assignedDelivPerson; ?></dt>
                <br/><br/>

                <dt class="col-sm-3">Delivery Status</dt>
                <dt class="col-sm-9" style="color:#00a305"><?php echo $deliveryStatus; ?></dt>
                <br/><br/>

                <dt class="col-sm-3">Prescription Image</dt>
                <dd class="col-sm-9"><img src="<?php echo $prescriptionImage; ?>" alt="prescription image" style="width:800px; height:700px;"/></dd>
                <br/><br/>
                
            </dl>

        </div>

        </div>

      </section>



   
  </body>
</html>