 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Loan Status</title>
</head>
<body>
<ul>
  <li><a href="cus_home1.php"><h1><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg>Customer Home</h1></a></li>
 
  <li style="float:right"><a class="active" href="logout.php"> <h1><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg> Log Out</h1></a>></li>
</ul>
</head>

 
 <?php 
session_start();
	$conn= mysqli_connect('localhost','root','','bank');
extract($_POST);
  if(isset($_POST['Submit'])){
	  $t=$_SESSION["total_amount"]; 
	  $acc_no=$_SESSION["acc_no"];
	  $sql=mysqli_query($conn,"select * from account where account_no='$acc_no' ");
      $acc_det=mysqli_fetch_assoc($sql);
      $bal= $acc_det['Balance'];
	  if($bal<$amount)
	  {echo "Insufficient balance";}
	  else if($t<$amount)
	  {echo "Loan remaining is less than the amount entered";}
	  else{
		  $time1=$_SESSION["time1"];
		  $dd=date("Y-m-d");
		  $sql = mysqli_query($conn,"UPDATE account SET balance=$bal-$amount WHERE account_no='$acc_no'");
		  $sql = mysqli_query($conn,"UPDATE loan SET Amount_remaining=$t-$amount WHERE Loan_id='$loanid'");
		  $sql = mysqli_query($conn,"UPDATE loan SET Time_period=$time1 WHERE Loan_id='$loanid'");
		  $sql = mysqli_query($conn,"UPDATE loan SET Previous_date='$dd' WHERE Loan_id='$loanid'");
	  }
  }


?>

<body>
     <?php 
	 $t=$_SESSION["total_amount"]; 
	 echo "<h2> Total amount left to be paid is "; echo $t;
     echo "</h2>";
	 ?>
	<div class="container">
	<section id="content">
    <form action="make_payment.php" method="post">
			<h1>Make Payment</h1>
			<div>
				<input type="text" placeholder="loanid" required="" id="loanid" name="loanid" />
			</div>
			<div>
				<input type="text" placeholder="Amount" required="" id="amount" name="amount" />
			</div>
			<div>
				<input type="submit" name="Submit" value="Pay" />
				
			</div>
		</form>
		
	</section>
</div>

</body>
</html>