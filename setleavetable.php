<?php
include "connect.php"; 
$sql="SELECT MAX(emp_id) from emp_info";
$result=mysql_query($sql);
if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
else
{
 $row=mysql_fetch_array($result);
 $empid=$row['0'];
 $sql1="INSERT INTO leave_status(emp_id,balleave,cl,ml,el,hpl)
         VALUES('$empid',21,7,7,7,7)";
		 $result=mysql_query($sql1);
         if($result === FALSE) {
    die(mysql_error()); // TODO: better error handling
                               }
 }
?>