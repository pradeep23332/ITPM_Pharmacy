<?php
   
    if(isset($_POST['search'])){
        $valueToSearch = $_POST['valueToSearch'];
        $query = "SELECT * FROM `supplier_management` WHERE CONCAT(`supplierID`,`supplierName`,`companyName`,`supplierAddress`,`supplierEmail`,`supplierPhone`,`registeredDate`,`supplierDescription`,`postalCode`) LIKE '%".$valueToSearch."%' " ;
        $search_result = filterTable ($query);
   
    }else{
        $query = "SELECT * FROM `supplier_management`";
        $search_result = filterTable ($query);
    }

    function filterTable($query){
        $con = mysqli_connect("localhost","root","","pharmacy");
        $filter_Result = mysqli_query($con,$query);
        return $filter_Result;

    }    
    
    

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/dabbda7d23.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../styles/displayPrescriptions.css"/>

    <title>Display All Suppliers</title>
    
  </head>
  <body>

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
      <a href="ViewAllStaff.php"><i class="fa-solid fa-users"></i><span>Manage Staff</span></a> 
      <a href="displaySupplier.php"><i class="fa-solid fa-people-roof"></i><span>Manage Suppliers</span></a>          
      <a href="displaySales.php"><i class="fa-solid fa-chart-bar"></i><span>Manage Sales</span></a>    
      <a href="displayPrescriptions.php"><i class="fa-solid fa-file-prescription"></i><span>Manage Prescriptions</span></a>   
      
    </div>
    <!--sidebar end-->

    <section >
            <div style=" background: url(../Images/supbg2.jpg) no-repeat; background-size: cover; padding-top:80px; padding-bottom:280px; padding-left:18px;" >

                <div class="row">
                    <div class="col-lg-9 mt-2 mb-2"><br/>
                            <h4 style="color:#0091ff">All Supplier Records</h4>
                           
                    </div>
                    <div class="col-lg mt-2 mb-2">
                        <form action="displaySupplier.php" method="post">
                            <input
                                class="form-control"
                                type="text"
                                placeholder="Search"
                                name="valueToSearch"
                            /><br/>

                            <input type="submit" name="search" value="Search" class="btn btn-info" style="color:white"/>
                        </form>
                    </div>
                </div>
                <hr style="color:#00aeff"/>
            
                <br/><br/>
                
                <div >
                <table class="table">
                    <thead  style="color:#00a6ff"> 
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Supplier ID</th>
                            <th scope="col">Supplier Name</th>
                            <th scope="col">Supplier Address</th>
                            <th scope="col">Supplier E-mail</th>
                            <th scope="col">Registered Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php

                                $index=1; 

                                    while($row=mysqli_fetch_array($search_result)):
                                        $supplierID = $row['supplierID'];
                                        $supplierName = $row['supplierName'];
                                        $supplierAddress = $row['supplierAddress'];
                                        $supplierEmail = $row['supplierEmail'];
                                        $registeredDate = $row['registeredDate']; ?>

                                        <tr style="color:#000000">

                                        <th scope="row">
                                            <?php

                                                echo $index;
                                                $no=$index++;
                                        
                                            ?>
                                        </th>

                                        <?php

                                        echo '

                                        <td>
                                        <a href="singleSupplier.php?singleSupplierID='.$supplierID.'" style="text-decoration: none">
                                        '.$supplierID.'
                                        </a>
                                        </td>
                                        <td>'.$supplierName.'</td>
                                        <td>'.$supplierAddress.'</td>
                                        <td>'.$supplierEmail.'</td>
                                        <td>'.$registeredDate.'</td>
                            
                                        <td>

                                        <button class="btn btn-warning" style="color: white">
                                        <a php href="editSupplier.php?editSupplierId='.$supplierID.'" style="text-decoration: none" class="text-light">
                                        Edit Supplier Details
                                        </a>
                                        </button> 

                                        <br/><br/>

                                        <button class="btn btn-danger">
                                        <a php href="deleteSupplier.php?deleteSupplierId='.$supplierID.'" style="text-decoration: none" class="text-light">
                                        Delete Supplier Details
                                        </a>
                                        </button>
   
                                        </td>

                                        '

                                        ?>
                                        
                                        </tr>

                                        <?php
                                         endwhile;
                                            
                                            ?>
                                        
                                
                    </tbody>

                </table>

                </div>

                <h5 style="color:#00b395">No. Of Prescription Records: <?php echo $no;?></h5> 
                <br><br>
                <button class="btn btn-primary">
                    <a href="addSupplier.php" class="text-light" style="text-decoration: none">
                    Add New Supplier
                    </a> 
                </button> <br><br>

                <form action="supplierExcel.php" method="POST">
                    <input type="submit" name="export_excelSupplier" class="btn btn-success" value="Export to Excel">                                
                </form>


             

             </div>
            </section>


   
  </body>

</html>