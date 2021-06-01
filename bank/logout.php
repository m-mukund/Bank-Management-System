<?php session_start();
unset($_SESSION["admin_id"]);  
unset($_SESSION["acc_no"]);  
unset($_SESSION["emp_id"]);  
session_start();
 

$_SESSION = array();
 

session_destroy();
 

header("Location: home.php");
exit;

?>