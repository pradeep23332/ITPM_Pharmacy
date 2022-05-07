<?php
include 'Connect_medicine.php';
if (isset($_POST['submit'])){
   $name=$_POST['name'];
   $quantity=$_POST['quantity'];
   $manufacture=$_POST['manufacture'];
   $expiry=$_POST['expiry'];
   $brand=$_POST['brand'];
   $type=$_POST['type'];

   $sql="insert into medi (name,quantity,manufacture,expiry,brand,type)
   values('$name','$quantity','$manufacture','$expiry','$brand','$type')";
   $result=mysqli_query($con,$sql);

   if($result){
      // echo "Data Inserted Succfully";
      header('location:Display_medicine.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/addmedi.css">
<title>ADD MEDICINE</title>

    <title>ADD MEDICINE DETAILS</title>
    
    <style>
     .container{
      background-color:none;
      
     }
    

    </style>

  </head>
    
    <body>
	<!--vav start-->
	 <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">HEALTH CARE</label>
     
      <ul>
      <li><a href="Homepage.php">home</a></li>
        <li><a href="Aboutus.php">About Us</a></li>
		    <li><a href="ContactUs.php">Contact Us</a></li>
        <li><a href="addPrescription.php">Online Pharamacy Services</a></li>
        <li><a class="active" href="login.php">Log Out</a></li>        
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
	
	<!--nav close-->
        

            <ul><h1>ADD MEDICINE DETAILS </h1></ul>
    
            <div class="container my-5"style="padding-left:200px;">
               <form method ="post">
                <br/>
            <div class="form-group">
            <label><b> Medicine Name</b> </label><br/>
            <input type="text" class="form-control" 
            placeholder="Enter Medicine Name" name ="name" 
            pattern="[A-Za-z]+"
             required>
            </div><br/>

            <div class="form-group">
            <label><b> Quantity </b></label><br/>
            <input type="text" class="form-control" 
            placeholder="Enter Quentity" name ="quantity" required>
            </div><br/>

            <div class="form-group">
            <label><b>Manufacture Date </b> </label><br/>
            <input type="date" class="form-control"name="manufacture" required>
            </div>
            <br/>

            <div class="form-group">
            <label><b>Expiry Date </b> </label><br/>
            <input type="date" class="form-control"name="expiry" required>
            </div>

             <br/>

            <div class="form-group">
            <label> <b>Brand Name </b></label><br/>
            <input type="text" class="form-control" 
            placeholder="Brand Name" name ="brand"  required>
            </div>
            <br/>
                          
            
            <div class="form-group ">
            <label> <b>Medicine Type<b> </label><br/>  
               <select class="form-select" name="type" required>
                  
                  <option selected>Choose Type</option>
                  <option value="Tablet">Tablet</option>
                  <option value="Syrup">Syrup</option>
                  <option value="Cream">Cream</option>
                  <option value="lotion">lotion</option>
                  <label class="input-group-text" for="inputGroupSelect02">Options</label>
                  </select>
               
 
        </div>
 
            <br/><br/>
            <button type="submit" class="btn btn-primary"name="submit">Submit</button>
    </form>
 </div>
        
        
   
    </body>




</html>