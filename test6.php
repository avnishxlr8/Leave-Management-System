
<?php
include "connect.php";
include "adminmenu.php";
$employee = isset($_GET['employee']) ? $_GET['employee'] : '';
if ($employee) 
   $result = mysql_query("SELECT * from emp_info INNER JOIN leave_status ON emp_info.emp_id=leave_status.emp_id WHERE fullname='".$employee."'");
if($result==FALSE) {
  die('Error: ' . mysql_error($con));
}
if (mysql_num_rows($result) == 0) {
    echo "No rows found, nothing to print so am exiting";
    exit;
}
$emp=mysql_fetch_assoc($result);
echo $emp['emp_id'];
?>
