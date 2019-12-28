<?php
  session_start();
  require 'dbconfig/config.php';
  if (@$_SESSION["username"]) {
?>
<html>
  <head>
      <title>My Account</title>
  </head>
  <body>
    <div style="position: absolute; left: 0px; top: 50px; width:25%">
        <center>
    <?php
    $check = mysqli_query($con, "SELECT * FROM user WHERE username = '".$_SESSION['username']."'");
    $rows = mysqli_num_rows($check);
    while ($rows = mysqli_fetch_assoc($check)) {
      $username = $rows['username'];
      $id = $rows['id'];
      $prof_pic = $rows['profile_pic'];
    }
    ?>
    <?php echo "<img src = '$prof_pic' width = '150' height = '150'>"; ?><br />
    Username: <?php echo $username; ?><br />
    ID: <?php echo $id; ?><br />
    <a href = 'homepage.php?action=cp'>Change password</a><br />
    </center>
  </body>
</html>
<?php
  if (@$_GET['action'] == "logout") {
    session_destroy();
    header("Location: index.php");
  }
  if (@$_GET['action'] == "cp") {
    echo "<form action = 'homepage.php?action=cp' method ='POST'><center>";
    echo "
    Current password: <input type = 'text' name = 'curr_pass'><br />
    New Password: <input type = 'password' name = 'new_pass'><br />
    Re-type password: <input type = 'password' name = 're_pass'><br />
    <input type = 'submit' name = 'change_pass' value = 'Change'><br />
    ";

    $cur_pass = @$_POST['curr_pass'];
    $new_pass = @$_POST['new_pass'];
    $re_pass = @$_POST['re_pass'];
   if (isset($_POST['change_pass'])) {
       $check = mysqli_query($con, "SELECT * FROM user WHERE username = '".$_SESSION['username']."'");
       $rows = mysqli_num_rows($check);
       while ($rows = mysqli_fetch_assoc($check)) {
         $get_pass = $rows['password'];
      }
      if ($cur_pass == $get_pass) {
        if (strlen($re_pass) > 6) {
         if ($re_pass == $new_pass) {
           if ($query = mysqli_query($con, "UPDATE user SET password = '".$new_pass."' WHERE username = '".$_SESSION['username']."'")) {
             echo "Password changed.";
           }
         } else {
           echo "New password does not match.";
         }
      } else {
        echo "New password must be longer than 6 characters.";
      }
    }else {
        echo "Your current password does not match with your real password.";
      }
  }
    echo "</center></form>";
  }
  } else {
     echo "You must be logged in.";
  }
?>
<html>
  <center>
  <form action = "upload_pic.php" method = "POST" enctype = "multipart/form-data">
    <br />
    <b>Change profile image<br />
    <input type = "file" name="file">
    <button name = "submit" value="UPLOAD"/>UPLOAD</button>
  </form>
  <br />
  <h2>Comment</h2>
</center>


<?php
    $sql = "SELECT user_id, comment_id, content, time from comment";
    $result = $con -> query($sql);

    if ($result -> num_rows > 0) {
      while ($row = $result -> fetch_assoc()) {
            $time = $row['time'] ; 
            $ID = $_SESSION['username'];  
        if ($row["user_id"] == $ID) { 
            $comment=$row["comment_id"];
            echo "<p align= center><a href = 'profile.php?id=$comment'>".$comment."</a>";
        echo "| ";
        echo ''.date('g:i A, l - d M Y', strtotime($time)).''; 
        echo ": ";
        echo ''.$row["content"].'</p>';
        echo "<br>";
      }
      }
      echo "</table>";
    }
?>
</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js">
$(document).ready(
function(){
    $('input:file').change(
        function(){
            if ($(this).val()) {
                $('input:submit').attr('disabled',false);
            } 
        }
        );
});
</script> 
</html>
