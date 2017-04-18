<?php
  /*Session Start*/
  session_start();

  require('connect.php');

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

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Roles and Permission Managemnet</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <div class="container" id="index">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 well">
          <h1>Roles and Permission Management</h1>
          <br>
          <!--Login Button-->
          <a href="login.php"><button type="button" class="btn btn-success btn-lg" name="button">Login</button></a>

          <!--Register Button-->
          <a href="register.php"><button type="button" class="btn btn-primary btn-lg" name="button">Register</button></a>
        </div>
      </div>

    </div>
  </body>
</html>
