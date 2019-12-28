
<!DOCTYPE html>
<html>
  <head>
    <title>Past Posts</title>
    <style type = "text/css">
      table {
        border-collapse: collapse;
        width: 100%;
        color: #d96459;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
      }
      th {
        color: white;
      }
     tr: nth-child(even) {background-color: #f2f2f2}
      </style>
  </head>
  <body>
    <table>
    <tr>
      <th>Username</th>
      <th>Sports</th>
      <th>Location</th>
      <th>Date</th>
      <th>Participant</th>
    </tr>
    <?php
    include("header.php"); 
    $conn = mysqli_connect("localhost", "id10120926_nusorbitalseek", "nusorbitalseek", "id10120926_nusorbitalseek");
    if ($conn -> connect_error) {
      die("Connection failed:" . $conn -> connect_error);
    }
    $sql2 = "DELETE FROM sports WHERE date < curdate()";

         if(!mysqli_query($conn, $sql2)){
             echo "ERROR: Could not able to execute $sql2. "
                                            . mysqli_error($conn);
         }
    $sql = "SELECT ida, id, type, location, date, participant from sports";
    $result = $conn -> query($sql);
    if ($result -> num_rows > 0) {
      while ($row = $result -> fetch_assoc()) {
          $user_id = $row['id'];
          $ida = $row[ida];
        echo "<tr><td><a href = 'profile.php?id=$user_id'>".$row['id']."</a></td><td>".$row["type"]."</td><td>".$row["location"]."</td><td>".$row["date"]."</td>";
         $users = explode(" ", $row['participant']);
                $number = count($users);
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
               }
               echo "</td>";
               echo "<td><a  onClick=\"javascript: return confirm('Please confirm your attendence');\" href = join5.php?id=$ida>Join</a></td><tr>";
      }
      echo "</table>";
    }
    else {
      echo "0 result";
    }
    $conn -> close();
    ?>
  </table>
  </body>
</html>
