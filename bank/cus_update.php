<?php 
session_start();

  if(!isset($_SESSION["loggedin"])){
        header("location: emp_login.php");
        exit;
  }

	$conn= mysqli_connect('localhost','root','','bank');

	$sql1="SELECT * FROM branch ";
	$result1=mysqli_query($conn,$sql1);
	$branchs=mysqli_fetch_all($result1,MYSQLI_ASSOC);

	if(isset($_POST['sub_but'])){

		$aadhar_no=$_POST['aadhar_no'];
		$first_name = $_POST["first_name"];
    	$last_name = $_POST["last_name"];
    	$pin=$_POST['pin'];
	    $phone_no=$_POST['phone_no'];
	    $email=$_POST['email'];
	    $state=$_POST['state'];
	    $city=$_POST['city'];
		$branch_id=$_POST['sel_branch'];
		$balance=$_POST['balance'];
        $sql1="SELECT Account_no FROM customer WHERE Aadhar_no='$aadhar_no' ";
	    	if ($result = mysqli_query($conn,$sql1)) {
	            if ($row = mysqli_fetch_row($result)) {
	              $account_no=$row[0];
	            }
        	}

	    if($branch_id!=""){
	    	
	    	$sql="UPDATE account SET Branch_id='$branch_id' WHERE Account_no='$account_no';";
	    	mysqli_query($conn,$sql);
	    }
		if($first_name){
	        $sql="UPDATE customer SET Fname='$first_name' WHERE Aadhar_no='$aadhar_no';";
	        mysqli_query($conn,$sql);    
	    }
	    if($last_name){
	        $sql="UPDATE customer SET Lname='$last_name' WHERE Aadhar_no='$aadhar_no';";
	        mysqli_query($conn,$sql);    
	    }
	    if($pin){
	    	if($state && $city){
	    		$sql="INSERT INTO locations VALUES('$pin','$state','$city');";
	    		if(mysqli_query($conn,$sql)){
	    			$mess="New pin added";
	    		}	
    			$sql="UPDATE customer SET Pincode='$pin' WHERE Aadhar_no='$aadhar_no';";
    			if(mysqli_query($conn,$sql)){
    				$mess1="Pin updated";
    			}	
	    	}
		}
		if($balance){
	        $sql="UPDATE account SET Balance='$balance' WHERE Account_no='$account_no';";
	        mysqli_query($conn,$sql); 
	    }
	    if($email){
	        $sql="UPDATE customer SET Email_id='$email' WHERE Aadhar_no='$aadhar_no';";
	        mysqli_query($conn,$sql); 
	    }
	    if($phone_no){
	        $sql="UPDATE customer SET Phone_no='$phone_no' WHERE Aadhar_no='$aadhar_no';";
	        mysqli_query($conn,$sql); 
	    }
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 	<title>Update Customer Details</title>
 </head>
 <body>
 	<?php include('emp_nav.php'); ?>
 	<!-- <form method="POST" action="cus_update.php">
 		<input type="number" name="aadhar_no" placeholder="Aadhar No" required>
 		<input type="text" name="first_name" placeholder="First Name">
 		<input type="text" name="last_name" placeholder="Last Name">
 		<input type="number" name="pin" placeholder="Pin Code">
 		<input type="number" name="phone_no" placeholder="Phone">
 		<select name="sel_branch">
			 foreach($branchs as $branch){ 
        	<option value=""></option>
			<option value="  echo $branch['Branch_id'];?>"></option>
			 }
		</select>
		<input type="text" name="city" placeholder="City">
    	<input type="text" name="state" placeholder="State">
 		<input type="email" name="email" placeholder="Email">
 		<input type="submit" name="sub_but" value="Update Details">
 	</form> -->

 	<div class="container">
  <section id="content">
    <form method="POST">
      <h1>Update Account</h1>
      <div>
        <input type="number" placeholder="Aadhar No" required="" id="empid" name="aadhar_no" />
      </div>
      <div>
        <input type="text" placeholder="First Name"  name="first_name" />
      </div>
      <div>
        <input type="text" placeholder="Last Name"   name="last_name" />
      </div>
      <div>
        <input type="number" placeholder="Pin Code"   name="pin" />
      </div>
      <div>
        <input type="number" placeholder="Phone"  name="phone_no" />
      </div>
      <div>
        <input type="text" placeholder="Email"   name="email" />
      </div>
	  <div>
        <input type="number" placeholder="Balance"   name="balance" />
      </div>
      <div>
        <input type="text" placeholder="City"   name="city" />
      </div>
      <div>
        <input type="text" placeholder="State"   name="state" />
      </div>
      <select name="sel_branch" style="margin-bottom: 10px;">
      <?php foreach($branchs as $branch){ ?>
        <option value=""></option>
        <option value="<?php  echo $branch['Branch_id'];?>"><?php  echo $branch['Branch_name']; ?></option>
      <?php } ?>
      </select>
      
      <div>
        <input type="submit" value="Update"  name="sub_but" />
      </div>
    </form>
  </section>
</div>
 </body>
 </html>