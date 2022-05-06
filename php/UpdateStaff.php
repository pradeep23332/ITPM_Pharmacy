<?php
include 'conn.php';

$error = '';
$id=$_GET['updateid'];
$sql="select * from `staff` where staffID=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$hometown=$row['hometown'];
$phone=$row['phone'];
$position=$row['position'];



/*$name = '';
$email = '';
$hometown = '';
$phone = '';
$position = '';*/

function clean_text($string){
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if(isset($_POST['update'])){
    /*$name=$_POST['name'];
    $email=$_POST['email'];
    $hometown=$_POST['hometown'];
    $phone=$_POST['phone'];
    $position=$_POST['position'];*/

    if(empty($_POST['name'])){
        $error .= '<p><label class="text-danger" style="font-weight: bold;">Please Enter your Name</label></p>';
    }
    else{
        $name = clean_text($_POST["name"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$name))
        {
            $error .= '<p><label class="text-danger" style="font-weight: bold;">Only letters and white space allowed</label></p>';
        }
    }

    if(empty($_POST['email'])){
        $error .= '<p><label class="text-danger" style="font-weight: bold;">Please Enter your Email</label></p>';
    }
    else{
        $email = clean_text($_POST["email"]);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $error .= '<p><label class="text-danger" style="font-weight: bold;">Invalid email format</label></p>';
        }
    }

    if(empty($_POST['hometown'])){
        $error .= '<p><label class="text-danger" style="font-weight: bold;">Please Enter your Home town</label></p>';
    }
    else{
        $hometown = clean_text($_POST["hometown"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$hometown))
        {
            $error .= '<p><label class="text-danger" style="font-weight: bold;">Only letters and white space allowed</label></p>';
        }
    }

    if(empty($_POST['phone'])){
        $error .= '<p><label class="text-danger" style="font-weight: bold;">Please Enter your Phone number</label></p>';
    }
    else{
        $phone = clean_text($_POST['phone']);
        if(!preg_match("/^([0-9]{10})$/",$phone))
        {
            $error .= '<p><label class="text-danger" style="font-weight: bold;">Invalid mobile number</label></p>';
        }
    }
    

    if(empty($_POST['position'])){
        $error .= '<p><label class="text-danger" style="font-weight: bold;">Please Select your position number</label></p>';
    }
    else{
        $position = clean_text($_POST["position"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$position))
        {
            $error .= '<p><label class="text-danger" style="font-weight: bold;">Only letters and white space allowed</label></p>';
        }
    }

    if($error == ''){
        $sql="update `staff` set staffID=$id,name='$name',email='$email',hometown='$hometown',phone='$phone',position='$position' where staffID=$id";
        $result=mysqli_query($con,$sql);
        if($result){
            //echo "Data Updated successfully";
            header('location:ViewAllStaff.php');
        }else{
            die(mysqli_error($con));
        }

        $name = '';
        $email = '';
        $hometown = '';
        $phone = '';
        $position = '';
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
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/updatestaff.css">

    <style>
    .container {
        background: ;

    }

    .form-control {
        width: 600px;
        font-weight: bold;
    }

    .form_lbl {
        font-size: 20px;
        font-weight: bold;
        margin-top: 20px;
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
        <a href="Display_medicine.php"><i class="fa-solid fa-pills"></i><span>Manage Medicines</span></a>
        <a href="ViewAllStaff.php"><i class="fa-solid fa-users"></i><span>Manage Staff</span></a>
        <a href="displaySupplier.php"><i class="fa-solid fa-people-roof"></i><span>Manage Suppliers</span></a>
        <a href="displaySales.php"><i class="fa-solid fa-chart-bar"></i><span>Manage Sales</span></a>
        <a href="displayPrescriptions.php"><i class="fa-solid fa-file-prescription"></i><span>Manage
                Prescriptions</span></a>

    </div>
    <!--sidebar end-->
    <section></section>

    <ul>
        <h1 style="padding-left:200px;"><b>STAFF MEMBERS</b></h1>
    </ul>

    <div class="container my-5" style="padding-left:200px;">
        <?php echo $error; ?>
        <form method="post">
            <div class="form-group mb-6">
                <label class="form_lbl">Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off"
                    value=<?php echo $name;?>>
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl">Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off"
                    value=<?php echo $email;?>>
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl">Home town</label>
                <input type="text" class="form-control" placeholder="Enter your hometown" name="hometown"
                    autocomplete="off" value=<?php echo $hometown;?>>
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl">Phone</label>
                <input type="text" class="form-control" placeholder="Enter your phone" name="phone" autocomplete="off"
                    value=<?php echo $phone;?>>
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl">Position</label>
                <select class="form-control" name="position">
                    <?php echo "<option value='". $position."'>" .$position ."</option>"; ?>
                    <option value="">--Select--</option>
                    <option value="Manager">Manager</option>
                    <option value="Pharmacists">Pharmacists</option>
                    <option value="Delivery">Delivery</option>
                </select>
            </div>

            <br>
            <button type="update" class="btn btn-primary btn-lg" name="update">Update</button>
        </form>
    </div>

</body>

</html>