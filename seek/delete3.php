<?php
$link = mysqli_connect("localhost", "id10120926_nusorbitalseek", "nusorbitalseek", "id10120926_nusorbitalseek");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

   $sql = "DELETE FROM study WHERE date < curdate()";

if(mysqli_query($link, $sql)){
    echo "Record was deleted successfully.";
}
else{
    echo "ERROR: Could not able to execute $sql. "
                                   . mysqli_error($link);
}
mysqli_close($link);
 echo '<script>window.location.href = "homepage.php";</script>';
?>
