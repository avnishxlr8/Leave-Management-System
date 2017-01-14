<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
include "connect.php";
include "adminmenu.php";
$employee = isset($_GET['employee']) ? $_GET['employee'] : '';
if ($employee) {

  $result=mysql_query("SELECT * FROM emp_info WHERE fullname='".$employee."' ");
} else {

	echo "<script>alert('No details')</script>";

}

//-run the query against the mysql query function


//-count results

//$numrows=mysql_num_rows($result);

//echo "<p>" .$numrows . " results found "; 


//while($emp=mysql_fetch_array($result))
//{
	/*echo "<tr>";
	echo "<td>".$emp['emp_id']."</td>";
	echo "<td>".$emp['fname']." ".$emp['lname']."</td>";
	echo "<td>".$emp['address']."</td>";
	echo "<td>".$emp['contactno']."</td>";
	echo "<td>".$emp['email']."</td>";
	echo "<td>".$emp['designation']."</td>";*/
	    
$emp=mysql_fetch_row($result);
?>
<div id="watermark"><img src="empinfo.jpg" class="bg"></div>
<span class="subhead">&nbsp;&nbsp;&nbsp;&nbsp;Employee Info</span><br><br>
<form name="empinfo" id="form" action="">
<pre>
Employee ID:     <input name="username" type="text" value="<?php echo $emp['0'];?>"><br>
First Name:      <input name="fname" type="text" value="<?php echo $emp['3'];?>"><br>
Middle Name:     <input name="mname" type="text" value="<?php echo $emp['4'];?>"><br>
Last Name:       <input name="lname" type="text" value="<?php echo $emp['5'];?>"><br>
Address:         
                 <textarea wrap="on" cols="16" rows="4" name="address"><?php echo $emp['7'];?></textarea><br>
Country:         <input name="country" type="text" value="<?php echo $emp['8'];?>"><br>
State:           <input name="state" type="text" value="<?php echo $emp['9'];?>"><br>
City:            <input name="city" type="text" value="<?php echo $emp['10'];?>"><br>
Email ID:        <input name="email" value="<?php echo $emp['11'];?>"><br>
Contact No.:     <input name="contactno" type="text" value="<?php echo $emp['12'];?>"><br>
Dept Name:       <input name="deptname" type="text" value="<?php echo $emp['13'];?>"><br>
Designation:     <input name="desig" type="text" value="<?php echo $emp['14'];?>"><br>
</pre>
</form>
</body>
</html>