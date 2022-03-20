<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="select * from medi where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$quantity=$row['quantity'];
$manufacture=$row['manufacture'];
$expiry=$row['expiry'];
$brand=$row['brand'];
$type=$row['type'];





if (isset($_POST['submit'])){
   $name=$_POST['name'];
   $quantity=$_POST['quantity'];
   $manufacture=$_POST['manufacture'];
   $expiry=$_POST['expiry'];
   $brand=$_POST['brand'];
   $type=$_POST['type'];

   $sql="update medi set id=$id,name='$name', quantity='$quantity', manufacture='$manufacture', expiry='$expiry', brand='$brand',type='$type'
   where id=$id";
   $result=mysqli_query($con,$sql);

   if($result){
      // echo "Data Updated Succfully";
      header('location:Display.php');
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <title>UPDATE MEDICINE DETAILS</title>

   <style>
       body{
      background-color:lightblue;
     }
     .container{
      background-color:lightyellow;
     }
   </style>



  </head>
    
    <body>
        <br/>

       <ul><h2> UPDATE MEDICINE DETAILS </h2></ul>
    
    <div class="container my-5">
        <form method ="post">
              <br/>
           <div class="form-group">
            <label> Medicine Name </label><br/>
            <input type="text" class="form-control" 
            placeholder="Enter Medicine Name" name ="name" value=<?php echo $name;?> >
            </div><br/>

            <div class="form-group">
            <label> Quantity </label><br/>
            <input type="text" class="form-control" 
            placeholder="Enter Quentity" name ="quantity" value=<?php echo $quantity;?>>
            </div><br/>

            <div class="form-group">
            <label>Manufacture Date  </label><br/>
            <input type="date" class="form-control"name="manufacture" value=<?php echo $manufacture;?>>
           </div>
           <br/>

           <div class="form-group">
            <label>Expiry Date  </label><br/>
            <input type="date" class="form-control"name="expiry" value=<?php echo $expiry;?> >
            </div>
           

          <br/>

            <div class="form-group">
            <label> Brand </label><br/>
            <input type="text" class="form-control" 
            placeholder="Brand Name" name ="brand" value=<?php echo $brand;?>>
            </div>
            <br/>

            
            <div class="form-group ">
            <label> Medicine Type </label><br/>  
               <select class="form-select" name="type" value=<?php echo $type;?>>
                  
                  <option selected>Choose Type</option>
                  <option value="Tablet">Tablet</option>
                  <option value="Syrup">Syrup</option>
                  <option value="Cream">Cream</option>
                  <option value="lotion">lotion</option>
                  <label class="input-group-text" for="inputGroupSelect02">Options</label>
               </select>
               
 
</div>
 
            <br/><br/>
            <button type="submit" class="btn btn-primary"name="submit">Update Details</button>
        </form>
        </div>
        
        
   
    </body>




</html>