<?php 
session_start();

if(!isset($_SESSION["loggedin"])){
    header("location: emp_log.php");
    exit;
}

	$conn= mysqli_connect('localhost','root','','bank');
	$sql1="SELECT * FROM branch ";
	$result1=mysqli_query($conn,$sql1);
	$branchs=mysqli_fetch_all($result1,MYSQLI_ASSOC);

  if(isset($_POST['sub_but'])){
    if($_POST['sel_branch']==""){
      header("location: create_acc.php");
      exit;
  }

  	$sql="SELECT MAX(Account_no) FROM account";
        if ($result = mysqli_query($conn,$sql)) {
            
            if ($row = mysqli_fetch_row($result)) {
              $acc=$row[0];
              $acc1=$acc+1;
              
            }
        }
    $branch_id=$_POST['sel_branch'];
    $emp_id=$_SESSION["emp_id"];
    $bal=$_POST['balance'];

    $sql_acc="INSERT INTO account VALUES('$acc1','$bal','$branch_id','$emp_id');";
    if(mysqli_query($conn,$sql_acc)){
	      $mess="Added to table account";
	    }
    else{
      $mess="Error";
    }
    $aadhar_no=$_POST['aadhar_no'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $pin=$_POST['pin'];
    $phone_no=$_POST['phone_no'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $state=$_POST['state'];
    $city=$_POST['city'];

    $sql_pin="INSERT INTO locations VALUES('$pin','$state','$city');";
    if(mysqli_query($conn,$sql_pin)){
        $mess="Added to table locations";
      }
    else{
      $mess="Error";
    }
    $sql_customer="INSERT INTO customer VALUES('$aadhar_no','$first_name','$last_name','$pin','$phone_no','$email','$acc1','$emp_id');";
    if(mysqli_query($conn,$sql_customer)){
	      $mess="Added to table employee";
	    }
    else{
      $mess="Error";
    }
    $plaintext_password = $pass; 
    $hash = password_hash($plaintext_password,PASSWORD_DEFAULT); 
    $sql="INSERT INTO cus_log VALUES('$acc1','$hash');";
	mysqli_query($conn,$sql);
  }

  mysqli_close($conn);
 
	
 ?>

 <!DOCTYPE html>
 <html>
 <head>
  <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
 	<title>Create New Account</title>
 </head>
 <body>
  <?php include('emp_nav.php'); ?>
 	<!-- <form method="POST" action="create_acc.php">
 		<input type="number" name="aadhar_no" placeholder="Aadhar No">
 		<input type="text" name="first_name" placeholder="First Name">
 		<input type="text" name="last_name" placeholder="Last Name">
 		<input type="number" name="pin" placeholder="Pin Code">
 		<input type="number" name="phone_no" placeholder="Phone">
 		<input type="email" name="email" placeholder="Email">
    <input type="password" name="pass" placeholder="Password">
    <input type="text" name="city" placeholder="City">
    <input type="text" name="state" placeholder="State">
 		<select name="sel_branch">
			){ 
        <option value=""></option>
				<option value="</option>
			php } 
		</select>
    <input type="number" name="balance" placeholder="Amount deposited">
 		
		<input type="submit" name="sub_but" value="Create Account">
 	</form> -->


<div class="container">
  <section id="content">
    <form method="POST" action="create_acc.php">
      <h1>New Account</h1>
      <div>
        <input type="number" placeholder="Aadhar No" required="" id="empid" name="aadhar_no" />
      </div>
      <div>
        <input type="text" placeholder="First Name" required=""  name="first_name" />
      </div>
      <div>
        <input type="text" placeholder="Last Name" required=""  name="last_name" />
      </div>
      <div>
        <input type="number" placeholder="Pin Code" required=""  name="pin" />
      </div>
      <div>
        <input type="number" placeholder="Phone" required=""  name="phone_no" />
      </div>
      <div>
        <input type="text" placeholder="Email" required=""  name="email" />
      </div>
      <div>
        <input type="password" placeholder="Password" required="" id="password" name="pass" />
      </div>
      <div>
        <input type="text" placeholder="City" required=""  name="city" />
      </div>
      <div>
        <input type="text" placeholder="State" required=""  name="state" />
      </div>
      <select name="sel_branch" style="margin-bottom: 10px;">
      <?php foreach($branchs as $branch){ ?>
        <option value=""></option>
        <option value="<?php  echo $branch['Branch_id'];?>"><?php  echo $branch['Branch_name']; ?></option>
      <?php } ?>
      </select>
      
      <div>
        <input type="number" placeholder="Amount Deposited" required=""  name="balance" />
      </div>
      <div>
        <input type="submit" value="Create"  name="sub_but" />
        
      </div>
    </form>
  </section>
</div>
 </body>
 </html>