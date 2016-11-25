<?php
include 'dbconnect.php';session_start();
$_SESSION["succ"]='';
$_SESSION["fail"]='';
echo$_SESSION["search"] ='';

?>

<?php

$un = $_SESSION["userLoggedIn"];
$user = mysql_real_escape_string($un);
$pst = $_POST['wallPost'];
$date = $_POST['date'];
$postA = mysql_real_escape_string($pst);
$dateAndTime = mysql_real_escape_string($date);
$sql="INSERT INTO post(id, post, username, date) VALUES (' ', '$postA', '$user', '$dateAndTime')";
if ($conn->query($sql) === TRUE) {
echo $pst;
}
else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
?>