<?php
	session_start();
	require_once('connect.php');

	$username = $_SESSION['username'];
	$roles = $_SESSION['roles'];


	//For Visiting Own Profile
	$profilequery = "SELECT id ";
	$profilequery .= "FROM login ";
	$profilequery .= "WHERE username = '{$username}' ";
	$profileresult = mysqli_query($connection, $profilequery);
		if (!$profileresult){
			die("database query failed");
		}
	$profilerows = mysqli_fetch_assoc($profileresult);


	//for display all users/admin/manager
	$displayquery = "SELECT * ";
	$displayquery .= "FROM login";

	$displayresult = mysqli_query($connection, $displayquery);
		if (!$displayresult){
			die("database query failed");
		}

		//For display all messages
		$msgquery = "SELECT * ";
		$msgquery .= "FROM message";

		$msgresult = mysqli_query($connection, $msgquery);



		if (!$_SESSION['username']) {
			header('location:login.php');
		}

		if($_SESSION['roles'] == "user"){
			header('location:user.php');
		}
		if($_SESSION['roles'] == "admin"){
			header('location:admin.php');
		}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo "$username | Manager"; ?></title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto">
		<link rel="stylesheet" href="css/master.css">

	</head>
	<body>
		<div class="container" id="manager">
			<div class="row">
				<div class="col-md-6">
					<h1>Welcome <?php echo "$username - $roles"; ?></h1>
				</div>
				<div class="col-md-6">
					<br>
					<a href="profile.php?id=<?php echo $profilerows['id'];?>" class="btn btn-lg btn-success">Profile</a>
					<a href="logout.php" class="btn btn-lg btn-danger">logout</a>
				</div>
			</div>

			<!--View all users-->
			<br>
			 <h3>All Users/Managers/Admins</h3>

			 <button type="button" class="btn btn-lg btn-primary" onclick="viewall()" name="button">View All</button>
 			 <br><br>

			 <table>
 				<thead>
 					<tr>
 						<th>Id</th>
 						<th>Username</th>
 						<th>Full Name</th>
 						<th>Roles</th>
 						<th>Delete user/admin/manager</th>
 						<th>View Profile</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php
 						while ($rows = mysqli_fetch_assoc($displayresult)) {
 					 ?>

					 <!--id-->
 					 <td><?php echo $rows["id"]; ?></td>

					 <!--Username-->
					 <td><?php echo $rows["username"]; ?></td>

					 <!--fullname-->
					 <td><?php echo $rows["fullname"]; ?></td>

					 <!--Roles-->
					 <td><?php echo $rows["roles"]; ?></td>

					 <!--Delete user/manager-->
 					 <td>
 						 <?php
 						 	if ($rows["id"] == $profilerows["id"]) {
 						 		echo "You are the Manager";
 						 	}
							elseif ($rows["roles"] == "admin"){
								echo "Admin";
							}
 							else {
 								?>
 								<form action='delete.php?id=<?php echo $rows['id']; ?>&username=<?php echo $rows['username']; ?>' method="post">
 							 		<input type="submit" name="submit" class="btn btn-sm btn-danger" value="Delete">
 						 		</form>
 						 <?php }  ?>
 						</td>

						<!--View Profile-->
						<td>
 							<a href='profile.php?id=<?php echo $rows['id']; ?>'>View Profile</a>
						</td>
 				</tbody>
 				<?php } ?>
 			</table>

			<!--Post Message-->
			<h3>Post Message</h3>
			<br>
			<div class="row">
				<!--display message-->
				<div class="col-md-6 well">
					<h3>All Messages</h3>
				<?php
					while ($msgrows = mysqli_fetch_assoc($msgresult)) {
				 ?>
				 <ul style="text-align:left"><li><?php echo $msgrows['msg']; ?> <form action='msgdelete.php?msgid=<?php echo $msgrows['msgid'];?>' method="post">
					 <input type="submit" class="btn btn-xs btn-danger" name="submit" value="Delete">
				 </form></li></ul>
				 <br>
				 <?php } ?>
			</div>
			<!--Post Message-->
			<div class="col-md-6">
				<form action="message.php" method="post">
					<textarea name="msg" rows="8" cols="50"></textarea>
					<br>
					<input type="submit" class="btn btn-lg btn-primary"value="Post">
				</form>
			</div>
		</div>
	</div>
	</body>
	<script src="js/script.js">

	</script>
</html>
