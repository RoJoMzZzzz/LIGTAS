<?php
include 'dbconnect.php';session_start();
$_SESSION["succ"]='';
$_SESSION["fail"]='';
echo$_SESSION["search"] ='';

?>

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
                        

                        echo "<form method='POST' action='comment.php'>";
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