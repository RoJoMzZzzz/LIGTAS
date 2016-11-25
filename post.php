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
        <link rel="stylesheet" type="text/css" href="slidenav/snap.css" />
        <link rel="stylesheet" type="text/css" href="slidenav/demo.css" />
        <link rel="stylesheet" type="text/css" href="post.css" />


    </head>
    <body>

<center>

    	<div class="head1">
                
                <div class="profilePic"> <img src="images/profileWhite.png" width="50px"></div>
                <form>
                    <textarea id="pst" class="statusTB" rows="4" cols="50" placeholder="What's happening around the forest?"></textarea>
                    <input type='hidden' id='date' name='date'>
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

                    <div class="line"></div>
                <input type="button" value="Share" class="submitStyle" id="postBtn" onClick="get()">

</form>
                <br><br><br><br><br><br>
                <script src="jquery/jqueryAjax.js"></script>
                <!--<script src="jquery/jquery.js"></script>-->
                <script type="text/javascript">

                document.getElementById('postBtn').onclick = function update(){
                setInterval(function get(){

                    

                    


                    var name= $("#name").val();
                    
                    var date = $("#date").val();

                    var input = $("#pst").val();

                    if(input != ""){
                    $.post('add_pst.php', {wallPost:input, date:date}, function(output){
                    //$("#wallpost").prepend("<div class='wallpost2'><div class='profileContainer'><div class='profilePic'><img src='profileWhite.png' width='50px'></div><div id='nameA' class='name' align='left'>"+name+"</div><div class='timeContainer1'>"+date+"</div></div><div class='post' align='left'>"+output+"</div><div class='line2'><a href='#'><div class='like'><img src='icons/greyLike.png' height='20px'></div></a><a href='#'><form method='POST' action='commentPage.php'><input type='submit' class='comment' value=''></form></div></div>")});
                    $("#wallpost").prepend("")});
                    }
                    


                    document.getElementById("pst").value = "";


                    


                    




                },1000);
                
                };

                    

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
                    var x = document.getElementById("date");
                    //x.innerHTML = day + " " + hr + ":" + min + ampm + " " + date + " " + month + " " + year;

                    x.value = month+" "+date+", "+year+" at "+hr+":"+min + ampm;


                    var auto_refresh = setInterval(
                    function ()
                    {
                    $('#wallpost').load('loadPost.php');
                    }, 500);
                    

                </script>


</div>
<div id="wallpost" class="wallpost">
<?php
            
            $un = $_SESSION["userLoggedIn"];



                 $sql = 'SELECT * FROM post order by id desc';
                 $result = $conn->query($sql);
                 
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

                     //echo "<input type='hidden' id='name' name='username' value='{$row['fname']} {$row['lname']}'>";
                    
                        echo "<div class='wallpost2' id='wp2'>";
                        echo "<div class='profileContainer'>";
                        echo "<div class='profilePic'><img src='images/profileWhite.png' width='50px'></div>";
                        echo "<div id='nameA' class='name' align='left'>$fullname</div>";
                        echo "<div class='timeContainer1' align='left'>$date</div>";
                        echo "</div>";
                        
                        echo "<div class='post' align='left'>$post</div><div class='line2'>";
                        

                        echo "<form method='POST' action='commentPage.php'>";
                        echo "<input type='hidden' value='$postId' name='postId'>";


                        echo "<input type='submit' class='comment' value=''>";
                        //echo "<img src='icons/greyComment.png' height='20px'>";
                        echo "</div></div>";
                        echo "</form>";
                     }
   
                     } 
                    else {
    
                    }

   

                    
                

            ?>

 <br>

 </div>

</center>

</body>
</html>