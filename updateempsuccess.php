<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
include "empmenu.php";
?>
<h1>Your Data is Successfully Updated</h1>
<?php
echo "<center><p><b>Redirecting to employee desk in 5 seconds</b><p></center>";
header( "refresh:5;url=empdesk.php" );
?>
</body>
</html>