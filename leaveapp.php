<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Leave Application</title>
<script>
function validate()
{
   

   if( document.leaveapp.startdate.value == "")
   {
     alert( "Please provide starting date!");
     document.addemp.username.focus() ;
     return false;
   }
   if( document.leaveapp.enddate.value == "" )
   {
     alert( "Please provide  ending date!");
     document.addemp.pwd.focus() ;
     return false;
   }
   if( document.leaveapp.lspan.value == "")
   {
     alert( "Please provide number of days");
     document.addemp.fname.focus() ;
     return false;
   }
   if( document.leaveapp.lpurpose.value == "")
   {
     alert( "Please provide leave purpose" );
	 document.addemp.mname.focus() ;
     return false;
   }
 
   return( true );
}
</script>
</head>
<body>
<?php
session_start();
include "connect.php";
include "empmenu.php";
$result = mysql_query("SELECT * from emp_info INNER JOIN leave_status ON emp_info.emp_id=leave_status.emp_id WHERE username='" . $_SESSION['sess_user'] . "'");
$row=mysql_fetch_array($result);
$cl=$row['cl'];
$el=$row['el'];
$hpl=$row['hpl'];
$ml=$row['ml'];
$bl=$row['balleave'];
if($result == FALSE) {
    die(mysql_error()); // TODO: better error handling
}
if($bl==0)
{
echo "<h1>Balance leave is 0</h1>";
echo "<br>";
echo "<center><p><b>Redirecting to employee desk in 5 seconds<b></p></center>";
header( "refresh:5;url=empdesk.php" );
}
else
{
?>
<div id="watermark"><img src="empinfo.jpg" class="bg"></div>
<span class="subhead">&nbsp;&nbsp;&nbsp;&nbsp;Leave Application</span> 
<form name="leaveapp" id="form" method="POST" onsubmit="return validate();" action="<?=$_SERVER['PHP_SELF']?>">
<pre>
User Name:    <input type="text" name="username" value="<?php echo $row['username'];?>" ><br>
Leave Type:   <select name="leavetype">
<option>Casual Leave</option>
<option>Medical Leave</option>
<option>Earned Leave</option>
<option>Half Paid Leave</option>
</select>
<!--<input type="hidden" name="selected_text" id="selected_text" value="" />-->
Balance Leave:<input type="text" name="balleave" value="<?php echo $row['balleave'];?>"><br>
Start Date:   <input type="text" name="startdate">&nbsp;&nbsp;(DD/MM/YYYY)<br>
Ending Date:  <input type="text" name="enddate">&nbsp;&nbsp;(DD/MM/YYYY)<br>
No. of Days:  <input type="text" name="lspan"><br>
Purpose: <br>
<div style="margin-left: 50px;">       <textarea wrap="off" cols="16" rows="4" name="lpurpose"></textarea><br>
</div><br>
<input type="submit" name="submit" value="Submit">
</pre>
</form>
<?php

if(isset($_POST['submit']))
{
	 /* if(! get_magic_quotes_gpc() )
	{
	   $username = addslashes($_POST['username']);
	   $leavetype = addslashes($_POST['leavetype']);
	   $balleave = addslashes($_POST['balleave']);
	   $startdate = addslashes($_POST['startdate']);
	   $enddate = addslashes($_POST['enddate']);
	   $lspan = addslashes($_POST['lspan']);
	   $lpurpose = addslashes($_POST['lpurpose']);
	 }*/
	//else
	//{
		   $username = ($_POST['username']);
		   $leave =  ($_POST['leavetype']);
		  // $balleave = ($_POST['balleave']);
		   $startdate = ($_POST['startdate']);
		   $enddate = ($_POST['enddate']);
		   $lspan = ($_POST['lspan']);
		   $lpurpose = ($_POST['lpurpose']);
	//}
	$casualleave='Casual Leave';
	$earnedleave='Earned Leave';
	$medicalleave='Medical Leave';
	$hpleave='Half Paid Leave';
	$time=time();
	$appdate=date('d m Y',$time);
	$empid=$row['emp_id'];
	if(empty($startdate) || empty($enddate) || empty($lspan) || empty($lpurpose))
	{}
	else{
	if($leave==$casualleave)
	{
	 $leave=$cl--;
	 $bl--;
	 $sql="UPDATE leave_status SET balleave='$bl',cl='$leave',startdate='$startdate',enddate='$enddate',appdate='$appdate',leavespan='$lspan',lpurpose='$lpurpose',leavetype='$casualleave' WHERE emp_id='$empid'";
	}
	if($leave==$medicalleave)
	{
	 $leave=$ml--;
	 $bl--;
	 $sql="UPDATE leave_status SET balleave='$bl',ml='$leave',startdate='$startdate',enddate='$enddate',appdate='$appdate',leavespan='$lspan',lpurpose='$lpurpose',leavetype='$medicalleave' WHERE emp_id='$empid'";
	}
	if($leave==$earnedleave)
	{
	 $leave=$el--;
	 $bl--;
	 $sql="UPDATE leave_status SET balleave='$bl',el='$leave',startdate='$startdate',enddate='$enddate',appdate='$appdate',leavespan='$lspan',lpurpose='$lpurpose',leavetype='$earnedleave' WHERE emp_id='$empid'";
	}
	if($leave==$hpleave)
	{
	 $leave=$hpl--;
	 $bl--;
	 $sql="UPDATE leave_status SET balleave='$bl',hpl='$leave',startdate='$startdate',enddate='$enddate',appdate='$appdate',leavespan='$lspan',lpurpose='$lpurpose',leavetype='$hpleave' WHERE emp_id='$empid'";
	}



$result=mysql_query($sql);
if(!($result)) {
  die('Error: ' . mysql_error($con));
}
else
header("Location:leaveappmsg.php");


mysql_close($con);
}
}
}  
?>
</body>
</html>