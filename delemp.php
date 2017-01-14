<!DOCTYPE html>
<html>
<head>
<title>Delete Employee</title>
</head>
<body>
<?php 
include "connect.php";
include "adminmenu.php";
?>
<h3 id="delemp">Delete Emp</h3>
<div class="delloginbox">
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
<b>Employee id</b>:<input type="text" name="id">
<input type="submit" value="Delete">
</form>
<?php
if(isset($_POST['id']))
{
$id = $_POST['id'];
$query=mysql_query("SELECT * FROM emp_info WHERE emp_id='$id'");
$row=mysql_fetch_assoc($query);
if($row['emp_id']==NULL)
echo "No such record found";
else{
$result=mysql_query("DELETE FROM emp_info,leave_status USING emp_info,leave_status WHERE emp_info.emp_id=leave_status.emp_id AND leave_status.emp_id='$id'");
  if(!($result))
  die('Error: ' . mysql_error($con));
  else
echo "Employee Record Deleted Successfully";
}
}
?>
</div>
</body>
</html>