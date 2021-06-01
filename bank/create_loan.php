
 
 
 <?php 
session_start();


if(!isset($_SESSION["loggedin"])){
    header("location: emp_log.php");
    exit;
}
	$conn= mysqli_connect('localhost','root','','bank');
extract($_POST);
  if(isset($_POST['Submit'])){
	  //echo "Started";

    $emp_id=$_SESSION["emp_id"];
	$d=date("Y-m-d");
    $sql_acc="INSERT INTO loan VALUES('$loanid','$amount','$interest','$d','$time','$a_no','$emp_id','$amount');";
    if(mysqli_query($conn,$sql_acc)){
	      $mess="Added to table account";
	      //echo $mess;
		}
    else{
      $mess="Error";
	  //echo $mess;
  }
    }
	  


  mysqli_close($conn);
?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>New Loan</title>
</head>
<body>

     <?php include('emp_nav.php'); ?>
    <!--<form method="post">
	<p>Loan Id:</p>
    <input type="number" name="loanid" id="loanid">
    <p>Amount :</p>
    <input type="number" name="amount" id="amount">
    <p>Interest Rate:</p>
    <input type="number" name="interest" id="interest">
     <p> Time in Months: </p>
    <input type="number" name="time" id="time">
    <p>Aadhar No:</p>
    <input type="number" name="a_no" id="a_no">
    <input class="btn btn-success" type="submit" name="Submit" value="Submit">
    </form> -->

<div class="container">
    <section id="content">
    <form method="post">
            <h1>Activate Loan</h1>
            <div>
                <input type="number" placeholder="Loan ID" required="" id="empid" name="loanid" />
            </div>
            <div>
                <input type="number" placeholder="Amount" required=""  name="amount" />
            </div>
            <div>
                <input type="number" placeholder="Interest" required=""  name="interest" />
            </div>
            <div>
                <input type="number" placeholder="Time" required=""  name="time" />
            </div>
            <div>
                <input type="number" placeholder="Aadhar No" required=""  name="a_no" />
            </div>
            <div>
                <input type="submit" value="Add Loan" name="Submit" />
                
            </div>
        </form>
        
    </section>
</div>
</body>
</html>