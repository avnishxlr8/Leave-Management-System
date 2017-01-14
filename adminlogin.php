<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base target="admindes">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ADMIN LOGIN</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
   <div align="center" class="heading">E LEAVE MANAGEMENT SYSTEM</div><br><br>
 <h4><a href="index.php">BACK</a></h4>
<h3>ADMIN</h3>
<div class="loginbox">
<form id="adminlog" name="adminlog" method="post" action="<?=$_SERVER['PHP_SELF']?>">
<pre>
Username:<input type="text" name="adminusername"><br><br>
Password:<input type="password" name="adminpwd"><br><br>
<input type="submit" name="submit" value="Login">
</pre>
</form>
</div>
<?php
if(isset($_POST['submit']))
{
$username=$_POST['adminusername'];
$pwd=$_POST['adminpwd'];
$con=mysql_connect('localhost','root','')or die(mysql_error());
mysql_select_db('leave_management') or die("cannot select db");
$query=mysql_query("SELECT * FROM admin_login WHERE name='".$username."' AND pwd='".$pwd."'");
$numrows=mysql_num_rows($query);
if($numrows!=0)
{
 while($row=mysql_fetch_assoc($query))
 {
   $dbusername=$row['name'];
   $dbpassword=$row['pwd'];
 }
 if($username==$dbusername && $pwd==$dbpassword)
 {
   session_start();
   $_SESSION['sess_user']=$username;
   //echo $_SESSION['sess_user'];
   header("Location:admindesk.php");
 }
}
else
{
  echo "<center><p style='color:red;'>Invalid Username Or Password</p></center>";
}
}
?>
</body>
</html>
