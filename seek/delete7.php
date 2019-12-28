<?php
$con = mysqli_connect("localhost", "id10120926_nusorbitalseek", "nusorbitalseek", "id10120926_nusorbitalseek");
if ($con -> connect_error) {
  die("Connection failed:" . $con -> connect_error);
}
$sql = "DELETE FROM roommie WHERE ida = '$_GET[id]'";

if (mysqli_query($con, $sql)) {
   echo '<script>window.location.href = "homepage.php";</script>';
}
else {
  echo "Not Deleted";
}
?>
