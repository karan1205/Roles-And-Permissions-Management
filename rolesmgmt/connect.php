<?php
  $connection = mysqli_connect('localhost', 'root', '');
  if (!$connection) {
    die("Database Connection Failed" . mysqli_error($connection));
  }
  $select_db = mysqli_select_db($connection, 'rolesmgmt');
  if (!$select_db) {
    die("Database selected failed" . mysqli_error($connection));
  }
 ?>
