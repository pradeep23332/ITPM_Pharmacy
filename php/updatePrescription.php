<?php
  include 'connect.php';

    $id=$_GET['updatePrescriptionId'];

    $sql="SELECT * FROM prescriptionmanagement WHERE prescriptionID=$id";

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
        $assigneDelivPerson=$row['assignedDeliveryPerson'];

  if(isset($_POST['submit'])){

      /*$dir = 'uploads/';
      $image_path = $dir.basename($_FILES['imageFile']['name']);

      if(move_uploaded_file($_FILES['imageFile']['tmp_name'],$image_path)){
          echo "Uploaded Successfully";
      }

            $patientName=$_POST['InputPatientName'];
            $patientAge=$_POST['InputPatientAge'];
            $gender=$_POST['Gender'];
            $email=$_POST['InputEmail'];
            $contactNumber=$_POST['InputContactNumber'];
            $orderDate=$_POST['InputOrderDate'];
            $deliveryAddress=$_POST['InputDeliveryAddress'];
            $comments=$_POST['InputComments'];*/
            $deliveryStatus=$_POST['InputDeliveryStatus'];
            $assignedDeliveryPerson=$_POST['InputAssignedDeliveryPersonName'];

            $sql= "UPDATE prescriptionmanagement
                   SET deliveryStatus = '$deliveryStatus', assignedDeliveryPerson = '$assignedDeliveryPerson' 
                   WHERE prescriptionID= $id";

            $result=mysqli_query($con,$sql);

            if($result){
                   echo'<script>alert("Prescription Record Updated Successfully!")</script>';
                   header('location:displayPrescriptions.php');
            }else{
                  die(mysqli_error($con));
            }

    }

   
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../styles/updatePrescription.css"/>

    <title>Change Delivery Status</title>
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




    <section style=" background: url(../Images/pres3.jpg) ; height:auto; background-size: cover; padding-top:80px;">

    <div  >
    <div class="container" >
            <form  method="POST" enctype="multipart/form-data">

                     <h4 style="color:#00aeff">Update Prescription Record Delivery Details</h4>
                     <hr style="color:#00aeff"/>

                    <h5 style="color:#0081d1"><u>Contact Information</u></h5><br>


                    <div class="mb-4">
                        <label  class="form-label" for="Email"> E-mail *</label>
                        <input type="email" class="form-control" name="InputEmail"
                         placeholder="Enter E-mail" style="width:1000px" id="Email"
                         value="<?php echo $email; ?>"  required readonly/>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="ContactNumber"> Contact Number (0xx-yyyyyyy) *</label>
                        <input type="text" class="form-control"  name="InputContactNumber" placeholder="Enter Contact Number"
                         style="width:1000px" id="ContactNumber" pattern="[0-9]{3}-[0-9]{7}" 
                         value="<?php echo $phone; ?>" required readonly/>
                    </div>

                    <h5 style="color:#0081d1"><u>Prescription Information</u></h5><br>

                    <div class="mb-4">
                        <label class="form-label" for="PatientName">Patient Name *</label>
                        <input type="text" class="form-control"  name="InputPatientName" placeholder="Enter Patient Name"
                         style="width:1000px" id="PatientName" value="<?php echo $patientName; ?>" required readonly/>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="PatientAge"> Patient Age *</label>
                        <input type="number" class="form-control"  name="InputPatientAge"
                         placeholder="Enter Patient Age" style="width:1000px" id="PatientAge" value="<?php echo $patientAge; ?>"  min="0" required readonly/>
                    </div>


                    <div class="mb-4">
                        <label  class="form-label" for="Gender"> Gender *</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Gender" id="Male" value="Male"
                                <?php if ($patientGender == 'Male') echo "checked"; ?> required disabled/>
                                <label class="form-check-label" for="Male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Gender" id="Female" value="Female"
                                <?php if ($patientGender == 'Female') echo "checked"; ?> required disabled/>
                                <label class="form-check-label" for="Female">Female</label>
                            </div>
                    </div>

                   

                    <div class="mb-4">
                        <label  class="form-label" for="RequiredDate">Date of Request *</label>
                        <input type="date" class="form-control"  name="InputOrderDate" style="width:350px" id="RequiredDate" 
                        value="<?php echo  $MedicineRequestedDate; ?>" required readonly/>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="DeliveryAddress"> Delivery Address *</label>
                        <input type="text" class="form-control"  name="InputDeliveryAddress" placeholder="Enter Delivery Address"
                         style="width:1000px" id="DeliveryAddress" value="<?php echo $deliveryAddress; ?>" required readonly/>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="comments"> Comments *</label>
                        <textarea type="text" class="form-control"  name="InputComments" placeholder="Enter Comments"
                         style="width:1000px"  id="comments" required readonly><?php echo $comments; ?></textarea>
                    </div>

                    

                    <div class="mb-4">
                        <label class="form-label" for="AssignedDeliveryPersonName">Assigned Delivery Person Name *</label>
                        <input type="text" class="form-control"  name="InputAssignedDeliveryPersonName" placeholder="Enter Assigned Delivery Person Name"
                         style="width:1000px" id="AssignedDeliveryPersonName" value="<?php echo $assigneDelivPerson; ?>" required/>
                    </div>

                    <div class="mb-4">
                    <label  class="form-label">Edit Delivery Status *</label>
                    <select  class="form-select" name="InputDeliveryStatus" style="width:350px"  required>
                          <?php echo "<option value='". $deliveryStatus."'>" .$deliveryStatus ."</option>"; ?>
                          <option value="Pending...">Pending...</option>
                          <option value="Delivery Person Assigned">Delivery Person Assigned</option>
                          <option value="Delivered">Delivered</option>
                    </select>     
                    </div>

                    <button type="reset" name="rest" id="resetToPending"  class="btn btn-light" style="background-color:#ff0059; 
                    color: white" >Reset Input Fields</button>&nbsp;&nbsp;&nbsp;&nbsp;

                    <button type="submit" name="submit" class="btn btn-success">Change Delivery Status</button>

                   <!-- <script>

                      document.getElementById("resetToPending").addEventListener("click", changeDeliveryStatus);

                      function changeDeliveryStatus() {
                          document.getElementById("AssignedDeliveryPersonName").value = "Pending...";
                      }
                      </script>-->

                   
                    

            </form>
    </div>

</div>
    
</section>

                     




  </body>
</html>