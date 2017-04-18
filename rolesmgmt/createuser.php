<?php
  session_start();
  require_once('connect.php');
  if(isset($_POST) && !empty($_POST)){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = md5($_POST['password']);
    $roles = $_POST['roles'];

    $sql = "INSERT INTO `login` (username, password, roles) VALUES ('$username', '$password', '$roles')";

    $result = mysqli_query($connection, $sql);

    if ($result) {
      echo "<p>New User Created - $username</p>";
      echo "<br>";
    }
    else{
      echo "user registration failed";
    }
  }
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Create User</title>
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
     <link rel="stylesheet" href="css/master.css">
   </head>
   <body>
     <button type="button" onclick="goBack()" class="btn btn-lg btn-primary" name="button">Back</button>
 	</body>
 	<script src="js/script.js"></script>
 </html>
