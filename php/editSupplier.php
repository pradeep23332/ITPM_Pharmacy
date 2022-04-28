<?php
  include 'connect.php';

    $id=$_GET['editSupplierId'];

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
    

  if(isset($_POST['submit'])){

      /*$dir = 'uploads/';
      $image_path = $dir.basename($_FILES['imageFile']['name']);

      if(move_uploaded_file($_FILES['imageFile']['tmp_name'],$image_path)){
          echo "Uploaded Successfully";
      }*/

            $supplierName=$_POST['InputSupplierName'];
            $companyName=$_POST['InputCompanyName'];
            $supplierAddress=$_POST['InputSupplierAddress'];
            $supplierEmail=$_POST['InputSupplierEmail'];
            $supplierContactNumber=$_POST['InputSupplierContactNumber'];
            $registeringDate=$_POST['InputRegisteringDate'];
            $supplierDescription=$_POST['InputSupplierDescription'];
            $postalCode=$_POST['InputPostalCode'];
       

            $sql= "UPDATE supplier_management
                   SET supplierName = '$supplierName', companyName = '$companyName', supplierAddress = '$supplierAddress',
                       supplierEmail='$supplierEmail', supplierPhone=' $supplierContactNumber' , registeredDate='$registeringDate',
                       supplierDescription='$supplierDescription', postalCode=' $postalCode'
                   WHERE supplierID= $id";

            $result=mysqli_query($con,$sql);

            if($result){
                   echo'<script>alert("Supplier Record Updated Successfully!")</script>';
                   header('location:displaySupplier.php');
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

        <script src="https://kit.fontawesome.com/dabbda7d23.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../styles/updatePrescription.css"/>

    <title>Update Supplier Record</title>
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


    <section style=" background: url(../Images/supbg2.jpg) ; height:auto; background-size: cover; padding-top:80px;">

            <div  >
            <div class="container" >
            <form  method="POST" enctype="multipart/form-data">

                     <h4 style="color:#00aeff">Update Supplier Record Details</h4>
                     <hr style="color:#00aeff"/>

                     <div class="mb-4">
                        <label class="form-label" for="supplierName">Enter Supplier Name *</label>
                        <input type="text" class="form-control"  name="InputSupplierName" placeholder="Enter Supplier Name"
                         style="width:1000px" id="supplierName" value="<?php echo  $supplierName; ?>" required/>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="companyName">Enter Company Name (If Available) *</label>
                        <input type="text" class="form-control"  name="InputCompanyName" placeholder="Enter Company Name (If Available)"
                         style="width:1000px" id="companyName" value="<?php echo  $companyName; ?>"/>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="supplierAddress">Enter Supplier Address *</label>
                        <input type="text" class="form-control"  name="InputSupplierAddress" placeholder="Enter Supplier Address"
                         style="width:1000px" id="supplierAddress" value="<?php echo   $supplierAddress; ?>" required/>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="supplierEmail">Enter Supplier E-mail *</label>
                        <input type="email" class="form-control"  name="InputSupplierEmail" placeholder="Enter Supplier  E-mail"
                        pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)" style="width:1000px" id="supplierEmail"
                        value="<?php echo  $supplierEmail; ?>" required/>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="supplierContactNumber">Enter Supplier Contact Number (0xx-yyyyyyy) *</label>
                        <input type="tel" class="form-control"  name="InputSupplierContactNumber" placeholder="Enter Supplier Contact Number"
                         style="width:1000px" id="supplierContactNumber" pattern="[0-9]{3}-[0-9]{7}" 
                         value="<?php echo  $supplierPhone; ?>" required/>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="RegisteringDate">Select Registering Date *</label>
                        <input type="date" class="form-control"  name="InputRegisteringDate" value="<?php echo date('Y-m-d');?>" 
                        style="width:350px" id="RegisteringDate"
                        value="<?php echo   $registeringDate; ?>" required/>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="supplierDescription">Enter Supplier Description (Ex: Suppling Items) *</label>
                        <textarea type="text" class="form-control"  name="InputSupplierDescription" 
                        placeholder="Enter Supplier Description (Ex: Suppling Items)" style="width:1000px"  id="supplierDescription"
                        required><?php echo  $supplierDescription; ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label  class="form-label" for="postalCode">Enter Postal Code *</label>
                        <input type="number" class="form-control"  name="InputPostalCode" style="width:1000px"  placeholder="Enter Postal Code"
                        id="postalCode"  min="0" value="<?php echo  $postalCode; ?>" required/>
                    </div>

                    <button type="reset" name="reset" class="btn btn-light" style="background-color:#ff0059; 
                        color: white">Reset Input Fields</button>&nbsp;&nbsp;&nbsp;&nbsp;

                    <button type="submit" name="submit" class="btn btn-success">Submit Prescription Details</button>    

            </form>

            </div>
        </div>
        </section>    
        
  </body>
</html>