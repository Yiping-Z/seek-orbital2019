<?php
  session_start();
  require('dbconfig/config.php');
  if (@$_SESSION["username"]) {
?>
<html>
  <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Profile Page</title>
  </head>
  <body>
    <?php include("header.php");
      echo '<div style ="position: absolute; top:40px">';
    if (@$_GET['id']) {
      $check = mysqli_query($con, "SELECT * FROM user WHERE username = '".$_GET['id']."'");
      $rows = mysqli_num_rows($check);
      if (mysqli_num_rows($check) != 0) {
        while ($row = mysqli_fetch_assoc($check)) {
          echo "<h1>".$row['username']."</h1><img src ='".$row['profile_pic']."' width = '150' height = '150'><br />";
        }
      } else {
        echo "ID not found";
      }
    } else {
      header("Location: index.php");
    }
    echo "</div>";
    ?>
<body>
    <div style="margin-left: 320px" ">
        <?php 
          $check = mysqli_query($con, "SELECT * FROM user WHERE username ='".$_GET['id']."'");
        $rows = mysqli_num_rows($check);
        while ($rows = mysqli_fetch_assoc($check)) {
          $id = $rows['username'];
        }
        ?>
  
      <table class="table table-striped">
      
      <?php
      $sql = "SELECT ida, id, date, module, location from study";
      $result = $con -> query($sql);

      if ($result -> num_rows > 0) {
          $i=0;
        while ($row = $result -> fetch_assoc()) {
          if ($row["id"] ==$id) {
            if ($i==0) {
                $i++;
              echo"<thead><tr>";
                 echo"<th>Date</th>";
                 echo"<th>Module</th>";
                 echo"<th>Location</th>";
               echo"</tr></thead>";
            }
          echo "<tbody><tr><td>".$row["date"]."</td><td>".$row["module"]."</td><td>".$row["location"]."</td>";
        }
        }
        echo "</tbody></table>";
      }
      else {
        echo "0 result";
      }
      $sql2 = "DELETE FROM study WHERE date < curdate()";

         if (!mysqli_query($con, $sql2)) {
             echo "ERROR: Could not able to execute $sql2. "
                                            . mysqli_error($con);
         }
      ?>
    </table>
      <table class="table table-striped">
      
      <?php
      $sql = "SELECT ida, id, type, location, date from sports";
      $result = $con -> query($sql);

      if ($result -> num_rows > 0) {
          $i=0;
        while ($row = $result -> fetch_assoc()) {
          if ($row["id"] == $id) {
              if($i==0){
              $i++;
              echo"<thead><tr>";
                echo"<th>Date</th>";
                echo"<th>Sports</th>";
                echo"<th>Location</th>";
              echo"</tr></thead>";
              }
          echo "<tbody><tr><td>".$row["date"]."</td><td>".$row["type"]."</td><td>".$row["location"]."</td>";
        }
        }
        echo "</tbody></table>";
      }
      else {
        echo "0 result";
      }
      $sql2 = "DELETE FROM sports WHERE date < curdate()";

         if(!mysqli_query($con, $sql2)){
             echo "ERROR: Could not able to execute $sql2. "
                                            . mysqli_error($con);
         }
      ?>
    </table>

    <table class="table table-striped">
    <?php
    $sql = "SELECT ida,id, hall, gender, self, others, des from roommie";
    $result = $con -> query($sql);

    if ($result -> num_rows > 0) {
        $i=0;
      while ($row = $result -> fetch_assoc()) {
        if ($row["id"] == $id) {
            if($i==0){
                $i++;
            echo "<thead><tr>";
              echo "<th>Hall of Residence</th>";
              echo "<th>Gender</th>";
              echo "<th>Self Description</th>";
              echo "<th>Prefered Roommate Type</th>";
              echo "<th>Description</th>";
            echo "</tr><thead>";
            }
        echo "<tbody><tr><td>".$row["hall"]."</td><td>".$row["gender"]."</td><td>".$row["self"]."</td><td>".$row["others"]."</td><td>".$row["des"]."</td>";
      }
      }
      echo "</tbody></table>";
    }
    else {
      echo "0 result";
    }
    ?>
  </table>
  <br>
  <b>Leave a message:</br>
   <form class = "myform" method = "post">
  <textarea  style="resize:none"cols="50" rows="10" name = "comment"></textarea>
    <input name = "submit_btn" type = "submit" id = "submit_btn" value = "Comment"></br>
    </form>
      <b>Comment:</br>
  </body>
</html>
<?php
  if (isset($_POST['submit_btn']))
    {
      $user = $_GET['id'];
      $comment = $_SESSION['username'];
      $content= $_POST['comment']; 
      if ($user != $comment) {
      $query = "insert into comment (user_id, comment_id, content) values('$user','$comment','$content')";
      $query_run = mysqli_query($con, $query);
      } 
    }
    
     $sql = "SELECT user_id, comment_id, content, time from comment";
    $result = $con -> query($sql);

    if ($result -> num_rows > 0) {
      while ($row = $result -> fetch_assoc()) {
            $time = $row['time'] ; 
        if ($row["user_id"] == $_GET['id']) { 
            $comment_id=$row["comment_id"];
            echo "<a href = 'profile.php?id=$comment_id'>".$comment_id."</a>";
        echo "| ";
        echo ''.date('g:i A, l - d M Y', strtotime($time)).''; 
        echo ": ";
        echo ''.$row["content"].'';
        echo "<br>";
      }
      }
      echo "</table>";
    }
  if (@$_GET['action'] == "logout") {
    session_destroy();
    header("Location: login.php");
  }
} else {
  echo "You must be logged in.";
}
?>
 </div>
 </html>
