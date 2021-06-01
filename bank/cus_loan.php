<?php

session_start();

?>

<!DOCTYPE html>
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
<?php
$host="localhost";
$user="root";
$pass="";
$database="bank";
$connection=mysqli_connect($host,$user,$pass,$database);
if(mysqli_connect_errno()){
    die(mysqli_connect_error());
}
$acc_no=$_SESSION["acc_no"];
$sql=mysqli_query($connection,"select * from customer where account_no='$acc_no' ");
$cus_det=mysqli_fetch_assoc($sql);
$a_no= $cus_det['Aadhar_no'];
$_SESSION["aadhar_no"]=$a_no;
$sql=mysqli_query($connection,"select * from loan where Aadhar_no='$a_no' ");
$r=mysqli_num_rows($sql);
if($r!=0)
{
$loan_det=mysqli_fetch_assoc($sql);
$d=date("Y-m-d");
$y= substr($d,0,4);
$m= substr($d,5,2);

$d1=$loan_det['Previous_date'];
$y1= substr($d1,0,4);
$m1= substr($d1,5,2);

echo "<h2>The principle amount remaining is "; echo $loan_det['Amount_remaining'];
echo "<br>";

echo "<h2>Last Payment was made on "; echo $loan_det['Previous_date'];
echo "<br>";

if($y==$y1)
{
	$t=$m-$m1;
	$t=$t/12;
	$r=$loan_det['Interest']/100;
	$a=(1+$r/12);
	$a=pow($a,12*$t);
	$a=$loan_det['Amount_remaining']*$a;
	$i=$a-$loan_det['Amount_remaining'];
	echo "<h2>Time remaining in months is "; echo $loan_det['Time_period']-$m+$m1;
	echo "<br>";
	echo "<h2>Interest generated since then is "; echo $i;
    echo "<br>";
	$_SESSION["total_amount"]=$i+$loan_det['Amount_remaining'];
	$_SESSION["time1"]=$loan_det['Time_period']-$m+$m1;
}

else{
	$t=$y-$y1;
	$t=$t*12;
	$t= $t+$m-$m1;
	echo "<h2>Time remaining in months is "; echo $loan_det['Time_period']-$t;
	echo "<br>";
	$_SESSION["time1"]=$loan_det['Time_period']-$t;
	$t=$t/12;
	$r=$loan_det['Interest']/100;
	$a=(1+$r/12);
	$a=pow($a,12*$t);
	$a=$loan_det['Amount_remaining']*$a;
	$i=$a-$loan_det['Amount_remaining'];
	echo "<h2>Interest generated since then is "; echo $i;
    echo "<br>";
	$_SESSION["total_amount"]=$i+$loan_det['Amount_remaining'];
}


#<a class="btn btn-lg btn-primary" href="cus_loan.php">Loan Status</a>
?>
<a class="btn btn-lg btn-danger" href="make_payment.php" name="pay">Make Payment</a>
<?php
}
else
echo"<h1>You have no loans</h1>";

?>

</body> 
</html>