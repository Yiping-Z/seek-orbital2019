<?php 
 session_start();
 require 'dbconfig/config.php';
?>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <style type = "text/css">
    table {
        table-layout: fixed ;
      border-collapse: collapse;
      width: 100%;
      color: #d96459;
      text-align: left;
      background: white;
      font-size:25px;
    }
    h4 {
        font-size: 25px;
  		font-weight: normal;
  		color: #333333;
    }
    </style>
     <div style="position: absolute; left: 25%; top: 50px; width=75%">
    <h4><b>My Post</b></h4>
      <table class="table table-striped">
      <?php
      $sql = "SELECT ida, id, date, module, location, participant from study";
      $result = $con -> query($sql);

      if ($result -> num_rows > 0) { 
          $i=0;
        while ($row = $result -> fetch_assoc()) {
          if ($row["id"] == $_SESSION['username']) {
              if ($i==0){
              $i++;
            echo "<thead><tr>";
            echo "<th>Date</th>";
            echo "<th>Module</th>";
            echo "<th>Location</th>";
            echo "<th>Participant</th>";
            echo "</tr></thead>";
              }
          echo "<tbody><tr style ='background=white'><td>".$row["date"]."</td><td>".$row["module"]."</td><td>".$row["location"]."</td>";
            $users = explode(" ", $row['participant']);
                $number = count($users);
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
               }
               echo "</td>";
          echo "<td><a  onClick=\"javascript: return confirm('Please confirm deletion');\" href = delete5.php?id=".$row['ida'].">Delete</a></td>";
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
      $sql = "SELECT ida, id, type, location, date, participant from sports";
      $result = $con -> query($sql);

      if ($result -> num_rows > 0) {
          $i=0;
        while ($row = $result -> fetch_assoc()) {
          if ($row["id"] == $_SESSION['username']) {
              if ($i==0){
              $i++;
               echo "<thead><tr>";
              echo "<th>Date</th>";
              echo "<th>Sports</th>";
              echo "<th>Location</th>";
              echo "<th>Participant</th>";
              echo "</tr></thead>";
              }
          echo "<tbody><tr style ='background=white'><td>".$row["date"]."</td><td>".$row["type"]."</td><td>".$row["location"]."</td>";
          $users = explode(" ", $row['participant']);
                $number = count($users);
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
               }
               echo "</td>";
          echo "<td><a onClick=\"javascript: return confirm('Please confirm deletion');\" href = delete6.php?id=".$row['ida'].">Delete</a></td>";
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
        <section>
    <?php
    $sql = "SELECT ida,id, hall, gender, self, others, des, course, participant from roommie";
    $result = $con -> query($sql);

    if ($result -> num_rows > 0) {
        $i=0;
      while ($row = $result -> fetch_assoc()) {
        if ($row["id"] == $_SESSION['username']) {
            if ($i==0){
              $i++;
             echo "<thead><tr>";
             echo "<th>Hall  </th>";
             echo "<th>Gender   </th>";
             echo "<th>Course   </th>";
             echo "<th>Self Description  </th>";
             echo "<th>Prefered Roommate</th>";
             echo " <th>Description</th>";
             echo "<th>Participant</th>";
             echo "</tr></thead>";
            }
        echo "<tbody><tr><td>".$row["hall"]."</td><td>".$row["gender"]."</td><td>".$row["course"]."</td><td>".$row["self"]."</td><td>".$row["others"]."</td><td>".$row["des"]."</td>";
        $users = explode(" ", $row['participant']);
                $number = count($users);
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
               }
               echo "</td>";
        echo "<td><a  onClick=\"javascript: return confirm('Please confirm deletion');\" href = delete7.php?id=".$row['ida'].">Delete</a></td></tr>";
      } 
      }
      echo "</tbody></table>";
    }
    else {
      echo "0 result";
    }

    ?>
    </section>
  </table>
 
   <h4><b>Sessions Joined</b></h4>
  <table class="table table-striped">
      <?php
      $sql = "SELECT ida, id, date, module, location, participant from study";
      $result = $con -> query($sql);

      if ($result -> num_rows > 0) {
          $j=0;
        while ($row = $result -> fetch_assoc()) {
             $users = explode(" ", $row['participant']);
                $number = count($users);
                $ID = $row['id'];
                   for($i=0; $i<$number; $i++) {
          if ($users[$i] == $_SESSION['username']) {
              if ($j==0) {
                  $j++;
               echo "<thead><tr>";
                echo "<th>Username</th>";
                echo "<th>Date</th>";
                echo "<th>Module</th>";
                echo "<th>Location</th>";
                echo "<th>Participant</th>";
              echo "</tr></thead>";
              }
              echo "<tbody><tr><td><a href = 'profile.php?id=$ID'>".$ID."</a></td><td>".$row["date"]."</td><td>".$row["module"]."</td><td>".$row["location"]."</td>";
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                   if ($users[$i] != $_SESSION['username']) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
                   }
               }
               echo "</td>";
          echo "<td><a  onClick=\"javascript: return confirm('Please confirm your withdrawal');\" href = delete8.php?id=".$row['ida'].">Withdraw</a></td></tr>";
        }
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
      $sql = "SELECT ida, id, type, location, date, participant from sports";
      $result = $con -> query($sql);

      if ($result -> num_rows > 0) {
          $j=0;
        while ($row = $result -> fetch_assoc()) {
              $users = explode(" ", $row['participant']);
                $number = count($users);
                $ID=$row['id'];
        for($i=0; $i<$number; $i++) {
          if ($users[$i] == $_SESSION['username']) {
              if ($j == 0) {
                  $j++;
                echo "<thead><tr>";
                    echo "<th>Username</th>";
                    echo "<th>Date</th>";
                    echo "<th>Sports</th>";
                    echo "<th>Location</th>";
                    echo "<th>Participant</th>";
                  echo "</tr></thead>";
              }
          echo "<tbody><tr><td><a href = 'profile.php?id=$ID'>".$ID."</a></td><td>".$row["date"]."</td><td>".$row["type"]."</td><td>".$row["location"]."</td>";
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                   if ($users[$i] != $_SESSION['username']) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
                   }
               }
               echo "</td>";
          echo "<td><a onClick=\"javascript: return confirm('Please confirm your withdrawal');\" href = delete9.php?id=".$row['ida'].">Withdraw</a></td></tr>";
        }
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
    <section>
    <table class="table table-striped">
    <?php
    $sql = "SELECT ida,id, hall, gender, self, others, course, participant from roommie";
    $result = $con -> query($sql);

    if ($result -> num_rows > 0) {
        $j = 0;
      while ($row = $result -> fetch_assoc()) {
        $users = explode(" ", $row['participant']);
                $number = count($users);
                $ID = $row['id'];
        for($i=0; $i<$number; $i++) {
          if ($users[$i] == $_SESSION['username']) {
              if ($j == 0) {
                  $j++;
              echo "<thead><tr>";
                  echo "<th>Usernamne</th>";
                  echo "<th>Hall</th>";
                  echo "<th>Gender</th>";
                  echo "<th>Course</th>";
                  echo "<th>Self Description</th>";
                  echo "<th>Prefered Roommate Type</th>";
                  echo "<th>Participant</th>";
                echo "</tr></thead>";
              }
        echo "<tbody><tr><td><a href = 'profile.php?id=$ID'>".$ID."</a></td><td>".$row["hall"]."</td><td>".$row["gender"]."</td><td>".$row["course"]."</td><td>".$row["self"]."</td><td>".$row["others"]."</td>";
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                   if ($users[$i] != $_SESSION['username']) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
                   }
               }
               echo "</td>";
        echo "<td><a  onClick=\"javascript: return confirm('Please confirm your withdrawal');\" href = delete10.php?id=".$row['ida'].">Withdraw</a></td></tr>";
      }
      }
      }
      echo "</tbody></table>";
    }
    else {
      echo "0 result";
    }
    ?>
    </table>
    </section>
  </div>
  </html>
