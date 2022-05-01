<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Details </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/searchmedi.css">
<title>Search Sales by Customer name</title>
<style>
	body{
		background-color: lightgrey;
	}
	table,th,td{
		border: 1px solid black;
		width: 1100px;
		height: 50px;
		background-color: lightblue;
		text-align:center;
		table-align:center;
	}
	.btn{
		width: 10%;
		height: 5%;
		font-size: 22px;
		padding: 0px;
	}
	
	table{
		margin-left:1000px;
	}
	
	
</style>
</head>
<body>

<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">HEALTH CARE</label>
     
      <ul>
        <li><a  href="Homepage.php">Home</a></li>
        <li><a href="#">About Us</a></li>
		<li><a href="#">Contact Us</a></li>
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
      <a href="#"><i class="fa-solid fa-pills"></i><span>Manage Medicines</span></a> 
      <a href="#"><i class="fa-solid fa-users"></i><span>Manage Staff</span></a> 
      <a href="#"><i class="fa-solid fa-people-roof"></i><span>Manage Suppliers</span></a>          
      <a href="displaySales.php"><i class="fa-solid fa-chart-bar"></i><span>Manage Sales</span></a>    
      <a href="#"><i class="fa-solid fa-file-prescription"></i><span>Manage Prescriptions</span></a>   
      
    </div>
    <!--sidebar end-->
	
	<section >
            <div style=" background: url(../Images/sales1.jpg) no-repeat; background-size: cover; padding-top:100px; padding-bottom:280px; padding-left:-30px;" >


	<center>
		<div class="container" style="padding-left:180px;">
			<form action="" method="POST">
				<input type="text" name="name" class="form-control" placeholder="Name"/><br>
				<input type="submit" name="search" class="btn btn-primary" value="SEARCH">
				</form>	
			<table class="table">

    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Pharmacist Name</th>
      <th scope="col">Description</th>
      <th scope="col">Issued date</th>
      <th scope="col">Delivered date</th>
      <th scope="col">Amount</th>
    </tr><br>
		<?php
		$connect = mysqli_connect('localhost','root','');
		$db = mysqli_select_db($connect,'pharmacy');
		
		if(isset($_POST['search']))
		{
			$name = $_POST['name'];
			
			$query = "select * from crud where name='$name'";
			$query_run = mysqli_query($connect,$query);
			
			while($row = mysqli_fetch_array($query_run))
			{
				?>
				<tr>
					<td><?php echo $row ['id']; ?></td>
					<td><?php echo $row ['name']; ?></td>
					<td><?php echo $row ['pharmacist']; ?></td>
					<td><?php echo $row ['description']; ?></td>
					<td><?php echo $row ['issueddate']; ?></td>
					<td><?php echo $row ['delivereddate']; ?></td>
					<td><?php echo $row ['amount']; ?></td>
				</tr>
				<?php
			}
		}
		?>
			</table>
			<br></br>
			 <button type="button" class="btn btn-primary"><a href="displaySales.php"class="text-white">Back to details</button>
	</center>
	</div>
            </section>
</body>
</html>