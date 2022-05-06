<?php
include 'conn.php';

$error = '';
$name = '';
$email = '';
$hometown = '';
$phone = '';
$position = '';

function clean_text($string){
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

/*function validate_number($phone){
    if(preg_match('/^[0-9]{10}+$/', $phone)) {
        // the format /^[0-9]{11}+$/ will check for phone number with 11 digits and only numbers
        echo "Phone Number is Valid <br>";
    }   else{
        echo "Enter Phone Number with correct format <br>";
        }
    }*/

if(isset($_POST['submit'])){
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
            $error .= '<p><label class="text-danger" style="font-weight: bold;" >Invalid email format</label></p>';
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
        $phone = $_POST['phone'];
        if(!preg_match("/^([0-9]{10})$/",$phone))
        {
            $error .= '<p><label class="text-danger" style="font-weight: bold;">Invalid mobile number</label></p>';
        }
    }
    

    if(empty($_POST['position'])){
        $error .= '<p><label class="text-danger" style=font-weight:bold;">Please Select your position</label></p>';
    }
    else{
        $position = clean_text($_POST["position"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$position))
        {
            $error .= '<p><label class="text-danger" style="font-weight:bold;">Only letters and white space allowed</label></p>';
        }
    }

    if($error == ''){
        $sql="insert into `staff` (name,email,hometown,phone,position) values('$name','$email','$hometown','$phone','$position')";
        $result=mysqli_query($con,$sql);
        if($result){
        //echo "Data inserted successfully";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="../css/addstaff.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>ADD STAFF MEMBER</title>


    <style>
    .container {
        background: ;
        ;

    }

    .form-control {
        width: 600px;
    }

    .form_lbl {
        font-size: 20px;
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

    <!--nav close-->



    <ul>
        <h1 style="text-align:center;"><b>ADD STAFF MEMBER DETAILS </b></h1>
    </ul>

    <div class="container my-5" style="padding-left:200px;">
        <?php echo $error; ?>
        <form method="post">
            <div class="form-group mb-6">
                <label class="form_lbl"><b>Name</b></label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off"
                    value="<?php echo $name; ?>">
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl"><b>Email</b></label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off"
                    value="<?php echo $email; ?>">
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl"><b>Home town</b></label>
                <input type="text" class="form-control" placeholder="Enter your hometown" name="hometown"
                    autocomplete="off" value="<?php echo $hometown; ?>">
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl"><b>Phone</b></label>
                <input type="text" class="form-control" placeholder="Enter your phone" name="phone" autocomplete="off"
                    value="<?php echo $phone; ?>">
            </div>

            <div class="form-group mb-6">
                <label class="form_lbl"><b>Position</b></label>
                <select class="form-control" name="position" value="<?php echo $position; ?>">
                    <option value="">--Select--</option>
                    <option value="Manager">Manager</option>
                    <option value="Pharmacists">Pharmacists</option>
                    <option value="Delivery">Delivery</option>
                </select>
            </div>
            <br>

            <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>