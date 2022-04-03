<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Details </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="../css/searchmedi.css">
    <style>
        
       table,th,td{
           border: 2px solid black;
           width:1100px;
           height: 50px;
           background-color: yellow;
           text-align:center;
       }
      .form-control{
           background-color:lightblue;
           
       }

    </style>



</head>
<body>
<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">HEALTH CARE</label>
     
      <ul>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
		 <li><a href="#">Contact Us</a></li>
        <li><a href="#">Online Pharamacy Services</a></li>
        <li><a href="logout.php">Log Out</a></li>        
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
    <br/>
    <h1> <center>SEARCH MEDICINE DETAILS</center></h1>
    <br/>
    <div class="container"style="padding-left:180px;">
        <form action="" method="POST">
            <input type="text" name="name" class="form-control" placeholder="Enter Medicine Name"/> <br/><br/>
            <input type="submit" name="search"class="btn btn-primary" value="Search Details"/>
        </form> 

        <table>

          <tr>
               <th> Medicine ID </th>
               <th> Name </th>
               <th> Quantity </th>
               <th> Manufacture Date </th>
               <th> Expiry Date </th>
               <th> Brand Name </th>
               <th> Type </th>
               
          
               
         </tr><br>


         <?php
         $connection = mysqli_connect('localhost','root','');
         $db = mysqli_select_db($connection,'pharmacy');

         if(isset($_POST['search']))
         {
             $name = $_POST['name'];

             $query = "select * from medi where name='$name' "; 
             $query_run = mysqli_query($connection,$query);


             while($row = mysqli_fetch_array($query_run))
             {
                 ?>
                 <tr>
                     <td> <?php echo $row['id']; ?> </td>
                     <td> <?php echo $row['name']; ?> </td>
                     <td> <?php echo $row['quantity']; ?> </td>
                     <td> <?php echo $row['manufacture']; ?> </td>
                     <td> <?php echo $row['expiry']; ?> </td>
                     <td> <?php echo $row['brand']; ?> </td>
                     <td> <?php echo $row['type']; ?> </td>

                 </tr>

                 <?php
             }

         }




         ?>




        </table>
<br/><br/>
        <button class="btn btn-success"><a href="Display_medicine.php"class="text-white">Back To Details</a> </button>






</body>
</html>