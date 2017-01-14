<html>
<?php
session_start();
include "connect.php";
$oldpwd=$_POST['oldemppwd'];
$cnewpwd=$_POST['cnewemppwd'];
$newpwd=$_POST['newemppwd'];
if(count($_POST)>0) {
$result = mysql_query("SELECT * from emp_info WHERE username='" . $_SESSION['sess_user'] . "'");
$row=mysql_fetch_array($result);
if($oldpwd == $row["pwd"] && $newpwd == $cnewpwd) {
mysql_query("UPDATE emp_info set pwd='" . $_POST["newemppwd"] . "' WHERE username='" . $_SESSION['sess_user'] . "'");
$message = "Password Changed";
echo $message;
header("location:empdesk.php");
} else{
 $message = "Current Password is not correct";
 echo $message."<br>";
 echo "<a href=\"changeemppwd.php\" target=\"_self\">Click here to move back to Change Password</a>";
       }    
}
?>
</html>