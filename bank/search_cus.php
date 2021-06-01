<?php 
session_start();

  if(!isset($_SESSION["loggedin"])){
        header("location: emp_login.php");
        exit;
  }

  $cus_table="";
  $acc_table="";

  if(isset($_POST['sub_but'])){

  	$conn= mysqli_connect('localhost',"root",'','bank');
	 
  	$acc_no=$_POST['account_no'];
	$sql1="SELECT * FROM customer WHERE Account_no='$acc_no';";
	$result1=mysqli_query($conn,$sql1);
	$cus_table=mysqli_fetch_assoc($result1);
	// $cus_table=row1[0];
	$sql2="SELECT * FROM account WHERE Account_no='$acc_no';";
	$result2=mysqli_query($conn,$sql2);
	$acc_table=mysqli_fetch_assoc($result2);
	// $acc_table=row2[0];
	$bid=$acc_table['Branch_id'];
	$sql3="SELECT * FROM branch WHERE Branch_id='$bid';";
	$result3=mysqli_query($conn,$sql3);
	$b_table=mysqli_fetch_assoc($result3);

  }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Search Customers</title>
 </head>
 <link rel="stylesheet" type="text/css" href="style.css" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <body>
 <?php include('emp_nav.php'); ?>
  	<section id="content">
 	<h1>Enter Account Number</h1>

 	<form method="POST" action="search_cus.php">
 		<input type="text" name="account_no">
 		<input type="submit" name="sub_but" value="Search">
 	</form>
	</section>
	<div class="cent">
	<br>
	<br>

 	<?php 
 		if($cus_table && $acc_table){   ?>
 			<h3>Name: <?php echo $cus_table['Fname'] . " " . $cus_table['Lname']; ?></h3>
 			<h3>Aadhar No: <?php echo $cus_table['Aadhar_no']; ?></h3>
 			<h3>Phone No: <?php echo $cus_table['Phone_no']; ?></h3>
 			<h3>Email: <?php echo $cus_table['Email_id']; ?></h3>
 			<h3>Account No: <?php echo $acc_no; ?></h3>
 			<h3>Managed By: <?php echo $cus_table['Employee_id']; ?></h3>
 			<h3>Balance: <?php echo $acc_table['Balance']; ?></h3>
 			<h3>Branch: <?php echo $b_table['Branch_name']; ?></h3>

 		<?php } ?>
		 </div>
 	 
 </body>
 </html>