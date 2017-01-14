<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html><head><title>Change Password</title>
</head>
<body>
<?php 
include 'adminmenu.php';
include 'connect.php';
?>
<div class="changepwd">Change Password</div><br>
<div class="loginbox">
<form id="form" name="changeadminpw" method="post" action="<?=$_SERVER['PHP_SELF']?>">
<pre>
Old Password:              <input type="password" name="oldadminpwd"><br><br>
New Password:              <input type="password" name="newadminpwd"><br><br>
Confirm New Password:      <input type="password" name="cnewadminpwd"><br><br>
<input type="submit" name="submit" value="Change Password">&nbsp&nbsp<input type="reset" name="reset" value="Reset">
</pre>
</form>
</div>
<?php
if(isset($_POST['submit']))
{
$oldpwd=$_POST['oldadminpwd'];
$cnewpwd=$_POST['cnewadminpwd'];
$newpwd=$_POST['newadminpwd'];
$result = mysql_query("SELECT * from admin_login WHERE name='admin'");
$row=mysql_fetch_array($result);
if(($oldpwd == $row['pwd']) && ($cnewpwd==$newpwd)) {
mysql_query("UPDATE admin_login set pwd='" . $newpwd . "' WHERE name='admin'");
echo "<center><p><b>Password changed successfully</b></p></center>";
header( "refresh:0.2;url=empdesk.php" );
}
else{
 echo "<center><p style='color:red;'>Password is not Correct</p></center>";
       }    
}
?>
</body>
</html>