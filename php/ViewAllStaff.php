<?php

if(isset($_POST['search'])){
    $valueToSearch=$_POST['valueToSearch'];
    $query="SELECT * FROM `staff` WHERE CONCAT(`staffID`,`name`,`email`,`hometown`,`phone`,`position`) LIKE '%".$valueToSearch."%'";
    $search_result=filterTable($query);
}
else{
    $query="select * from `staff`";
    $search_result=filterTable($query);

}

function filterTable($query){
    $con=mysqli_connect('localhost','root','','pharmacy');
    $filter_Result=mysqli_query($con,$query);
    return $filter_Result;
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/viewallstaff.css">

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
            <li><a class="active" href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="ContactUs.php">Contact Us</a></li>
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
        <a href="ViewAllStaff.php"><i class="fa-solid fa-users"></i><span>Manage Staff</span></a>
        <a href="#"><i class="fa-solid fa-people-roof"></i><span>Manage Suppliers</span></a>
        <a href="#"><i class="fa-solid fa-chart-bar"></i><span>Manage Sales</span></a>
        <a href="displayPrescriptions.php"><i class="fa-solid fa-file-prescription"></i><span>Manage
                Prescriptions</span></a>

    </div>
    <!--sidebar end-->
    <section></section>

    <!--nav close-->



    <ul>
        <h1 style="text-align:center;"><b>STAFF MEMBERS</b></h1>
    </ul>

    <br>
    <div class="container" style="padding-left:200px;">
        <!--<div class="container">-->
        <div class="rightdiv col-md-7 mt-7 mb-5 mr-0 ">
            <form method=" POST">
                <div class="input-group mb-3 ml-1">
                    <input type="text" name="valueToSearch"
                        value="<?php if(isset($_GET['search'])) {echo $_GET['search'];}?>" class="form-control"
                        placeholder="Search">
                    <button type="submit" class="btn btn-primary" name="search">Search</button>
                </div>
            </form>
        </div>
        <!--<div class="container float-left">-->
        <div class="leftdiv col-md-7 mt-7 mb-5 mr-0">
            <button class="btn btn-primary"><a href="AddStaff.php" class=" btn_link text-light">Add Staff
                    Member</a></button>
        </div>
        <!--</div>-->

        <table class="center">
            <thead style="background: 	#0d6efd; color:white;">
                <tr>
                    <th scope="col">Staff Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Home town</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Position</th>
                    <th scope="col">Operations</th>
                </tr>

            </thead>
            <tbody>
                <?php 
                    //$index=1;
                    while($row=mysqli_fetch_array($search_result)):
                        $id=$row['staffID'];
                        $name=$row['name'];
                        $email=$row['email'];
                        $hometown=$row['hometown'];
                        $phone=$row['phone'];
                        $position=$row['position'];
                    ?>
                <?php
                            echo '<tr>
                    
                            <th scope="row">.<a href="ViewStaffMember.php?clickid='.$id.'" class="text-dark">'.$id.'</th>
                            <td>'.$name.'</td>
                            <td>'.$email.'</td>
                            <td>'.$hometown.'</td>
                            <td>'.$phone.'</td>
                            <td>'.$position.'</td>
                            <td>
                                <button class="btn btn-primary"><a href="UpdateStaff.php?updateid='.$id.'" class="text-light">Update</a></button>
                                <button class="btn btn-danger"><a href="DeleteStaff.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                            </td>
                            </tr>';
                    ?>
                <?php endwhile;?>

            </tbody>
        </table>

        <button class="btn btn-primary mt-5 mb-5 float-right"><a href="StaffReport.php"
                class="btn_link text-light">Generate
                Report
                Member</a></button>

    </div>
</body>

</html>