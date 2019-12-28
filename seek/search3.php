<?php 
    session_start();
?>
<html>
<head>
  <link rel = "stylesheet" href = "css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style type = "text/css">
    table {
      table-layout: fixed ;
      border-collapse: collapse;
      width: 100%;
      color: #d96459;
      font-family: monospace;
      font-size: 25px;
      text-align: left;
      background: white;
    }
    th {
      color: #588c7e;
    }
   tr: nth-child(even) {background-color: #f2f2f2}

    </style>
</head>
<body>
  <div style="margin-left: 20%">
      <title>Seek Roommate</title>
  <form name="form" id = "form" action="" method="post">
  <table>
<tr>
    <select id = "gender" onchange = "getSelectValue();">
      <option value = "Male">Male</option>
      <option value = "Female">Female</option>
  </select>

  <select id = "location" onchange = "getSelectValue1();">
    <option value = "Eusoff">Eusoff</option>
    <option value = "Kent Ridge">Kent Ridge</option>
    <option value = "KE VII">KE VII</option>
    <option value = "Raffles">Raffles</option>
  </select>
  <input name = "Search1" type = "submit" id = "s1_btn" value = "Filter"/>
    <select id = "type" onchange = "getSelectValue2();">
      <option value = "Outgoing">Outgoing</option>
      <option value = "Quiet">Quiet</option>
      <option value = "Studious">Studious</option>
      <option value = "Sporty">Sporty</option>
  </select>
  <input name = "Search2" type = "submit" id = "s2_btn" value = "Filter"/>
    <input id="location3" type="hidden" name="location3" value="" />
    <input id="gender3" type="hidden" name="gender3" value="" />
    <input id="type3" type="hidden" name="type3" value="" />

    <input name = "major" placeholder = "Course">
    <input name = "Search4" type = "submit" id = "s4_btn" value = "Filter"/>
  
    <input name = "keyword" placeholder = "Keyword">
    <input name = "Search3" type = "submit" id = "s3_btn" value = "Filter"/><br>
    <input name = "all" type = "submit" id = "a_btn" value = "View All Posts"/></br></br>
  <script>
    function getSelectValue()
    {
      document.getElementById("gender3").value = document.getElementById("gender").value;
    }
    function getSelectValue1()
    {
      document.getElementById("location3").value = document.getElementById("location").value;
    }
    function getSelectValue2()
    {
      document.getElementById("type3").value = document.getElementById("type").value;
    }
    getSelectValue();
    getSelectValue1();
    getSelectValue2();
  </script>
  </table>
    </form>
<table class="table table-striped">
     <thead>
  <tr>
  <th>Username</th>
  <th>Gender</th>
  <th>Hall of residence</th>
  <th>Course</th>
  <th>Self Description</th>
  <th>Desired Roommate Type</th>
  <th>Participant</th>
</tr>
 </thead>
 <tbody>
<?php
  if (isset($_POST["Search1"]) || isset($_POST["Search2"]) || isset($_POST["Search3"]) || isset($_POST["Search4"])) {
  $gender = $_POST["gender3"];
} if (isset($_POST['Search1'])) {
    $location = $_POST["location3"];
  } else if (isset($_POST['Search2'])) {
    $type = $_POST["type3"];
  } else if (isset($_POST['Search3'])) {
    $keyword = strtolower($_POST["keyword"]);
  }  else if (isset($_POST['Search4'])) {
    $major = strtoupper($_POST["major"]);
  }
$conn = mysqli_connect("localhost", "id10120926_nusorbitalseek", "nusorbitalseek", "id10120926_nusorbitalseek");
if ($conn -> connect_error) {
  die("Connection failed:" . $conn -> connect_error);
}
$sql = "SELECT ida, id, hall, course, gender, self, others, participant, des from roommie";
$result = $conn -> query($sql);

if ($result -> num_rows > 0) {
  while ($row = $result -> fetch_assoc()) {
      $user_id = $row['id'];
      $ida = $row['ida'];
    if (isset($_POST['Search1'])) {
     if ($row["gender"] == $gender) {
       if ($row["hall"] == $location) {
   echo "<tr><td><a href = 'profile.php?id=$user_id'>".$row['id']."</a></td><td>".$row["gender"]."</td><td>".$row["hall"]."</td><td>".$row["course"]."</td><td>".$row["self"]."</td><td>".$row["others"]."</td>";
   $users = explode(" ", $row['participant']);
                $number = count($users);
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
               }
               echo "</td>";
   echo "<td><a  onClick=\"javascript: return confirm('Please confirm your attendence');\" href = join3.php?id=$ida>Join</a></td>";
   
  }
  }
} else if (isset($_POST['Search2'])) { 
  if ($row["gender"] == $gender) { 
  if ($row["self"] == $type) {
 echo "<tr><td><a href = 'profile.php?id=$user_id'>".$row['id']."</a></td><td>".$row["gender"]."</td><td>".$row["hall"]."</td><td>".$row["course"]."</td><td>".$row["self"]."</td><td>".$row["others"]."</td>";
 $users = explode(" ", $row['participant']);
                $number = count($users);
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
               }
               echo "</td>";
 echo "<td><a  onClick=\"javascript: return confirm('Please confirm your attendence');\" href = join3.php?id=$ida>Join</a></td>";
 }
}
}
else if (isset($_POST['Search3'])) { 
  if ($row["gender"] == $gender) { 
  if  (strpos($row['des'], $keyword) !== false) {
 echo "<tr><td><a href = 'profile.php?id=$user_id'>".$row['id']."</a></td><td>".$row["gender"]."</td><td>".$row["hall"]."</td><td>".$row["course"]."</td><td>".$row["self"]."</td><td>".$row["others"]."</td>";
 $users = explode(" ", $row['participant']);
                $number = count($users);
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
               }
               echo "</td>";
 echo "<td><a  onClick=\"javascript: return confirm('Please confirm your attendence');\" href = join3.php?id=$ida>Join</a></td>";
 }
}
} else if (isset($_POST['Search4'])) {
     if ($row["gender"] == $gender) {
       if ($row["course"] == $major) {
   echo "<tr><td><a href = 'profile.php?id=$user_id'>".$row['id']."</a></td><td>".$row["gender"]."</td><td>".$row["hall"]."</td><td>".$row["course"]."</td><td>".$row["self"]."</td><td>".$row["others"]."</td>";
   $users = explode(" ", $row['participant']);
                $number = count($users);
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
               }
               echo "</td>";
   echo "<td><a  onClick=\"javascript: return confirm('Please confirm your attendence');\" href = join3.php?id=$ida>Join</a></td>";
   
  }
  }
  }else {
    echo "<tr><td><a href = 'profile.php?id=$user_id'>".$row['id']."</a></td><td>".$row["gender"]."</td><td>".$row["hall"]."</td><td>".$row["course"]."</td><td>".$row["self"]."</td><td>".$row["others"]."</td>";
                $users = explode(" ", $row['participant']);
                $number = count($users);
                echo "<td>";
               for($i=0; $i<$number; $i++) {
                  echo "<a href = 'profile.php?id=$users[$i]'>".$users[$i]."</a>";
                   echo " ";
               }
               echo "</td>";
 echo "<td><a  onClick=\"javascript: return confirm('Please confirm your attendence');\" href = join3.php?id=$ida>Join</a></td>";
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
