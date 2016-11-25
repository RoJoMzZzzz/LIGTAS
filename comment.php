<!DOCTYPE HTML>
<?php
include 'dbconnect.php';session_start();
$_SESSION["succ"]='';
$_SESSION["fail"]='';
echo$_SESSION["search"] ='';

?>


<html lang="en-US">
    <head>
        <title>Umak Alumni Tracker</title>
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <link rel="shortcut icon" type="image/png" href="umak.png">

        <link rel="stylesheet" type="text/css" href="post.css" />


    </head>
    <body>

    	<center>
            <div id="wallpost" class="wallComment">


<?php

	$id = mysql_real_escape_string($_POST ['postId']);
	$_SESSION['postIdActive'] = $id;

	$sql = 'SELECT * FROM post where id="'.$id.'"';
                 $result = $conn->query($sql);
                 $x=0;
                    if ($result->num_rows > 0) {
                    // output data of each row
   
                    while($row = $result->fetch_assoc()) {

                    	$post = $row['post'];
                        $userName = $row['username'];
                        $date = $row['date'];
                        $postId = $row['id'];

                        $sql1 = 'SELECT * FROM user where username="'.$userName.'"';
                        $result1 = $conn->query($sql1);
                        
                        if ($result1->num_rows > 0) {
                        // output data of each row
   
                        while($row = $result1->fetch_assoc()) {

                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $fullname = $fname." ".$lname;
                    }
                    
                    }

                        /*$fullname = $row['fname'] +" "+$row['lname'];*/

                     	echo "<div class='wallpost2'>";
                        echo "<div class='profileContainer'>";
                        echo "<div class='profilePic'><img src='images/profileWhite.png' width='50px'></div>";
                        echo "<div id='nameA' class='name' align='left'>$fullname</div>";
                        echo "<div class='timeContainer1' align='left'>$date</div>";
                        echo "</div>";
                        
                        echo "<div class='post' align='left'>$post</div><div class='line2'>";
                        

                        
                        


                        echo "<input type='submit' class='comment' value=''>";
                        //echo "<img src='icons/greyComment.png' height='20px'>";
                        echo "</div>";
                       
                    
                     }
   
                     } 
                    else {
    
                    }



   

                   

?>              <script src="jquery/jqueryAjax.js"></script>
                    <!--<script src="jquery/jquery.js"></script>-->
                

                
                <script type="text/javascript">
                function get(){
                        var name= $("#name").val();
                    
                    var date = $("#dateCom").val();

                    var input = $("#cmt").val();
                    $.post('add_comment.php', {comment:input, date:date}, function(output){
                    //$("#comments").prepend("<div class='commentCon2'><div class='profileContainer'><div class='profilePic2'><img src='profileWhite.png' width='40px'></div><div id='nameA' class='name' align='left'>"+name+"</div><div class='timeContainer1'>"+date+"</div></div><div class='post' align='left'>"+output+"</div>")});
                    $("#comments").prepend("")});
                    


                    document.getElementById("cmt").value = "";


                    }

                    
                    
                    


                    

                </script>
				<div class='numLikes'></div>
                
				<div class="comments" id="comments">
                    


                <script type="text/javascript">

                var auto_load = setInterval(
                    function ()
                    {
                    $('#comments').load('loadComment.php');
                    }, 10);

                </script>
				


                <?php
            	/*$un = $_SESSION["userLoggedIn"];

            	$postID = $_SESSION['postIdActive'];

                 $sql = 'SELECT * FROM comment where post_id = "'.$postID.' " order by id';
                 $result = $conn->query($sql);
                 
                    if ($result->num_rows > 0) {
                    // output data of each row
   
                    while($row = $result->fetch_assoc()) {
                        $comment = $row['comment'];
                        $userName = $row['username'];
                        $date = $row['dateAndTime'];
                        $postId = $row['id'];

                        $sql1 = 'SELECT * FROM alumni where username="'.$userName.'"';
                        $result1 = $conn->query($sql1);
                        
                        if ($result1->num_rows > 0) {
                        // output data of each row
   
                        while($row = $result1->fetch_assoc()) {

                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        $fullname = $fname." ".$lname;
                    }
                    
                    }

                        /*$fullname = $row['fname'] +" "+$row['lname'];*/

                     //echo "<input type='hidden' id='name' name='username' value='{$row['fname']} {$row['lname']}'>";
                    
                    /*    echo "<div class='commentCon2'>";
                        echo "<div class='profileContainer'>";
                        echo "<div class='profilePic2'><img src='profileWhite.png' width='40px'></div>";
                        echo "<div id='nameA' class='nameCom' align='left'>$fullname</div>";
                        echo "<div class='commentDisplay' align='left'>$comment</div>";

                        echo "<div class='timeContainerCom' align='left'>$date</div>";
                        echo "</div><div class='line2'>";

                        
                        
                        
                     }
   
                     } 
                    else {
    
                    }

   

                    */


            ?>
                


				

				
			



			



                </div>
                <div class='commentCon'>

                    
                    <div class="profilePic2"> <img src="images/profileWhite.png" width="40px"></div>
                <form>
                    <textarea id="cmt" class="commentTB" rows="4" cols="50" placeholder="Write a comment..."></textarea>
                    <input type='hidden' id='dateCom' name='date'>
                    <?php

                 $un = $_SESSION["userLoggedIn"];
                 $sql = 'SELECT * FROM user where username="'.$un.'"';
                 $result = $conn->query($sql);
                 $x=0;
                    if ($result->num_rows > 0) {
                    // output data of each row
   
                    while($row = $result->fetch_assoc()) {

                        /*$fullname = $row['fname'] +" "+$row['lname'];*/

                     echo "<input type='hidden' id='name' name='username' value='{$row['fname']} {$row['lname']}'>";
                    
                     }
   
                     } 
                    else {
    
                    }

   

                    ?>

                
                <input type="button" value="Post" class="submitStyle2" onClick="get()">

                </form>
                </div>
                
</div>
	<script type="text/javascript">
	var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                    var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

                    var d = new Date();
                     var day = days[d.getDay()];
                    var hr = d.getHours();
                    var ampm = hr >= 12 ? 'pm' : 'am';
                    hr = hr % 12;
                    hr = hr ? hr : 12; // the hour '0' should be '12'
                    var min = d.getMinutes();
                    if (min < 10) {
                        min = "0" + min;
                    }
                    
                    var date = d.getDate();
                    var month = months[d.getMonth()];
                    var year = d.getFullYear();
                    var x = document.getElementById("dateCom");
                    //x.innerHTML = day + " " + hr + ":" + min + ampm + " " + date + " " + month + " " + year;

                    x.value = month+" "+date+", "+year+" at "+hr+":"+min + ampm;
</script>
</center>




    </body>
    </html>
