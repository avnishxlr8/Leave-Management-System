<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script>
function validate()
{
 var emailID = document.empinfo.email.value;
   atpos = emailID.indexOf("@");
   dotpos = emailID.lastIndexOf(".");
   
   if( document.empinfo.username.value == "")
   {
     alert( "Please provide username!");
     document.empinfo.username.focus() ;
     return false;
   }
   if( document.empinfo.fname.value == "")
   {
     alert( "Please provide first name");
     document.empinfo.fname.focus() ;
     return false;
   }
   if( document.empinfo.mname.value == "")
   {
     alert( "Please provide middle name" );
	 document.empinfo.mname.focus() ;
     return false;
   }
    if( document.empinfo.lname.value == "")
   {
     alert( "Please provide last name");
	 document.empinfo.lname.focus() ;
     return false;
   }
   if (atpos < 1 || ( dotpos - atpos < 2 )) 
   {
       alert("Please enter correct email ID")
       document.empinfo.email.focus() ;
       return false;
   }
   
    if( document.empinfo.contactno.value == "" || isNaN( document.empinfo.contactno.value ) ||
           document.empinfo.contactno.value.length !=10)
   {
     alert( "Please provide your appropriate Mobile No.");
	 document.empinfo.contactno.focus() ;
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
//$employee = isset($_GET['employee']) ? $_GET['employee'] : '';
//if ($employee) {

  //$sql="SELECT * FROM emp_info WHERE fullname='".$employee."' ";
$result = mysql_query("SELECT * from emp_info WHERE username='" . $_SESSION['sess_user'] . "'");

//} else {

	//echo "<script>alert('No details')</script>";

//}

//-run the query against the mysql query function
//$result=mysql_query($sql);

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
<form name="empinfo"  id="form" action="updateempinfo.php" method="POST" onsubmit="return validate();">
<!----->
<pre>
UserName:     <input name="username" type="text" value="<?php echo $emp['1'];?>"><br>
First Name:   <input name="fname" type="text" value="<?php echo $emp['3'];?>"><br>
Middle Name:  <input name="mname" type="text" value="<?php echo $emp['4'];?>"><br>
Last Name:    <input name="lname" type="text" value="<?php echo $emp['5'];?>"><br>
Address:
<div style="margin-left:50px;">       <textarea wrap="on" cols="16" rows="4" name="address"><?php echo $emp['7'];?></textarea><br>
</div>
Country:      <input name="country" type="text" value="<?php echo $emp['8'];?>"><br>
State:        <input name="state" type="text" value="<?php echo $emp['9'];?>"><br>
City:         <input name="city" type="text" value="<?php echo $emp['10'];?>"><br>
Email ID:     <input name="email" value="<?php echo $emp['11'];?>">
   <br>
Contact No.:  <input name="contactno" type="text" value="<?php echo $emp['12'];?>"><br> 
Dept Name:    <input type="text" value="<?php echo $emp['13'];?>">

Update Department:<select name="deptname">
																															 <option>Human Resources</option>
																															<option>R&D</option>
																															<option>Software Testing</option>
																															</select><br>

Designation:  <input type="text" value="<?php echo $emp['14'];?>">

Update Designation:<select name="desig">
																	<option>Sr.Software Engg</option>
																	<option>Jr.Software Engg</option>
</select><br>
<br>
<input type="submit" value="Update" name="submit">       <button><a href="empdesk.php">Back</a></button>
</pre>
</form>
<?php //} ?>
</body>
</html>