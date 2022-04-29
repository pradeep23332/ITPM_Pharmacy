<?php
include 'conn.php';
$id=$_GET['clickid'];
$sql="select * from `staff` where staffID=$id";
$result= mysqli_query($con,$sql);
$row= mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$hometown=$row['hometown'];
$phone=$row['phone'];
$position=$row['position'];

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $hometown=$_POST['hometown'];
    $phone=$_POST['phone'];
    $position=$_POST['position'];

    $sql="update `staff` set staffID=$id,name='$name',email='$email',hometown='$hometown',phone='$phone',position='$position' where staffID=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "Data Updated successfully";
        //header('location:ViewAllStaff.php');
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/viewstaffmember.css">

    <style>
    .container {
        background: ;
        ;

    }

    .form-control {
        width: 600px;
        font-weight: bold;
    }

    .form_lbl {
        font-size: 20px;
        font-weight: bold;
    }
    </style>

    <title></title>
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
        <a href="displaySupplier.php"><i class="fa-solid fa-people-roof"></i><span>Manage Suppliers</span></a>
        <a href="displaySales.php"><i class="fa-solid fa-chart-bar"></i><span>Manage Sales</span></a>
        <a href="displayPrescriptions.php"><i class="fa-solid fa-file-prescription"></i><span>Manage
                Prescriptions</span></a>

    </div>
    <!--sidebar end-->
    <section></section>

    <!--nav close-->



    <ul>
        <h1 style="text-align:center;"><b>STAFF MEMBER</b></h1>
    </ul>


    <div class="container my-7" style="padding-left:150px;">
        <form method="post">
            <div class="form-group mb-6">
                <label class="form_lbl">Name</label>
                <input type="text" class="form-control" name="name" autocomplete="off" readonly
                    value=<?php echo $name;?>>
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl">Email</label>
                <input type="email" class="form-control" name="email" autocomplete="off" readonly
                    value=<?php echo $email;?>>
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl">Home town</label>
                <input type="text" class="form-control" name="hometown" autocomplete="off" readonly
                    value=<?php echo $hometown;?>>
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl">Phone</label>
                <input type="text" class="form-control" name="phone" autocomplete="off" readonly
                    value=<?php echo $phone;?>>
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl">Position</label>
                <input type="text" class="form-control" name="position" autocomplete="off" readonly
                    value=<?php echo $position;?>>

            </div>


            <!--<button type="update" class="btn btn-primary " name="update">Update</button>-->
        </form>
    </div>

</body>

</html>