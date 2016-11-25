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

	<link rel="stylesheet" href="log-in.css" type="text/css" media="screen">

	<link rel="shortcut icon" type="image/png" href="images/logo.png">

  <style type="text/css">
    <!--
    a { text-decoration : none;}
    -->
    </style>

</head>
<body>
<center>
<br><br>


<div class="logo"><image src="images/logo2.png" width="100%" height="100%"></div>

<br><br><br>

<div class="formCon">
<form method="post">
	<input type="text" name="email" placeholder="USERNAME" class="emailClass" id="email" autocomplete="off">
	<br><br>
	<input type="password" name="password" placeholder="PASSWORD" class="emailClass" id="pass" required autocomplete="off">
	<br><br><br>
	<input type="submit" name="login" value="LOGIN" class="submitStyle">
  <br><br>
  <a href="register.php">Create an account</a>

</form>


<script type="text/javascript">
	document.getElementById('email').onclick = function change(){
		var inputVal = document.getElementById("email");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "yellow";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
	}


	document.getElementById('pass').onclick = function change(){
		var inputVal = document.getElementById("pass");
    if (inputVal.value == "") {
        inputVal.style.backgroundColor = "yellow";
    }
    else{
        inputVal.style.backgroundColor = "";
    }
	}
</script>

<?php 
if(isset($_POST['login'])){
  $search = mysqli_query($conn, "select * from admin where username= '".$_POST['email']."' and password='".$_POST['password']."' ");
  if($search->num_rows){
    $_SESSION['userLoggedIn'] = $_POST['email'];
  header('location:admin.php');
  }
  else{
    $search = mysqli_query($conn, "select * from user where username= '".$_POST['email']."' and password='".$_POST['password']."' ");
    if($search->num_rows){
      $_SESSION['userLoggedIn'] = $_POST['email'];
    header('location:user.php');
    }

  }
}
?>

</div>


</center>
</body>

</html>