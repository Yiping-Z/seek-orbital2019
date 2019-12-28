<?php
    session_start();
    $connect = mysqli_connect("localhost", "id10120926_nusorbitalseek", "nusorbitalseek", "id10120926_nusorbitalseek");
    $number = count($_POST["chk"]);
    $no = count($_POST["chk2"]);
    $hall = $_POST["hall0"];
    $gender = $_POST["gender0"];
    $username = $_SESSION["username"];
    $course = $_POST["course"];
    $interest = strtolower($_POST["interest"]);
    
    if($number > 0)
    {
      for($i=0; $i<$number; $i++)
      {
             for($j = 0; $j<$no; $j++)
             {
                  $sql = "INSERT INTO roommie(id, hall,gender,self,others, course, des) VALUES('$username','$hall', '$gender', '".mysqli_real_escape_string($connect, $_POST["chk"][$i])."', '".mysqli_real_escape_string($connect, $_POST["chk2"][$j])."', '$course', '$interest')";
                mysqli_query($connect, $sql);
             }
      }
      echo "Data Inserted";
    }
    else
    {
      echo "Please Enter Data";
    }
?>
