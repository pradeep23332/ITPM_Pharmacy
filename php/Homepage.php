<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Responsive Navbar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
	
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <div class="container">
    <div class="img1">
		
</div>
          
            
            
          

      
  </head>
  
  <!--this is home page-->
  <body>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
     
	
      <label class="logo">HEALTH CARE</label>
     
      <ul>
      
        <li><a class="active" href="#">Home</a></li>
        <li><a href="Aboutus.php">About Us</a></li>
		    <li><a href="#">Contact Us</a></li>
        <li><a href="addPrescription.php">Online Pharamacy Services</a></li>
        
      </ul>
    </nav>
    
   <br/>

   <!--image slider start-->
   <div class="slider">
      <div class="slides">
        <!--radio buttons start-->
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
        <input type="radio" name="radio-btn" id="radio5">
        <input type="radio" name="radio-btn" id="radio6">
        <!--radio buttons end-->
        <!--slide images start-->
        <div class="slide first">
          <img src="../Images/11.jpg" alt="">
        </div>
        <div class="slide">
          <img src="../Images/12.jpg" alt="">
        </div>
        <div class="slide">
          <img src="../Images/13.jpg" alt="">
        </div>
        <div class="slide">
          <img src="../Images/14.jpg" alt="">
        </div>
        <div class="slide">
          <img src="../Images/15.jpg" alt="">
        </div>
        <div class="slide">
          <img src="../Images/delivery.jpg" alt="">
        </div>
        <!--slide images end-->
        <!--automatic navigation start-->
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
          <div class="auto-btn4"></div>
          <div class="auto-btn5"></div>
          <div class="auto-btn6"></div>
        </div>
        <!--automatic navigation end-->
      </div>
      <!--manual navigation start-->
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
        <label for="radio5" class="manual-btn"></label>
        <label for="radio6" class="manual-btn"></label>
      </div>
      <!--manual navigation end-->
    </div>
    <!--image slider end-->

    <script type="text/javascript">
    var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 6){
        counter = 1;
      }
    }, 5000);
    </script>



  </br><br/>
  <div class="maincontainer">
     <div class="thecard">
       <div class="thefront"><h1>Welcome To Health Care</h1><br/><br/><center><h3>Srilanka's Largest online pharmacy service.</h3></center><br><center><h3>24 * 7  Customer Service.</h3></center></div>
       <div class="theback"><h1>Visit On Us</h1><br/><br/><h3> www.healthcare@ph.com</h3>
          </div>  

       </div>
       </div>

  <br/><br/>

  

      
    
       

      <div class ="container1">
      



      <div class="card">
         <div class="imgBx">
           <a href="#">
             <img src="../Images/amifostine.jpg">
          </a>
          <h2>Amifostine </h2>
          <br/>
          <p> Rs.500<p>
          
</div>
</div>


<div class="card">
         <div class="imgBx">
           <a href="#">
             <img src="../Images/baclofen.jpg">
          </a>
          <h2>Baclofen </h2>
          <br/>
          <p> Rs.800<p>
          
</div>
</div>

<div class="card">
         <div class="imgBx">
           <a href="#">
             <img src="../Images/amoxicllin.jpeg">
          </a>
          <h2>Amoxiclling </h2>
          <br/>
          <p> Rs.300<p>
          
</div>
</div>

<div class="card">
         <div class="imgBx">
           <a href="#">
             <img src="../Images/Hydralazine.jpg">
          </a>
          <h2>Hydralazine</h2>
          <br/>
          <p> Rs.1090<p>
          
</div>
</div>
<div class="card">
         <div class="imgBx">
           <a href="#">
             <img src="../Images/Clindamycin.jpg">
          </a>
          <h2>Clindamycin </h2>
          <br/>
          <p> Rs.620<p>
          
</div>
</div>

<div class="card">
         <div class="imgBx">
           <a href="#">
             <img src="../Images/Diclofenac.jpg">
          </a>
          <h2>Dapsone</h2>
          <br/>
          <p> Rs.560<p>
          
</div>
</div>

<div class="card">
         <div class="imgBx">
           <a href="#">
             <img src="../Images/Labetalol.jpeg">
          </a>
          <h2>Labetalol </h2>
          <br/>
          <p> Rs.800<p>
          
</div>
</div>

<div class="card">
         <div class="imgBx">
           <a href="#">
             <img src="../Images/Enalapril.jpeg">
          </a>
          <h2>Enalapril </h2>
          <br/>
          <p> Rs.410<p>
          
</div>
</div>

<div class="card">
         <div class="imgBx">
           <a href="#">
             <img src="../Images/Famciclovir.jpeg">
          </a>
          <h2>Famciclovir </h2>
          <br/>
          <p> Rs.300<p>
          
</div>
</div>

<div class="card">
         <div class="imgBx">
           <a href="#">
             <img src="../Images/Hydralazine.jpeg">
          </a>
          <h2>Hydralazine </h2>
          <br/>
          <p> Rs.700<p>
          
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
      
      <ul class = "icons">
            <li><i class = "fab fa-facebook-f"></i></li>
            <li><i class = "fab fa-twitter"></i></li>
            <li><i class = "fab fa-linkedin"></i></li>
            <li><i class = "fab fa-instagram"></i></li>
          </ul>
      </div>
      
      <button class="btn btn-success"><a href="Admin_home.php"class="text-white">Admin Login</a> </button>
      <div class="strokeme2">
        <b><u>Contact Us</b></u></br>
        Mobile:071 5689745</br>
        Work:031 5688554</br>
        Email:healthcare@ph.lk
      </div>
      
      </div>
  </body>
</html>