<?php
    session_start();
    $id = $_GET['id'];
    $username = $_SESSION['username'];
    $con = mysqli_connect("localhost", "id10120926_nusorbitalseek", "nusorbitalseek", "id10120926_nusorbitalseek");
    $sql = mysqli_query($con, "SELECT * FROM sports WHERE ida = '$id'"); 
      if (mysqli_num_rows($sql) != 0) {
        while ($row = mysqli_fetch_assoc($sql)) {
             $p = [];
             array_push($p, $row['participant']);
            array_push($p, $username); 
             if (strpos($row['participant'], $username) !== false || $row['id'] === $username) {
                    echo '<script type = "text/javascript"> alert("You have already registered")</script>';
                            echo '<script>window.location.href = "sports.php";</script>';
                } else {
                        $values = implode(" ", $p);  
                        if ($check = mysqli_query($con, "UPDATE sports SET participant = '".$values."' WHERE ida ='".$id."'")) {
                            echo '<script type = "text/javascript"> alert("Information updated")</script>';
                            echo '<script>window.location.href = "sports.php";</script>';
                        }
     }   
        }
    }    
?>