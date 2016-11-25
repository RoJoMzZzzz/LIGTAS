<?php
include 'dbconnect.php';session_start();
$_SESSION["succ"]='';
$_SESSION["fail"]='';
echo$_SESSION["search"] ='';

?>
<html>
<body>
<form method="post" enctype="multipart/form-data">
</br>
	<input type="file" name="image" accept="image/*" capture="camera">
</br></br>
<input type="submit" name="sumit" value="Upload">
</form>
<?php 
$con=mysql_connect("localhost","root","");
	mysql_select_db("ligtasdb",$con);
	$loc=$_POST["loc"];

if (isset($_POST['sumit'])){

	if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
	{
		echo "Please select an image";
	}
	else{
		$image=addslashes($_FILES['image']['tmp_name']);
	//	$name=addslashes($_FILES['image']['name']);
		$image=file_get_contents($image);
		$image=base64_encode($image);

			$qry="insert into post values ('".$image."','".$loc."')";
	$result=mysql_query($qry,$con);
	if($result){
		echo "</br>UPLOADED ";
	}
	else {
		echo "</br>nOT UPLOADED ";
	}
		//saveimage($image,$loc);
}
}
//function saveimage(){



	

//}
?>


</body>
</html>