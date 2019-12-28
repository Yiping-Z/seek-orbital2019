<?php
  require 'dbconfig/config.php'
?>

<!DOCTYPE html>
<html>
<head>
<title>Seek Registration Page</title>
<link rel = "stylesheet" href = "css/style.css">
</head>

<body>
     <style>
        html {
  	background-image:url(imgs/banner.jpg);
  	 background-repeat: no-repeat;
  	}

  	#welcome, #register {
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
  	<div id = "welcome">
          <center>
          <b><h1 style="color:white;">Welcome to Seek<h1>
              <p style="color:white; font-size: 20px">A website for NUS students to find study buddies,</br> sports buddies and roommates</p>
              </center>
          </div>
  <div id ="register">
    <center><h2 style="color:white;">Registration</h2>
      <img src = "imgs/avatar.png" class = "avatar"/>
    </center>

  <form class = "myform" action = "register.php" method = "post">
    <input name = "username"  type = "username" class = "inputvalues" placeholder="Username" required/></br>
    <input name = "password" type = "password" class = "inputvalues" placeholder="Password" required/></br>
    <input name = "cpassword" type = "password" class = "inputvalues" placeholder="Confirm password" required/></br>
    <input name = "submit_btn" type = "submit" id = "signup_btn" value = "Sign up"></br>
    <a href = "index.php"><input type = "button" id = "back_btn" value = "Back"/></a>
  </form>
  <?php
    if (isset($_POST['submit_btn']))
    {
      //echo '<script type = "text/javascript"> alert("Sign Up button clicked") </script>';
      $username = $_POST['username'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];
      if (strpos($username, " ") === false) {
      if ($password == $cpassword)
      {
        $query = "select * from user WHERE username = '$username'";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
          echo '<script type = "text/javascript"> alert ("User already exists.. try another username")</script>';
        }
        else
        {
          $query = "insert into user (username, password) values('$username','$password')";
          $query_run = mysqli_query($con, $query);

            if ($query_run)
            {
              echo '<script type = "text/javascript"> alert("User Registered..")</script>';
                echo '<script>window.location.href = "index.php?userregistered";</script>';
            }
            else
            {
              echo '<script type = "text/javascript"> alert("Error!")</script>';
            }
        }
      } else {
        echo '<script type = "text/javascript"> alert("Password and confirm password does not match!")</script>';
      }
    }else {
        echo '<script type = "text/javascript"> alert("Username cannot contain space!")</script>';
    }
    } 
  ?>
  </div>
  <div class = "footer">
  <p>Posted by: Team Seek <?php echo "   |   ";?>
  Project for NUS Orbital 2019</p>
</div>
</body>
</html>
