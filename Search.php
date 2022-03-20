<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Details </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body{
            background-color:yellow;
        }
       table,th,td{
           border: 2px solid black;
           width:1100px;
           height: 50px;
           background-color: white;
           text-align:center;
       }
      .form-control{
           background-color:lightblue;
           
       }

    </style>



</head>
<body>
    <br/>
    <h1> <center>SEARCH MEDICINE DETAILS</center></h1>
    <br/>
    <div class="container">
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
         $db = mysqli_select_db($connection,'medicine');

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
        <button class="btn btn-success"><a href="Display.php"class="text-white">Back To Details</a> </button>






</body>
</html>