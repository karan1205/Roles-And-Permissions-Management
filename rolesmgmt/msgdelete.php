<?php

session_start();
require_once('connect.php');

$msgid = $_GET['msgid'];
$del = "DELETE FROM message ";
$del .= "WHERE msgid = {$msgid} ";
$del .= "LIMIT 1";

$result = mysqli_query($connection, $del);

if($result && mysqli_affected_rows($connection) == 1){

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
  die("database query failed" . mysqli_error($connection));
}


 ?>
