<?php
 session_start();

 require('connect.php');

 if(isset($_POST) && !empty($_POST)){
 $username = mysqli_real_escape_string($connection, $_POST['username']);
 $password = md5($_POST['password']);
 $roles = $_POST['roles'];

 $sql = "SELECT * FROM `login` WHERE username='$username' AND password='$password' AND roles='$roles'";

 $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
 $count = mysqli_num_rows($result);

 if ($count == 1){
    $_SESSION['username'] = $username;
    $_SESSION['roles'] = $roles;
  }
  else{
    echo "<br><div class='panel panel-danger'><div class='panel-heading'>Invalid Login Credentials.</div></div>";
    }
  }

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
    <title>Login</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <div class="container" id="login">
      <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
          <h1>Please Login</h1>

          <form method="POST">
            <!--username-->
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <br>

            <!--password-->
            <input type="password" class="form-control" name="password"  placeholder="Password" required>
            <br>

            <!--login as-->
            <select class="form-control" name="roles">
              <option value="admin">Admin</option>
              <option value="user">User</option>
              <option value="manager">Manager</option>
            </select>
            <br>

            <!--login button-->
            <button class="btn btn-lg btn-success" type="submit">Login</button>

            <!--register button-->
            <a href="register.php"><button type="button" class="btn btn-lg btn-primary">Register</button></a>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
