<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Leave Application</title>
</head>
<body>
<?php
session_start();
include "connect.php";
include "empmenu.php";
?>
<h1>Leave Application Sent</h1>
<?php
echo "<center><p><b>Redirecting to employee desk in 5 seconds</b><p></center>";
header( "refresh:5;url=empdesk.php" );
?>
</body>
</html>