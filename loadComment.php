<?php
include 'dbconnect.php';session_start();
$_SESSION["succ"]='';
$_SESSION["fail"]='';
echo$_SESSION["search"] ='';

?>

<link rel="stylesheet" type="text/css" href="post.css" />

<?php
            	$un = $_SESSION["userLoggedIn"];

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
                    
                        echo "<div class='commentCon2'>";
                        echo "<div class='profileContainer'>";
                        echo "<div class='profilePic2'><img src='images/profileWhite.png' width='40px'></div>";
                        echo "<div id='nameA' class='nameCom' align='left'>$fullname</div>";
                        echo "<div class='commentDisplay' align='left'>$comment</div>";

                        echo "<div class='timeContainerCom' align='left'>$date</div>";
                        echo "</div><div class='line3'>";

                        
                        
                        
                     }
   
                     } 
                    else {
    
                    }

   

                    


            ?>

</div>