<?php
  session_start();
  require('connect.php');
?>
<?php
  if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 2097152) {
          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = 'imgs/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);

          $check = mysqli_query($connect, "SELECT * FROM users WHERE username = '".$_SESSION[username]."'");
          $rows = mysqli_num_rows($check);
          while ($row = mysqli_fetch_assoc($check)) {
            $db_image = $row['profile_pic'];
          }
          if ($query = mysqli_query($connect, "UPDATE users SET profile_pic = 'imgs/".$fileNameNew."' WHERE username = '".$_SESSION['username']."'")) {
            header("Location: account.php?uploadsucess");
          }
        } else {
          echo "File must be unde 2mb";
        }
      } else {
        echo "There was an error uploading you file!";
      }
    } else {
      echo "You cannot upload files of this type!";
    }
  }
?>
