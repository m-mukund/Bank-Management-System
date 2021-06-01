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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/table.css">
    <title>Employee Edit</title>
</head>
<body>
<?php include('emp_nav.php'); ?>
<!-- <h1>Edit Employees</h1> -->
<div class="table-wrapper" >
<table width="100%" border="1" style="border-collapse:collapse;" class="fl-table">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>First Name</strong></th>
<th><strong>Last Name</strong></th>
<th><strong>Pincode</strong></th>
<th><strong>Salary</strong></th>
<th><strong>Manager ID</strong></th>
<th><strong>Branch ID</strong></th>
<th><strong>Phone number</strong></th>
<th><strong>Email</strong></th>
<th><strong>Edit</strong></th>

</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM employee INNER JOIN customer ON employee.Aadhar_no=customer.Aadhar_no WHERE Manager_id='".$_SESSION['emp_id']."';";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td ><?php echo $count; ?></td>

<td ><?php echo $row['Fname']; ?></td>
<td ><?php echo $row['Lname']; ?></td>
<td ><?php echo $row['Pincode']; ?></td>
<td ><?php echo $row['Salary']; ?></td>
<td ><?php echo $row['Manager_id']; ?></td>
<td ><?php echo $row['Branch_id']; ?></td>
<td ><?php echo $row['Phone_no']; ?></td>
<td ><?php echo $row['Email_id']; ?></td>
<td >
<a href="emp_edits2.php?id=<?php echo $row["Aadhar_no"]; ?>">Edit</a>
</td>

</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
    
</body>
</html>