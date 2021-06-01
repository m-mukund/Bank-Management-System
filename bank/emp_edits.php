<?php

session_start();

?>
<?php


$host="localhost";
$user="root";
$pass="";
$database="bank";
$connection=mysqli_connect($host,$user,$pass,$database);
if(mysqli_connect_errno()){
    die(mysqli_connect_error());
}
$ad_no=$_REQUEST['id'];
$sel_query="SELECT * FROM employee INNER JOIN customer ON employee.Aadhar_no=customer.Aadhar_no WHERE employee.Aadhar_no='".$ad_no."'";

$result = mysqli_query($connection,$sel_query);
$row = mysqli_fetch_assoc($result);

?>


<?php 

if(isset($_POST['fname']))
{


$sql="UPDATE customer SET Fname = '".$_POST['fname']."', Lname= '".$_POST['lname']."', Pincode='".$_POST['Pincode']."', Phone_no='".$_POST['Phone_no']."',  Email_id='".$_POST['Email_id']."'WHERE Aadhar_no = '".$ad_no."';";
if(mysqli_query($connection,$sql)){
    $count = mysqli_affected_rows($connection);
    echo $count;
    //header("Location: emp_edit.php");
}
$sql="UPDATE employee SET Salary = '".$_POST['Salary']."', Manager_id = '".$_POST['Manager_id']."', Branch_id ='".$_POST['Branch_id']."' WHERE Aadhar_no = '".$ad_no."';";
if(mysqli_query($connection,$sql)){
    $count = mysqli_affected_rows($connection);
    echo $count;
    header("Location: emp_edit.php");
}


}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body>
<ul>
  <li><a href="admin_create.php"><h1><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg> Admin dashboard</h1></a></li>
 
  <li style="float:right"><a class="active" href="logout.php"> <h1><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg> Log Out</h1></a>></li>
</ul>

<div class="container">
	<section id="content">
<form action="emp_edits.php?id=<?php echo $_REQUEST["id"]; ?>" method="post">
<p>First Name</p>
<input type="text" name="fname" id="fname" value="<?php echo $row['Fname'] ?>"><br>

<p>Last Name</p>
<input type="text" name="lname" id="lname" value="<?php echo $row['Lname'] ?>"><br>
<p>Pincode</p>
<input type="text" name="Pincode" id="Pincode" value="<?php echo $row['Pincode'] ?>"><br>
<p>Salary</p>
<input type="text" name="Salary" id="Salary" value="<?php echo $row['Salary'] ?>"><br>
<p>Manager ID</p>
<input type="text" name="Manager_id" id="Manager_id" value="<?php echo $row['Manager_id'] ?>"><br>
<p>Branch ID</p>
<input type="text" name="Branch_id" id="Branch_id" value="<?php echo $row['Branch_id'] ?>"><br>
<p>Phone Number :</p>
<input type="text" name="Phone_no" id="Phone_no" value="<?php echo $row['Phone_no'] ?>"><br>
<p>Email :</p>
<input type="text" name="Email_id" id="Email_id" value="<?php echo $row['Email_id'] ?>"><br>
<input class="btn btn-lg btn-success" type="submit" value="Submit">

</form>
</section>
</div>
</body>
</html>