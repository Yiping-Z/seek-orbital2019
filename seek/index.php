<?php
  session_start();
  require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Seek Login Page</title>
<link rel = "stylesheet" href = "css/style.css">
</head>
<body>
    <style>
        html {
  	background-image:url(imgs/banner.jpg);
  	 background-repeat: no-repeat;
  	}
 
  	#welcome, #login {
  	      position: relative;
          font-size: 200%;
          top: 50px;
          
  	}
     .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: white;
      color: black;
      text-align: center;
    }
  	</style>
  <div>
      <div id = "welcome">
          <center>
          <b><h1 style="color:white;">Welcome to Seek<h1>
              <p style="color:white; font-size: 20px">A website for NUS students to find study buddies,</br> sports buddies and roommates</p>
              </center>
          </div>
        <div id = "login">
    <center><h2 style="color:white;">Login</h2>
      <img src = "imgs/avatar.png" class = "avatar"/>
    </center>
  <form class = "myform" action = "index.php" method = "post">
    <input name = "username" type = "text"  class = "inputvalues" size = "14" placeholder="Username"required/></br>
    <input name = "password" type = "password" class = "inputvalues" placeholder="Password"required/></br>
    <input name = "login" type = "submit" id = "login_btn" value = "Login"></br>
    <a href = "register.php"><input type = "button" id = "register_btn" value = "Register"/></a>
    </div>
  </form>
  <?php
  if(isset($_POST['login']))
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "select * from user WHERE username = '$username' AND password = '$password'";
    $query_run = mysqli_query($con, $query);
    if (mysqli_num_rows($query_run) > 0)
    {
         
      $_SESSION ['username'] = $username;
    echo '<script>window.location.href = "homepage.php";</script>';
    }
    else
    {
      echo '<script type = "text/javascript"> alert("Invalid credentials")</script>';
    }
  }
  ?>
  </div>
</body>
<div class = "footer">
  <p>Posted by: Team Seek <?php echo "   |   ";?>
  Project for NUS Orbital 2019</p>
</div>
</html>
