<?php
$con=mysql_connect('localhost','root','');
if(! $con )
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('leave_management') or die("cannot select db");
if(! get_magic_quotes_gpc() )
{
   $username = addslashes ($_POST['username']);
   $pwd = addslashes ($_POST['pwd']);
   $fname = addslashes ($_POST['fname']);
   $mname = addslashes ($_POST['mname']);
   $lname = addslashes ($_POST['lname']);
   $sex = addslashes ($_POST['sex']);
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
   $pwd = $_POST['pwd'];
   $fname = $_POST['fname'];
   $mname = $_POST['mname'];
   $lname = $_POST['lname'];
   $sex = $_POST['sex'];
   $address = $_POST['address'];
   $country = $_POST['country'];
   $state = $_POST['state'];
   $city = $_POST['city'];
   $email = $_POST['email'];
   $contactno = $_POST['contactno'];
   $deptname = $_POST['deptname'];
   $designation = $_POST['desig'];
}
$fullname=$fname." ".$lname;
	$sql="INSERT INTO emp_info(username,pwd,fname,mname,lname,sex,address,country,state,city,email,contactno,deptname,designation,fullname)
VALUES ('$username','$pwd','$fname','$mname','$lname','$sex','$address','$country','$state','$city','$email','$contactno','$deptname','$designation','$fullname')";

$result=mysql_query($sql);
if(!($result)) {
  die('Error: ' . mysql_error($con));
}
else{
include "setleavetable.php";
header("location:manageemp.php");
}
mysql_close($con);
?>
