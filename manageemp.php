<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Manage Employee</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php include "adminmenu.php" ?>
<div class="table">
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("leave_management",$con);
$sql="SELECT * FROM emp_info ";
$result=mysql_query($sql);
 if(mysql_num_rows($result)==0)
  echo "<h2>No data Found</h2>";
 else
{
?>
<span class="subhead">Manage Employee</span><br><br>
<form name="emptable"  action="empinfo.php" method="get">
<!--<form name="emptable" id="emptable" action="<?=$SERVER["PHP SELF"]?>" method="post">-->
<table border="1" width="30%" height="30%"> 
<tr>
<!--<th>SELECT</th>--->
<th>EMPLOYEE ID</th>
<th>NAME</th>
<th>ADDRESS</th>
<th>CONTACT NO</th>
<th>EMAIL ID</th>
<th>DESIGNATION</th>
</tr> 

<?php

/*while($rows = mysql_fetch_array($result,MYSQL_ASSOC))
{ 
$empid              = $rows['emp_id'];
$fname         = $rows['fname'];
$lname         = $rows['lname'];
$address   = $rows['address'];
$contactno         = $rows['contactno'];
$emailid         = $rows['email'];
$designation  = $rows['designation'];
?>
<tr>
<!-- <td><input type="checkbox" name="checkbox[]"></td> -->
<td><b><?php echo $empid;?></b></td>
<td><b><?php echo $fname."&nbsp"; echo $lname; ?></b></td>
<td><b><?php echo $address;?></b></td>
<td><b><?php echo $contactno;?></b></td>
<td><b><?php echo $emailid;?></b></td>
<td><b><?php echo $designation?></b></td>
</td>
</tr>
 
<?php } ?>*/

while($emp=mysql_fetch_array($result))
{
	echo "<tr>";
	
	echo "<td>".$emp['emp_id']."</td>";
	echo "<td><a href=\"empinfo.php?employee={$emp['fullname']}\">{$emp['fullname']}</a></td>";
	//echo "<td>".$emp['fname']." ".$emp['lname']."</td>";
	echo "<td>".$emp['address']."</td>";
	echo "<td>".$emp['contactno']."</td>";
	echo "<td>".$emp['email']."</td>";
	echo "<td>".$emp['designation']."</td>";
       
}
}
?>
</table>
</form>
</div>
</body>
</html>