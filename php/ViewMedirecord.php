<?php
include 'Connect_medicine.php';
$id=$_GET['clickid'];
$sql="select * from `medi` where id=$id";
$result= mysqli_query($con,$sql);
$row= mysqli_fetch_assoc($result);
$name=$row['name'];
$quantity=$row['quantity'];
$manufacture=$row['manufacture'];
$expiry=$row['expiry'];
$brand=$row['brand'];
$type=$row['type'];

if(isset($_POST['update'])){
   $name=$_POST['name'];
   $quantity=$_POST['quantity'];
   $manufacture=$_POST['manufacture'];
   $expiry=$_POST['expiry'];
   $brand=$_POST['brand'];
   $type=$_POST['type'];

    $sql="update `medi` set id=$id,name='$name',quantity='$quantity',manufacture='$manufacture',expiry='$expiry',brand='$brand',type='$type'  where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "Data Updated successfully";
        
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
    <link rel="stylesheet" href="../css/medicine.css">

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
            <li><a class="active" href="Homepage.php">Home</a></li>
            <li><a href="Aboutus.php">About Us</a></li>
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
        <h1 style="text-align:center;"><b>MEDICINE DETAIL</b></h1>
    </ul>


    <div class="container my-7" style="padding-left:150px;">
        <form method="post">
            <div class="form-group mb-6">
                <label class="form_lbl">Name</label>
                <input type="text" class="form-control" name="name" autocomplete="off" readonly
                    value=<?php echo $name;?>>
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl">Quantity</label>
                <input type="text" class="form-control" name="quantity" autocomplete="off" readonly
                    value=<?php echo $quantity;?>>
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl">Manufavture Date</label>
                <input type="date" class="form-control" name="manufacture" autocomplete="off" readonly
                    value=<?php echo $manufacture;?>>
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl">Expiry Date</label>
                <input type="date" class="form-control" name="expiry" autocomplete="off" readonly
                    value=<?php echo $expiry;?>>
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl">Brand Name</label>
                <input type="text" class="form-control" name="brand" autocomplete="off" readonly
                    value=<?php echo $brand;?>>

            </div>

            <div class="form-group mb-6">
                <label class="form_lbl">Type</label>
                <input type="text" class="form-control" name="type" autocomplete="off" readonly
                    value=<?php echo $type;?>>

            </div>


            <!--<button type="update" class="btn btn-primary " name="update">Update</button>-->
        </form>
    </div>

</body>

</html>