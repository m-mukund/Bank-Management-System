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

if(isset($_POST['submit']))
{   
      $sql="INSERT INTO locations (`Pincode`, `State`, `City`) VALUES ('".$_POST["pin"]."','".$_POST["state"]."','".$_POST["city"]."');";
    if ($result = mysqli_query($connection, $sql)) {    
            $count = mysqli_affected_rows($connection);
           
        }
    $sql="INSERT INTO branch (`Branch_id`, `Branch_name`, `Pincode`, `Admin_id`) VALUES ('".$_POST["b_id"]."','".$_POST["bname"]."','".$_POST["pin"]."','".$_POST["admin_id"]."');";
    if(mysqli_query($connection,$sql)){
        $count = mysqli_affected_rows($connection);
    }
	else
	{
		echo "error ".mysqli_error($connection);
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
    <title>New Branch</title>
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
    <form method="post">
			<h1>Add Branch</h1>
			<div>
				<input type="text" placeholder="Branch Name" required="" name="bname" id="bname" />
			</div>
			<div>
				<input type="number" placeholder="Branch Id" required="" id="b_id" name="b_id" />
            </div>
            <div>
				<input type="number" placeholder="Pincode" required="" id="pin" name="pin" />
            </div>
            <div>
				<input type="number" placeholder="Manager ID" required="" id="admin_id" name="admin_id" />
            </div>
            <div>
				<input type="text" placeholder="State" required="" id="state" name="state" />
            </div>
            <div>
				<input type="text" placeholder="City" required="" id="city" name="city" />
            </div>

			<div>
				<input type="submit" value="Submit" name="submit" />
			
			</div>
		</form>
		
	</section>
</div>




</body>
</html>