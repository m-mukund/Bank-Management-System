<?php

session_start();

?>
<?php
if(isset($_SESSION['admin_id']))
{

$host="localhost";
$user="root";
$pass="";
$database="bank";
$connection=mysqli_connect($host,$user,$pass,$database);
if(mysqli_connect_errno()){
    die(mysqli_connect_error());
}

if(isset($_POST['empid']))
{
    if($_POST['password1']==$_POST['password2'])
    {
        $plaintext_password = $_POST['password1']; 
        $hash = password_hash($plaintext_password,PASSWORD_DEFAULT); 
       
        $sql="SELECT MAX(Account_no) FROM account";
        if ($result = mysqli_query($connection, $sql)) {
            
            if ($row = mysqli_fetch_row($result)) {
              $acc=$row[0];
              $acc1=$acc+1;
              $bal=0;
            }
        }




    $sql="INSERT INTO account (`Account_no`, `Balance`, `Branch_id`, `Employee_id`) VALUES ('".$acc1."','".$bal."','".$_POST["branchid"]."','".$_POST["managerid"]."');";
    if(mysqli_query($connection,$sql)){
        $count = mysqli_affected_rows($connection);
        echo $count;
    }

    $sql="SELECT Pincode FROM `branch` WHERE Branch_id='".$_POST["branchid"]."';";
    if ($result = mysqli_query($connection, $sql)) {
            
        if ($row = mysqli_fetch_row($result)) {
          $pin=$row[0];
          
        }

     $sql="INSERT INTO customer (Aadhar_no,Fname,Lname,Pincode,Phone_no,Email_id,Employee_id,Account_no) VALUES ('".$_POST["adhaar"]."','".$_POST["fname"]."','".$_POST["lname"]."','".$pin."','".$_POST["ph"]."','".$_POST["email"]."','".$_POST["managerid"]."','".$acc1."');";

    if(mysqli_query($connection,$sql)){
      $count = mysqli_affected_rows($connection);
      echo $count;
    }
    $sql="INSERT INTO `employee`(`Employee_id`, `Aadhar_no`, `Salary`, `Manager_id`, `Branch_id`) VALUES ('".$_POST["empid"]."','".$_POST["adhaar"]."','".$_POST["salary"]."','".$_POST["managerid"]."','".$_POST["branchid"]."');";
    if(mysqli_query($connection,$sql)){
        $count = mysqli_affected_rows($connection);
        echo $count;
      }
    
        $sql="INSERT INTO emp_log (Employee_id,Password)
        VALUES ('".$_POST['empid']."','".$hash."');";
        
        if(mysqli_query($connection,$sql)){
            $count = mysqli_affected_rows($connection);
            echo $count;
           
        }
        $sql="INSERT INTO cus_log (Account_no,Password) VALUES ('".$acc1."','".$hash."');";
        if(mysqli_query($connection,$sql)){
      $count = mysqli_affected_rows($connection);
      echo $count;
      header("Location: admin_create.php");
    }
    
    }
}

}
mysqli_close($connection);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>New Employee</title>
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
    <form action="newemp.php" method="post">
    
    <input type="text" name="fname" id="fname" placeholder="First name">
    
    <input type="text" name="lname" id="lname" placeholder="Last name">

   
    <input type="text" name="empid" id="empid" placeholder="Employee Id">
    
    <input type="password" name="password1" id="password1" placeholder="Password">
    
    <input type="password" name="password2" id="password2" placeholder="Retype Password">
    
    <input type="number" name="adhaar" id="adhaar" placeholder="Adhaar no">
    
    <input type="number" name="salary" id="salary" placeholder="Salary">
    
    <input type="number" name="managerid" id="managerid" placeholder="Manager id">

    <input type="number" name="branchid" id="branchid" placeholder="Branch id">
    
    <input type="text" name="email" id="email" placeholder="Email id">
    
    <input type="number" name="ph" id="ph" placeholder="Phone number">






    <input class="btn btn-success" type="submit" value="Submit">
    
    </section>
</div>
    </form>
</body>
</html>