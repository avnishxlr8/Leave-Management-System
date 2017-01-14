<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html><head><title>Change Password</title>
</head>

<body>

<?php 
session_start();
include "connect.php";
include 'empmenu.php';
?>
<div class="changepwd">Change Password</div><br>
<div class="loginbox">
<form id="changepw" name="changeadminpw" method="post" action="<?=$_SERVER['PHP_SELF']?>">
<pre>
Old Password:         <input type="password" name="oldemppwd"><br><br>
New Password:         <input type="password" name="newemppwd"><br><br>
Confirm New Password: <input type="password" name="cnewemppwd"><br><br>
<input type="submit" name="submit" value="Change Password">&nbsp;&nbsp;<input type="reset" name="reset" value="Reset">
</pre>
</form>
</div>
<?php
if(isset($_POST['submit']))
{
$oldpwd=$_POST['oldemppwd'];
$cnewpwd=$_POST['cnewemppwd'];
$newpwd=$_POST['newemppwd'];
$result = mysql_query("SELECT * from emp_info WHERE username='" . $_SESSION['sess_user'] . "'");
$row=mysql_fetch_array($result);
if($oldpwd == $row["pwd"] && $newpwd == $cnewpwd) {
mysql_query("UPDATE emp_info set pwd='" . $_POST["newemppwd"] . "' WHERE username='" . $_SESSION['sess_user'] . "'");
echo "<center><p><b>Password changed successfully</b></p></center>";
header( "refresh:0.2;url=empdesk.php" );
}
else{
 echo "<center><p style='color:red;'>Password is not correct</p></center>";
       }    
}
?>
</body>
</html>