<?php
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(! empty($user_name)&& !empty($password)&& !is_numeric($user_name))
    {
        //read from database
        $query = "select * from users where user_name= '$user_name' limit 1";
        $result = mysqli_query($con, $query);
        
        if($result)
        {
            if($result && mysqli_num_rows($result) >0)
        {
          $users_data = mysqli_fetch_assoc($result);
          if($users_data['password'] === $password  )
          {
            $_SESSION['user_id'] = $users_data['user_id'];
              header("Location: Admin_home.php");
              die;
          }
         }
        }
        echo  '<script>alert ("Wrong Username Or Password !")</script>' ;
    }else
    {
       echo  '<script>alert ("Wrong Username Or Password !")</script>' ;
    }

}

?>

<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="../css/login1.css"> 
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />  
</head>
<body>
 <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">HEALTH CARE</label>
     
      <ul>
        <li><a style="text-decoration: none" class="text-light" href="Homepage.php">Home</a></li>
        <li><a style="text-decoration: none" class="text-light" href="Aboutus.php">About Us</a></li>
		 <li><a style="text-decoration: none" class="text-light" href="ContactUs.php">Contact Us</a></li>
        <li><a style="text-decoration: none" class="text-light" href="addPrescription.php">Online Pharamacy Services</a></li>
        
      </ul>
    </nav>
	
    
    <style type="text/css"> 
        
        #box{
            background-color: gray;
            margin: auto;
            width: 500px;
            opacity: 0.9;
			height:350px;
            padding: 20px;
			margin-top:150px;
      
        }
        body{
          background: url(../Images/staff/staff13.jpg) no-repeat;
    background-size: cover;
        }
       

    </style>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px; 
                        margin: 10px;
                        color:white;" align="center">Admin Login</div>
            <lable><b>User Name</b></lable>
            <input id="Username" class="form-control" type="text" name="user_name"><br><br>
			<lable><b>Password</b></lable>
            <input id="Passsword" class="form-control" type="password" name="password"><br><br>
			
		    <input class="btn btn-primary" type="submit" value="Login" ><br><br>
			
            
    </form>
    </div>
	
	
    <div class="footer">

      <div class="strokeme1">
      <b><u>Hours of Operation</b></u></br>
      Avaliable from 9AM to 7PM from</br>
      Monday to Saturaday</br>
      Order will be delivered within 48</br>
      hours of orders.</br>
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