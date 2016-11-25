<?php
include 'dbconnect.php';session_start();
$_SESSION["succ"]='';
$_SESSION["fail"]='';
echo$_SESSION["search"] ='';

?>

<?php

$un = $_SESSION["userLoggedIn"];
$postId = $_SESSION['postIdActive'];

$user = mysql_real_escape_string($un);
$IdPost = mysql_real_escape_string($postId);
$cmt = $_POST['comment'];
$date = $_POST['date'];
$cmtA = mysql_real_escape_string($cmt);
$dateAndTime = mysql_real_escape_string($date);
$sql="INSERT INTO comment(id, post_id, comment, username, dateAndTIme) VALUES (' ', '$IdPost', '$cmtA', '$user', '$dateAndTime')";
if ($conn->query($sql) === TRUE) {
echo $cmt;
}
else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
?>