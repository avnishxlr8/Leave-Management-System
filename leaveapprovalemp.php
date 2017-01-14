<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Leave Status</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
tr{
 color:#996633;
}
th{
 color:#000000;
}
#add{
 margin-left:530px;
}
</style>
</head>
<body>
<?php
session_start();
include "connect.php";
include "empmenu.php";
$result = mysql_query("SELECT * from emp_info INNER JOIN leave_status ON emp_info.emp_id=leave_status.emp_id WHERE username='" . $_SESSION['sess_user'] . "'");
if($result==FALSE) {
  die('Error: ' . mysql_error($con));
}
$row=mysql_fetch_array($result);
$startdate=$row['startdate'];
if($startdate==NULL)
echo "<h2>NO LEAVE APPLIED</h2>";
else
{
?>
<span class="subhead">&nbsp;&nbsp;&nbsp;&nbsp;Application Status</span><br><br>
<form name="leavetable" id="leavetable" action="leaveapproval.php" method="get">
<table border="1" width="30%" height="30%"> 
<tr>
<!--<th>SELECT</th>--->
<th>Username</th>
<th>Leave Type</th>
<th>Starting Date</th>
<th>Ending Date</th>
<th>Applying Date</th>
<th>No. of Days</th>
<th>Leave Purpose</th>
<th>Status</th>
</tr> 

<?php
//while($row=mysql_fetch_array($result))
//{
	echo "<tr>";
	echo "<td>".$row['username']."</td>";
	echo "<td>".$row['leavetype']."</td>";
	echo "<td>".$row['startdate']."</td>";
	echo "<td>".$row['enddate']."</td>";
	echo "<td>".$row['appdate']."</td>";
	echo "<td>".$row['leavespan']."</td>";
	echo "<td>".$row['lpurpose']."</td>";
	echo "<td>".$row['lstatus']."</td>";
	echo "</tr>";
       
//}
}
?>
</form>
</body>
</html>