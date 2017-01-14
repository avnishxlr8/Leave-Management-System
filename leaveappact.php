<?php
include "connect.php";
$status=$_GET['lstatus'];
$id = $_GET['emp_id'];
$result=mysql_query("UPDATE leave_status SET lstatus='$status' WHERE emp_id='$id'");
if(!($result)) {
  die('Error:'.mysql_error($con));
}
else{
header("Location:manageleave.php");
}

mysql_close($con);
?>