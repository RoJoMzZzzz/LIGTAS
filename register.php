<?php
include 'dbconnect.php';session_start();
$_SESSION["succ"]='';
$_SESSION["fail"]='';
echo$_SESSION["search"] ='';

?>

<!DOCTYPE html>
<html>
<head>
	<title>LIGTAS</title>
	<meta http-equiv="x-ua-compatible" content="IE=edge" />
	<meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">

	<link rel="stylesheet" href="register.css" type="text/css" media="screen">

	<link rel="shortcut icon" type="image/png" href="images/logo.png">

  <style type="text/css">
    <!--
    a { text-decoration : none;}
    -->

    .submitStyle{
  cursor: pointer;
  width:85%;
  height:47px;
  border-radius:5px;
  padding:5px;
  text-align: center;
  border:0px;
  font-family: arial;
  color:#fff;
  background:#42ac02;
  font-weight: bold;
}

.submitStyle:focus {
    outline:none;
}
    </style>

</head>
<body>
<center>
<br><br>

<div class="formCon">
<form method="post">
	<input type="text" name="uname" placeholder="USERNAME" class="emailClass" id="uname" required>
	<br><br>
	<input type="password" name="password" placeholder="PASSWORD" class="emailClass" id="pass" required>
	<br><br>
	<input type="text" name="fname" placeholder="First Name" class="emailClass" id="fname" required>
	<br><br>
	<input type="text" name="mname" placeholder="Middle Name" class="emailClass" id="mname" required>
	<br><br>
	<input type="text" name="lname" placeholder="Last Name" class="emailClass" id="lname" required>
	<br><br>
	<select name="gender" class="emailClass" id="gender" required>
	<option class="dO">Gender</option> 
	<option>Male</option>
	<option>Female</option>
	</select>
	<br><br>
	<input type="text" name="address" placeholder="Address" class="emailClass" id="address" required>
	<br><br>
	<input type="text" name="email" placeholder="Email" class="emailClass" id="email" required>
	<br><br>
	<input type="text" name="org" placeholder="Organizational" class="emailClass" id="org" >
	<br><br>
	<input type="text" name="phone" placeholder="Phone" class="emailClass" id="phone" >
	<br><br>
	<input type="submit" name="signUp" value="SIGN UP" class="submitStyle">

</form>
<br>
</div>
</center>


<?php 
if(isset($_POST['signUp'])){


		$lname = mysql_real_escape_string($_POST ['lname']);
		$fname = mysql_real_escape_string($_POST ['fname']);
		$mname = mysql_real_escape_string($_POST ['mname']);
		$username = mysql_real_escape_string($_POST ['uname']);
		$pass = mysql_real_escape_string($_POST ['password']);
		$gender = mysql_real_escape_string($_POST ['gender']);
		$address = mysql_real_escape_string($_POST ['address']);
		$email = mysql_real_escape_string($_POST ['email']);
		$org = mysql_real_escape_string($_POST ['org']);
		$phone = mysql_real_escape_string($_POST ['phone']);





$sql= "INSERT INTO user VALUES('$username','$pass','$fname','$mname','$lname','$gender','$address', '$email', '$org', '$phone')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
	 header('location:index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


?>

</body>

</html>