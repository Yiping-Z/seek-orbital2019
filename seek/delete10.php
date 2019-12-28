<?php
session_start();
$username = $_SESSION['username'];
$con = mysqli_connect("localhost", "id10120926_nusorbitalseek", "nusorbitalseek", "id10120926_nusorbitalseek");
if ($con -> connect_error) {
  die("Connection failed:" . $con -> connect_error);
}
  $sql = "SELECT ida, participant from roommie";
      $result = $con -> query($sql);
      if ($result -> num_rows > 0) {
        while ($row = $result -> fetch_assoc()) {
          if ($row['ida'] == $_GET[id] ) {
              $new_participant = $row['participant'];
              $trimmed = str_replace($username, "", $new_participant);
          }
        }
      }
     
$sql = mysqli_query($con,"UPDATE roommie SET participant = '".$trimmed."' WHERE ida = '".$_GET[id]."'");
  echo '<script>window.location.href = "homepage.php";</script>';
?>
