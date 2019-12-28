<?php
    session_start();
    $connect = mysqli_connect("localhost", "id10120926_nusorbitalseek", "nusorbitalseek", "id10120926_nusorbitalseek");
    $number = count($_POST["name"]);
    $mod = strtoupper($_POST["mod"]);
    $username = $_SESSION["username"];
    $checkBox = count($_POST["chk"]);
    if($number > 0)
    {
      for($i=0; $i<$number; $i++)
      {
           if(trim($_POST["name"][$i] != '')) {
        
             for ($j=0; $j<$checkBox; $j++) {
                $sql = "INSERT INTO study(id,date, module, location) VALUES('$username', '".mysqli_real_escape_string($connect, $_POST["name"][$i])."','$mod','".mysqli_real_escape_string($connect, $_POST["chk"][$j])."')";
                mysqli_query($connect, $sql);
                echo "Data Inserted";
              }
           } 
           }
      }
    else
    {
      echo "Please Enter Data";
    }
?>
