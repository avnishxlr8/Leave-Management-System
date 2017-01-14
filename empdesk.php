<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Employee Desk</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
session_start();
include "connect.php"; 
include 'empmenu.php';
$result = mysql_query("SELECT * from emp_info WHERE username='" . $_SESSION['sess_user'] . "'");
if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
else
{
 $row=mysql_fetch_array($result);
 echo "<h1>Welcome&nbsp&nbsp";
 echo $row['fname'];
 echo "</h1>";
}
?>
</body>
</html>
