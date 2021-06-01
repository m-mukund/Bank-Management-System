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

if(isset($_POST['adminid']))
{
    if($_POST['password1']==$_POST['password2'])
    {
        $plaintext_password = $_POST['password1']; 
        $hash = password_hash($plaintext_password,PASSWORD_DEFAULT); 
  
        $sql="INSERT INTO admin_log (Admin_id,Password)
VALUES ('".$_POST['adminid']."','".$hash."');";
    if(mysqli_query($connection,$sql)){
        $count = mysqli_affected_rows($connection);
        echo $count;
        header("Location: admin_create.php");
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
    <title>New admin</title>
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
    <form action="newadmin.php" method="post">
			<h1>Add Admin</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="adminid" id="adminid" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" id="password1" name="password1" />
            </div>
            <div>
				<input type="password" placeholder="Password" required="" id="password2" name="password2" />
			</div>
			<div>
				<input type="submit" value="Submit" />
			
			</div>
		</form>
		
	</section>
</div>



</body>
</html>