<?php
  session_start();
  require_once('connect.php');



  if(isset($_POST) && !empty($_POST)){
    $msg = mysqli_real_escape_string($connection, $_POST['msg']);

    $sql = "INSERT INTO `message` (msg) VALUES ('$msg')";
    $result = mysqli_query($connection, $sql);
    if ($result) {
      if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $roles = $_SESSION['roles'];

      if ($roles == "admin") {
        header('location:admin.php');
      }

      if ($roles == "user") {
        header('location:user.php');
      }

      if ($roles == "manager") {
        header('location:manager.php');
      }
      }
    }
    else{
      echo "error";
    }
  }

 ?>
