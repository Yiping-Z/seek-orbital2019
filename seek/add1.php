<?php
    session_start();
    $conn = mysqli_connect("localhost", "id10120926_nusorbitalseek", "nusorbitalseek", "id10120926_nusorbitalseek");
    $type = $_POST["sports3"];
    $location = $_POST["location3"];
    $datee = $_POST["date"];
    $username = $_SESSION["username"]; 
   if(trim($_POST["sports3"] != '')) 
      { 
        $sql = "INSERT INTO sports(id, type, location, date) VALUES('$username', '$type', '$location', '$datee')";
        mysqli_query($conn, $sql);
        echo "Data Inserted";
      }
    else
    {
      echo "Please Enter Data";
    }
?>
