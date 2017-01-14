<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
form {
    width: 80%;
    margin: 0 auto;
}

label, input {
    /* in order to define widths */
    display: inline-block;
}

label {
    width: 30%;
    /* positions the label text beside the input */
    text-align: right;
}

label + input {
    width: 30%;
    /* large margin-right to force the next element to the new-line
       and margin-left to create a gutter between the label and input */
    margin: 0 30% 0 4%;
}

/* only the submit button is matched by this selector,
   but to be sure you could use an id or class for that button */
input + input {
    float: right;
}
</style>
</head>
<body>
  <form action="" method="post">
    <label> Username </label>
    <input type="text"/>

    <label> Password </label>
    <input type="password"/>

    <input type="submit" value="submit"/>
  </form>
</body>
</html>
