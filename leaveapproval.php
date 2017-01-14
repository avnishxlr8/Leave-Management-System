<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Leave Status</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
include "connect.php";
include "adminmenu.php";
$employee = isset($_GET['employee']) ? $_GET['employee'] : '';
if ($employee) 
   $result = mysql_query("SELECT * from emp_info INNER JOIN leave_status ON emp_info.emp_id=leave_status.emp_id WHERE fullname='".$employee."' ");
if(!$result) {
  die('Error:'.mysql_error($con));
  }
//if (mysql_num_rows($result) == 0) {
  //  echo "No rows found";
    //exit;
//}
$row=mysql_fetch_array($result);
?>
<div class="leavetable">
<span class="subhead">&nbsp;&nbsp;&nbsp;&nbsp;Leave Status (You are only allowed to change leave status)</span><br>
<form name="leavedetails" action="leaveappact.php" method="get">
<pre>
Application Date:<input name="appdate" type="text" value="<?php echo $row['appdate'];?>"><br>
Employee ID     :<input name="emp_id" type="text" value="<?php echo $row['emp_id'];?>"><br>
UserName:        <input name="username" type="text" value="<?php echo $row['username'];?>"><br>
No. of Days:     <input name="lspan" type="text" value="<?php echo $row['leavespan'];?>"><br>
Leave Type:      <input name="ltype" type="text" value="<?php echo $row['leavetype'];?>"><br>
Purpose: 
<div style="margin-left: 50px;">          <textarea wrap="off" cols="16" rows="4" name="lpurpose"><?php echo $row['lpurpose'];?></textarea><br>
</div>
Starting Date:   <input name="startdate" type="text" value="<?php echo $row['startdate'];?>"><br>
Status:          <input type="text" value="<?php echo $row['lstatus'];?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choose to Update Status:<select name="lstatus">
																															 <option>Accepted</option>
																															<option>Rejected</option>
																															<option>Active</option>
																															<option>Inactive</option>
																															<option>Status Pending</option>
																															</select><br>
<input type="submit" value="Submit" name="submit">    <button><a href="manageleave.php">Back</a></button>
</pre>
</form>
</div>
</body>
</html>