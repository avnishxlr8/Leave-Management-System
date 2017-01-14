
<?php
$con=mysqli_connect("localhost","root","","leave_management");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$username = mysqli_real_escape_string($con, $_POST['username']);
$pwd = mysqli_real_escape_string($con, $_POST['pwd']);


$sql="INSERT INTO emp_info(username,pwd)
VALUES ('$username', '$pwd')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

mysqli_close($con);

?>
