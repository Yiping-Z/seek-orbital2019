<?php 
    session_start();
?>
<html>
<head>
  <link rel = "stylesheet" href = "css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style type = "text/css">
    table {
      border-collapse: collapse;
      width: 100%;
      color: #d96459;
      font-family: monospace;
      font-size: 25px;
      text-align: left;
      background-color: white;
    }
    th {
      color: #588c7e;
    }
   tr: nth-child(even) {background-color: #f2f2f2}
    </style>
</head>
<body>
    <div style="margin-left: 320px" >
    <title>Seek Sports</title>
  
  <form name="form" id = "form" action="" method="post">
  <table>
<tr>
    <select id = "sports" onchange = "getSelectValue3();">
      <option value = "Badminton">Badminton</option>
      <option value = "Basketball">Basketball</option>
      <option value = "Floorball">Floorball</option>
      <option value = "Table Tennis">Table Tennis</option>
    </select>
  <input name = "Search" type = "submit" id = "s1_btn" value = "Filter"/>
  <select id = "location" onchange = "getSelectValue4();">
    <option value = "MPSH1">MPSH1</option>
    <option value = "MPSH2">MPSH2</option>
  </select>
  <input id="sports2" type="hidden" name="sports2" value="" />
  <input id="location2" type="hidden" name="location2" value="" />
  <input name = "Search1" type = "submit" id = "s2_btn" value = "Filter"/>
  <script>
    function getSelectValue3()
    {
      document.getElementById("sports2").value = document.getElementById("sports").value;
    }
    function getSelectValue4()
    {
      document.getElementById("location2").value = document.getElementById("location").value;
    }
    getSelectValue3();
    getSelectValue4();
  </script>
    <input type="date" name="date" /></td>
    <input name = "Search2"type = "submit" id = "s3_btn" value = "Filter"/></br>
    <input name = "all" type = "submit" id = "a_btn" value = "View All Posts"/></br></br>
  </table>
    </form>
<table class="table table-striped">
     <thead>
  <tr>
  <th>Username</th>
  <th>Date</th>
  <th>Sports</th>
  <th>Location</th>
  <th>Participant</th>
</tr>
 <thead>
       <tbody>
<script>
$('#Search').click(function(){
     $.ajax({
          url:"search2.php",
          method:"POST",
          data:$('#form').serialize(),
          success:function(data)
          {
               alert(data);
               $('#form')[0].reset();
          }
     });
});
</script>
<?php
  if (isset($_POST['Search'])) {
      $sports = $_POST["sports2"]; 
  } else if (isset($_POST['Search1'])) { 
    $location = $_POST["location2"]; 
  } else if (isset($_POST['Search2'])) {
    $date = $_POST["date"];
  } else {
             $conn = mysqli_connect("localhost", "id10120926_nusorbitalseek", "nusorbitalseek", "id10120926_nusorbitalseek");
        if ($conn -> connect_error) {
          die("Connection failed:" . $conn -> connect_error);
        }
        $sql = "SELECT ida, id, date, type, location, participant from sports";
        $result = $conn -> query($sql);
        
        if ($result -> num_rows > 0) {
          while ($row = $result -> fetch_assoc()) {
              $user_id=$row['id'];
              $ida = $row['ida'];
           echo "<tr><td><a href = 'profile.php?id=$user_id'>".$row['id']."</a></td><td>".$row["date"]."</td><td>".$row["type"]."</td><td>".$row["location"]."</td>";
           $users = explode(" ", $row['participant']);
                        $number = count($users);
                        echo "<td>";
                       for($i=0; $i<$number; $i++) {
                          echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                           echo " ";
                       }
                       echo "</td>";
             echo "<td><a  onClick=\"javascript: return confirm('Please confirm your attendence');\" href = join2.php?id=$ida>Join</a></td>";
          }
        }
}
$conn = mysqli_connect("localhost", "id10120926_nusorbitalseek", "nusorbitalseek", "id10120926_nusorbitalseek");
if ($conn -> connect_error) {
  die("Connection failed:" . $conn -> connect_error);
}
$sql = "SELECT ida, id, date, type, location, participant from sports";
$result = $conn -> query($sql);

if ($result -> num_rows > 0) {
  while ($row = $result -> fetch_assoc()) {
      $user_id=$row['id'];
      $ida = $row['ida'];
    if (isset($_POST['Search'])) {
     if ($row["type"] == $sports)
    {
   echo "<tr><td><a href = 'profile.php?id=$user_id'>".$row['id']."</a></td><td>".$row["date"]."</td><td>".$row["type"]."</td><td>".$row["location"]."</td>";
   $users = explode(" ", $row['participant']);
                $number = count($users);
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
               }
               echo "</td>";
     echo "<td><a  onClick=\"javascript: return confirm('Please confirm your attendence');\" href = join2.php?id=$ida>Join</a></td>";
  }
} else if (isset($_POST['Search1'])) {
  if ($row["location"] == $location)
 {
 echo "<tr><td><a href = 'profile.php?id=$user_id'>".$row['id']."</a></td><td>".$row["date"]."</td><td>".$row["type"]."</td><td>".$row["location"]."</td>";
 $users = explode(" ", $row['participant']);
                $number = count($users);
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
               }
               echo "</td>";
   echo "<td><a  onClick=\"javascript: return confirm('Please confirm your attendence');\" href = join2.php?id=$ida>Join</a></td>";
 }
} else  if (isset($_POST['Search2'])){
  if ($row["date"] == $date)
 {
 echo "<tr><td><a href = 'profile.php?id=$user_id'>".$row['id']."</a></td><td>".$row["date"]."</td><td>".$row["type"]."</td><td>".$row["location"]."</td>";
 $users = explode(" ", $row['participant']);
                $number = count($users);
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
               }
               echo "</td>";
   echo "<td><a  onClick=\"javascript: return confirm('Please confirm your attendence');\" href = join2.php?id=$ida>Join</a></td>";
 }
  }
}
  echo "</table>";
 }
else {
  echo "0 result";
}
$conn -> close();

?>
  </tbody>
</table>
</div>
</body>
</html>
