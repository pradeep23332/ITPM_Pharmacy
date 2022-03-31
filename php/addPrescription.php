<?php
  include 'connect.php';

  date_default_timezone_set("Asia/Colombo");

  if(isset($_POST['submit'])){

      $dir = 'uploads/';
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
            $comments=$_POST['InputComments'];

            $sql="INSERT INTO `prescriptionmanagement` (patientName,age,gender,email,phone,orderDate,deliveryAddress,comments,prescriptionPhoto)
                  VALUES ('$patientName','$patientAge','$gender','$email','$contactNumber','$orderDate','$deliveryAddress','$comments','{$image_path}') ";

            $result=mysqli_query($con,$sql);

            if($result){
                   //echo'<script>alert("Prescription Added Successfully!")</script>';
                   header('location:prescriptionSubmitSuccess.php');
                   echo'<div class="alert alert-success" role="alert">
                   Prescription Added Successfully!
                    </div>';
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

    <link rel="stylesheet" href="../styles/addPrescriptions.css" />

    <title>Add Prescription</title>
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
        <li><a href="logout.php">Admin Login</a></li>        
      </ul>
    </nav>


    <section  style="background: url(../Images/pres4.jpg) no-repeat; height: auto; background-size: cover; padding-top: 80px; padding-bottom: 140px; ">
    <div >
    <div  class="container" >

        <h1 class="h3 mb-3 font-weight-normal" style="color:#ffffff">Online Pharmacy Service</h1><hr style="color:#ffffff" />

            <form  action="addPrescription.php" method="POST" enctype="multipart/form-data">


                    <h5 style="color:#007da3"><b>Contact Information</b></h5><br>

                    <div class="mb-4">
                        <label  class="form-label" for="Email">Enter Your E-mail *</label>
                        <input type="email" class="form-control" name="InputEmail"
                         placeholder="Enter E-mail" style="width:1000px" id="Email"
                         pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)" required/>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="ContactNumber">Enter Your Contact Number (0xx-yyyyyyy) *</label>
                        <input type="text" class="form-control"  name="InputContactNumber" placeholder="Enter Contact Number"
                         style="width:1000px" id="ContactNumber" pattern="[0-9]{3}-[0-9]{7}" required/>
                    </div>

                    <h5 style="color:#007da3"><b>Prescription Information</b></h5><br>


                    <div class="mb-4">
                        <label class="form-label" for="PatientName">Enter Patient Name *</label>
                        <input type="text" class="form-control"  name="InputPatientName" placeholder="Enter Patient Name" style="width:1000px" id="PatientName" required/>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="PatientAge">Enter Patient Age *</label>
                        <input type="number" class="form-control"  name="InputPatientAge" placeholder="Enter Patient Age" style="width:1000px" id="PatientAge" required min="0"/>
                    </div>


                    <div class="mb-4">
                        <label  class="form-label" for="Gender">Select Gender *</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Gender" id="Male" value="Male">
                                <label class="form-check-label" for="Male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Gender" id="Female" value="Female">
                                <label class="form-check-label" for="Female">Female</label>
                            </div>
                    </div>

                    

                    <div class="mb-4">
                        <label  class="form-label" for="OrderDate">Date Of Request *</label>
                        <input type="date" class="form-control"  name="InputOrderDate" style="width:350px"
                        value="<?php echo date('Y-m-d');?>" id="OrderDate" required/>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="DeliveryAddress">Enter Delivery Address *</label>
                        <input type="text" class="form-control"  name="InputDeliveryAddress" placeholder="Enter Delivery Address" style="width:1000px" id="DeliveryAddress" required/>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="comments">Enter Comments (Ex: Symptoms Of The Sickness) *</label>
                        <textarea type="text" class="form-control"  name="InputComments" placeholder="Enter Comments" style="width:1000px"  id="comments" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="prescription">Upload Prescription Image *</label>
                        <input type="file"  name="imageFile" class="form-control" style="width:350px"  id="prescription" required/>
                    </div>

                    <button type="reset" name="reset" class="btn btn-light" style="background-color:#ff0059; 
                        color: white">Reset Input Fields</button>&nbsp;&nbsp;&nbsp;&nbsp;

                    <button type="submit" name="submit" class="btn btn-success">Submit Prescription Details</button>
                              

            </form>
            </div>  

        </div>

    </section>
    
    <div class="footer">

                        <div class="strokeme1">
                     <b><u>Hours of Operation</b></u></br>
                     Avaliable from 9AM to 7PM from</br>
                       Monday to Saturaday</br>
                         Order will be delivered within 48</br>
                          hours of orders.</br>
                      </div>
      
      
                        <div class="strokeme2">
                         <b><u>Contact Us</b></u></br>
                          Mobile:071 5689745</br>
                            Work:031 5688554</br>
                            Email:healthcare@ph.lk
                          </div>
                          
      </div>                      


  </body>
</html>