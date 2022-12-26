<?php 
	session_start();

	require_once('functions.php');
	$user = new LoginRegistration();

	$uid 	  = $_SESSION['uid'];
	$username = $_SESSION['uname'];

	if(!$user->getSession()){
 		header('Location : login.php');
 		exit();
 	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration Page</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="wraper">
		<div class="header">
			<h2>php OOP Log-in Registration system</h2>
		</div>

		<div class="mainmenu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="profile.php">Show Profile</a></li>
				<li><a href="changePassword.php">Change Password</a></li>
				<li><a href="logout.php">Logout</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
			</ul>
		</div>

		<div class="content">
			<h2>Login</h2>
	
		
		<p class="msg">

			 
			 
		</p>

		<h2>Welcome, <?php echo "$username"; ?> </h2>
				
		 <p class="userlist">All userlist.</p>

		 <table class="tbl_one">
		 	<tr>
		 		<th>Serial</th>
		 		<th>Name</th>
		 		<th>Profile</th>
		 	</tr>

		 	<?php 
		 		$i = 0;
		 		$alluser = $user->getAlluser();

		 		foreach ($alluser as $user) {
		 			$i++;
		 	

		 	 ?>

		 	<tr>
		 		<td><?php echo $i; ?> </td>
		 		<td><?php echo $user['name']; ?> </td>
		 		<td><a href="profile.php?id=<?php echo $user['id']; ?>">View Profile</a></td>
		 	</tr>

		 	<?php 	} ?>
		 </table>


	</div>

		<div class="footer">
			<h3>Developed By <b>MD. Golam Raihan</b></h3>
		</div>

	</div>
	
</body>
</html>