<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><title>Add employee</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script>
function validate()
{
 var emailID = document.addemp.email.value;
   atpos = emailID.indexOf("@");
   dotpos = emailID.lastIndexOf(".");
   
   if( document.addemp.username.value == "")
   {
     alert( "Please provide username!");
     document.addemp.username.focus() ;
     return false;
   }
   if( document.addemp.pwd.value == "" )
   {
     alert( "Please provide  passward!");
     document.addemp.pwd.focus() ;
     return false;
   }
   if( document.addemp.fname.value == "")
   {
     alert( "Please provide first name");
     document.addemp.fname.focus() ;
     return false;
   }
   if( document.addemp.mname.value == "")
   {
     alert( "Please provide middle name" );
	 document.addemp.mname.focus() ;
     return false;
   }
    if( document.addemp.lname.value == "")
   {
     alert( "Please provide last name");
	 document.addemp.lname.focus() ;
     return false;
   }
   if (atpos < 1 || ( dotpos - atpos < 2 )) 
   {
       alert("Please enter correct email ID")
       document.addemp.email.focus() ;
       return false;
   }
   
    if( document.addemp.contactno.value == "" || isNaN( document.addemp.contactno.value ) ||
           document.addemp.contactno.value.length !=10)
   {
     alert( "Please provide your appropriate Mobile No.");
	 document.addemp.contactno.focus() ;
     return false;
   }


   return( true );
}

</script>
</head>
<body>
<?php include 'adminmenu.php';?>
<div id="watermark"><img src="empinfo.jpg" class="bg"></div>
<span class="subhead">&nbsp;&nbsp;&nbsp;&nbsp;Add Employee</span> 
<form id="form" name = "addemp" method="post" action="addebya.php" onsubmit="return validate();">
<pre>
Employee User Name:       <input name="username" type="text"><br>
Password: &nbsp;               <input name="pwd" type="password"><br>
First Name:               <input name="fname" type="text"><br>
Middle Name:              <input name="mname" type="text"><br>
Last Name:                <input name="lname" type="text"><br>
Sex:                      <input name="sex" value="male" type="radio">Male<br>
                    &nbsp; &nbsp;&nbsp; &nbsp;<input name="sex" value="female" type="radio">Female<br>
Address: <br>
<div style="margin-left: 50px;">                   <textarea wrap="off" cols="16" rows="4" name="address"></textarea><br>
</div>
Country:                 <input name="country" type="text"><br>
State:                   <input name="state" type="text"><br>
City:                    <input name="city" type="text"><br>
Email ID:                <input name="email" size="30" type="email"><br>
Contact No.:             <input name="contactno" type="text"><br>
Department:              <select name="deptname">
<option>Human Resources</option>
<option>R&D</option>
<option>Software Testing</option>
</select><br>
Designation:             <select name="desig">
<option>Sr.Software Engg</option>
<option>Jr.Software Engg</option>
</select><br>
<input type="submit" value="Add" name="submit">
</pre>
</form>
</div>
</body>
</html>