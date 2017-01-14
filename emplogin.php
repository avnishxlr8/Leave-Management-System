<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>EMPLOYEE LOGIN</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
   <div align="center" class="heading">E LEAVE MANAGEMENT SYSTEM</div><br><br>
 <h4><a href="index.php">BACK</a></h4>
<h3>EMPLOYEE</h3>
<div class="loginbox">
<form id="emplog" name="emplog" method="post" action="emplogin.php">
<pre>
Employee ID:<input type="text" name="empusername"><br><br>
Password:   <input type="password" name="emppwd"><br><br>
<input type="submit" name="submit" value="Login">
</pre>
</form>
</div>
<?php
if(isset($_POST['empusername'])&&isset($_POST['emppwd']))
{
$username=$_POST['empusername'];
$pwd=$_POST['emppwd'];
$con=mysql_connect('localhost','root','')or die(mysql_error());
mysql_select_db('leave_management') or die("cannot select db");
$query=mysql_query("SELECT * FROM emp_info WHERE username='".$username."' AND pwd='".$pwd."'");
$numrows=mysql_num_rows($query);
if($numrows!=0)
{
 while($row=mysql_fetch_assoc($query))
 {
   $dbusername=$row['username'];
   $dbpassword=$row['pwd'];
 }
 if($username==$dbusername && $pwd==$dbpassword)
 {
   echo "Login SuccessFul" ;
   session_start();
   $_SESSION['sess_user']=$username;
   header("location:empdesk.php");
 }
}
else{
  echo "<center><p style='color:red;'>Invalid Username Or Password</p></center>";;
  }
}
?>
</body>
</html>
