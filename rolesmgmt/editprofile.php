<?php


	session_start();
	require_once('connect.php');

  $updatequery = "UPDATE login SET ";
  $updatequery .= "fullname = '{$_POST['updatename']}' ";
  $updatequery .= "WHERE id = {$_POST['id']}";


  $updateresult = mysqli_query($connection, $updatequery);

  if ($updateresult) {
		echo "Name Updated";

  }else {
    die("database query failed" . mysqli_error($connection));
  }



 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Edit Profile</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
		<link rel="stylesheet" href="css/master.css">
	</head>
	<body>
		<button type="button" onclick="goBack()" class="btn btn-lg btn-primary" name="button">Back</button>
	</body>
	<script src="js/script.js"></script>
</html>
