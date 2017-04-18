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
      $_SESSION['username'] = $username;
      $_SESSION['roles'] = $roles;
    }
    else{
      echo "<br><div class='panel panel-danger'><div class='panel-heading'>Registeration Failed.</div></div>";
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
    <title>Registration</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <div class="container" id="register">
      <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
          <form method="POST">
            <h1>Please Register</h1>

            <!--Username-->
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <br>

            <!--Password-->
            <input type="password" class="form-control" name="password"  placeholder="Password" required>
            <br>

            <!--Register As-->
            <select class="form-control" name="roles">
              <option value="admin">admin</option>
              <option value="user">user</option>
              <option value="manager">manager</option>
            </select>
            <br>

            <!--Register Button-->
            <button class="btn btn-lg btn-success" type="submit">Register</button>

            <!--login button-->
            <a href="login.php"><button type="button" class="btn btn-lg btn-primary">Login</button></a>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
