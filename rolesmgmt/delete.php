<?php
  session_start();
  require_once('connect.php');
  $id = $_GET['id'];
  $del = "DELETE FROM login ";
  $del .= "WHERE id = {$id} ";
  $del .= "LIMIT 1";

  $result = mysqli_query($connection, $del);

  if($result && mysqli_affected_rows($connection) == 1){
  	?>
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Delete</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
    		<link rel="stylesheet" href="css/master.css">
      </head>
      <body>
        <p>Username - <?php echo $_GET['username'] ?> <br> Id no - <?php echo $_GET['id'] ?> <br> Deleted.</p>
        <button type="button" onclick="goBack()" class="btn btn-lg btn-primary" name="button">Back</button>
      </body>
      <script src="js/script.js">

      </script>
    </html>
  <?php
    }
    else{
    	die("database query failed" . mysqli_error($connection));
    }
   ?>
