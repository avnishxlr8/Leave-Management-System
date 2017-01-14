<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
include "connect.php";
include "adminmenu.php";
$result = mysql_query("SELECT * from emp_info INNER JOIN leave_status ON emp_info.emp_id=leave_status.emp_id WHERE startdate IS NOT NULL");
 if(mysql_num_rows($result)==0)
echo "<h2>NO RECORDS<h2>";
else{
?>
<div class="leavetable">
<span class="leavehead">&nbsp;&nbsp;&nbsp;&nbsp;Manage Leave Sanction</span><br><br>
<form name="leavetable"  action="leaveapproval.php" method="get">
<table border="1" width="30%" height="30%"> 
<tr>
<!--<th>SELECT</th>--->
<th>Name</th>
<th>Starting Date</th>
<th>No. of Days</th>
<th>Status</th>
</tr> 
<?php
while($row=mysql_fetch_array($result))
{
	echo "<tr>";
	
	echo "<td><a href=\"leaveapproval.php?employee={$row['fullname']}\">{$row['fullname']}</a></td>";
	//echo "<td>".$row['fname']." ".$row['lname']."</td>";
	echo "<td>".$row['startdate']."</td>";
	echo "<td>".$row['leavespan']."</td>";
	echo "<td>".$row['lstatus']."</td>";
       
}
}
?>
</form>
</div>
</body>
</html>