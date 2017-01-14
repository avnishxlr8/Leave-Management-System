<?php
//this is for updating employee by employee
session_start();
$con=mysql_connect('localhost','root','');
if(! $con )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('leave_management') or die("cannot select db");
$result = mysql_query("SELECT * from emp_info WHERE username='" . $_SESSION['sess_user'] . "'");
$row=mysql_fetch_array($result);

if($_POST['submit'])
{
if(! get_magic_quotes_gpc() )
{
   $username = addslashes ($_POST['username']);
   $fname = addslashes ($_POST['fname']);
   $mname = addslashes ($_POST['mname']);
   $lname = addslashes ($_POST['lname']);
   $address = addslashes ($_POST['address']);
   $country = addslashes ($_POST['country']);
   $state = addslashes ($_POST['state']);
   $city = addslashes ($_POST['city']);
   $email = addslashes ($_POST['email']);
   $contactno = addslashes ($_POST['contactno']);
   $deptname = addslashes ($_POST['deptname']);
   $designation = addslashes ($_POST['desig']);
}
else
{
   $username = $_POST['username']; 
   $fname = $_POST['fname'];
   $mname = $_POST['mname'];
   $lname = $_POST['lname'];
   $address = $_POST['address'];
   $country = $_POST['country'];
   $state = $_POST['state'];
   $city = $_POST['city'];
   $email = $_POST['email'];
   $contactno = $_POST['contactno'];
   $deptname = $_POST['deptname'];
   $designation = $_POST['desig'];
}
$id=$row['0'];
$fullname=$fname." ".$lname;
	$sql="UPDATE emp_info set username='$username',fname='$fname',mname='$mname',lname='$lname',address='$address',country='$country',state='$state',city='$city',email='$email',contactno='$contactno',deptname='$deptname',designation='$designation',fullname='$fullname' WHERE emp_id = '$id'"; 
$result=mysql_query($sql);
if(!($result)) {
  die('Error: ' . mysql_error($con));
}
else
header("Location:updateempsuccess.php");

mysql_close($con);
}
?>
