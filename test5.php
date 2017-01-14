<html>
<body>
<form method="post" action="">
Leave Type:<select name="leavetype">
<option name="cl">Casual Leave</option>
<option name="ml">Medical Leave</option>
<option name="el">Earned Leave</option>
<option name="hpl">Half Paid Leave</option>
</select>
<input type="submit" name="submit" value="submit">
</form>
<?php

/*$time=time();
$appdate=addslashes(date('d/m/Y',$time));
$appdate1=(date('d/m/Y',$time));
echo $appdate;
echo $appdate1;
*/
$leave=$_POST['leavetype'];
$casualleave='Medical Leave';
if($leave==$casualleave)
echo $leave;
echo "<br>";
?>
</body>
</html>