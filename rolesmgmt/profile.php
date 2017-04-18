<?php
session_start();


require_once('connect.php');
$id = $_GET['id'];
  $query = "SELECT * ";
  $query .= "FROM login ";
  $query .= "WHERE id = {$id} ";

  $result = mysqli_query($connection, $query);
    if (!$result){
      die("database query failed");
    }
    $rows = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin | Profile</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <div class="container" id="profile">
      <h3>Profile</h3>
      <button class="btn btn-md btn-primary" onclick="goBack()">Back</button>
      <br><br>
      <table>
        <!--User Id-->
        <tr>
          <th>User Id</th>
          <td><?php echo $rows['id']; ?></td>
        </tr>

        <!--User Name-->
        <tr>
          <th>User Name</th>
          <td><?php echo $rows['username']; ?></td>
        </tr>

        <!--Full Name-->
        <tr>
          <th>Full Name</th>
          <td><?php echo $rows['fullname']; ?>
              <?php
                if (!($_SESSION['roles'] == "user") || $_SESSION['username'] == $rows['username'] ){
              ?>
              <button type="button" class="btn btn-sm btn-primary" onclick="editbutton()">Edit</button>

                  <form id="formupdate" style="display:none" action="editprofile.php" method="post">
                  <input type="text" name="updatename">
                  <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                  <input type="submit" class="btn btn-sm btn-success" value="Update">
                  </form>

            <?php } ?>
          </td>
          </tr>

          <!--Role-->
          <tr>
            <th>Role</th>
            <td><?php echo $rows['roles']; ?></td>
          </tr>

        </table>
    </div>
  </body>
<script src="js/script.js"></script>
</html>
