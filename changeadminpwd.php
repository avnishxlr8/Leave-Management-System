<html>
<?php
session_start();
$oldpwd=$_POST['oldadminpwd'];
$cnewpwd=$_POST['cnewadminpwd'];
$newpwd=$_POST['newadminpwd'];
$con=mysql_connect('localhost','root','')or die(mysql_error());
mysql_select_db('leave_management') or die("cannot select db");
if(count($_POST)>0) {
$result = mysql_query("SELECT * from admin_login WHERE name='admin'");
$row=mysql_fetch_array($result);
if(($oldpwd == $row['pwd']) && ($cnewpwd==$newpwd)) {
mysql_query("UPDATE admin_login set pwd='" . $newpwd . "' WHERE name='admin'");
$message = "Password Changed";
 echo $message."<br>";
} else {
else{
 $message = "Current Password is not correct";
 echo $message."<br>";
 echo "<a href=\"changeadminpw.php\" target=\"_self\">Click here to move back to Change Password</a>";
         }
}
?>
</html>