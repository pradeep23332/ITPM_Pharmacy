<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require_once('PHPMailer/PHPMailerAutoload.php');

$error = '';
$fullname = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string){
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if(isset($_POST["submit"])){

    if(empty($_POST["fullname"]))
    {
        $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
    }
    else
    {
        $fullname = clean_text($_POST["fullname"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$fullname))
        {
            $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
        }
    }
    
    if(empty($_POST["email"]))
    {
        $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
    }
    else
    {
        $email = clean_text($_POST["email"]);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $error .= '<p><label class="text-danger">Invalid email format</label></p>';
        }
    }

    if(empty($_POST["subject"]))
    {
        $error .= '<p><label class="text-danger">Subject is required</label></p>';
    }
    else
    {
        $subject = clean_text($_POST["subject"]);

    }

    if(empty($_POST["message"])){
        $error .= '<p><label class="text-danger">Message is required</label></p>';
    }else{
        $message = clean_text($_POST["message"]);
    }
    
    if($error ==''){
        
        require('PHPMailer/src/Exception.php');
        require('PHPMailer/src/PHPMailer.php');
        require('PHPMailer/src/SMTP.php');
        //require('PHPMailer/class.phpmailer.php');
        //require_once('PHPMailer/PHPMailerAutoload.php');
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '587';
        
        $mail->Username = 'suwasethavaccine2021@gmail.com';
        $mail->Password = 'suwavacc2021@';
        
        //sender information
        $mail->From = $_POST["email"];
        $mail->FromName = $_POST["fullname"];

        // Add a recipient
        $mail->AddAddress('healthcarepharmacyitpm@gmail.com','Name');
        $mail->AddCC($_POST["email"], $_POST["fullname"]);
        $mail->wordwrap = 50;
        $mail->IsHTML(true);
        $mail->Subject = $_POST["subject"];
        $mail->Body = $_POST["message"];

        if($mail->Send())
        {
            $error .= '<p><label class="text-success">Thank you for contacting</label></p>';
        }
        else
        {
            $error .= '<p><label class="text-danger">There is an Error</label></p>';
        }
        $fullname = '';
        $email = '';
        $subject = '';
        $message = '';
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/contact.css">

    <style>
    .contactlink {
        font-size: 24px;
        margin-bottom: 25px;
    }

    .sociallink:hover {
        background: #add8e6;
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

    <!--nav close-->

    <div class="container my-5" style="padding-left:250px;">

        <ul>
            <h1><b>SEND YOUR QUERY...</b></h1>
        </ul>
        <?php echo $error; ?>
        <form method="post">
            <div class="form-group">
                <label>Full Name *:</label>
                <input type="text" class="form-control" placeholder="Enter your full name" name="fullname" id="fullname"
                    autocomplete="off" value="<?php echo $fullname; ?>">
            </div>

            <div class="form-group">
                <label>Email *:</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email"
                    autocomplete="off" value="<?php echo $email; ?>">
            </div>

            <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control" placeholder="Enter Subject" name="subject" id="subject"
                    autocomplete="off" value="<?php echo $subject; ?>">
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" placeholder="Enter your Message" name="message" id="message" cols="30"
                    rows="10" value="<?php echo $message; ?>"></textarea>
            </div>

            <!--<div class="form-group">
                <label>Position</label>
                <select class="form-control" name="position">
                    <option value="">--Select--</option>
                    <option value="Manager">Manager</option>
                    <option value="Pharmacists">Pharmacists</option>
                    <option value="Delivery">Delivery</option>
                </select>
            </div>-->


            <button type="submit" class="btn btn-primary btn-lg" name="submit">Send Message</button>
            <br>
            <br>
        </form>
    </div>




    <div class="container my-5" style="padding-left:250px; margin-bottom: 100px;">

        <h1 style="text-align:center; margin-top:50px; text-align:left; margin-bottom: 45px;"><b>CONTACT US</b></h1>

        <div class="form-group">
            <img src="../Images/contact/facebook.png" alt="Facebook" width="48" height="48" float="left">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label class="contactlink"><a href="#" class="sociallink">Facebook</a></label>
        </div>

        <div class="form-group">
            <img src="../Images/contact/instergram.png" alt="Facebook" width="48" height="48" float="left">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label class="contactlink"><a href="#" class="sociallink">Intergram</a></label>
        </div>

        <div class="form-group">
            <img src="../Images/contact/twitter.png" alt="Facebook" width="48" height="48" float="left">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label class="contactlink"><a href="#" class="sociallink">Twitter</a></label>
        </div>

        <div class="form-group">
            <img src="../Images/contact/linkedin.png" alt="Facebook" width="48" height="48" float="left">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label class="contactlink"><a href="#" class="sociallink">LinkedIn</a></label>
        </div>

        <div class="form-group">
            <img src="../Images/contact/call.png" alt="phone" width="48" height="48" float="left">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label class="contactlink" style="color:#0073cf;">0701001000 <span style="color:#0073cf;">&#47;</span>
                0702002000</label>
        </div>

    </div>

    <div class="footer">

        <div class="strokeme1">
            <b><u>Hours of Operation</b></u></br>
            Avaliable from 9AM to 7PM from</br>
            Monday to Saturaday</br>
            Order will be delivered within 48</br>
            hours of orders.</br>
        </div>

        <div class="strokeme3">

            <ul class="icons">
                <li><i class="fab fa-facebook-f"></i></li>
                <li><i class="fab fa-twitter"></i></li>
                <li><i class="fab fa-linkedin"></i></li>
                <li><i class="fab fa-instagram"></i></li>
            </ul>
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