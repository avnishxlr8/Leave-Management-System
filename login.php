<html>
<!--emplogin php -->
<?php
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
  echo "Invalid Username Or Password";
  echo "<a href=\"emplog.html\" target=\"_self\">Click here to move back to Login page</a>";
  }
?>
</html>
