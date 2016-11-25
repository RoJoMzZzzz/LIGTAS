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

	<link rel="stylesheet" href="account.css" type="text/css" media="screen">

	<link rel="shortcut icon" type="image/png" href="images/logo.png">

	<style type="text/css">
		<!--
		a { text-decoration : none;}
		-->
		</style>

</head>
<body>
<center>

<div class="menuCon">

<div class="accountNameCon">

<div class="picCon">
<div class="profilePic"> <img src="images/profileWhite.png" width="50px"></div>
</div>

<div class="nameCon" align="left">
<?php
	$un = $_SESSION["userLoggedIn"];

	$sql = 'SELECT * FROM user where username="'.$un.'"';

	$result1 = $conn->query($sql);
                        
                        if ($result1->num_rows > 0) {
                        // output data of each row
   
                        while($row = $result1->fetch_assoc()) {
                        	 echo "{$row['fname']} {$row['lname']}";
                        }

                         } 
                    else {
    
                    }

?>

</div>
</div>

<a href="logout.php" target="_parent">
<div class="logout">

	Logout

</div>

</a>




	</center>
</body>

</html>