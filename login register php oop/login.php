<?php 
	require_once('config.php');
 	require_once('functions.php');
 	$user = new LoginRegistration;

 	if($user->getSession()){
 		header('Location : index.php');
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

			<?php

				if($_SERVER['REQUEST_METHOD'] == 'POST'){

					$email 	  = $_POST['email'];
					$password = $_POST['password'];


				if(empty($email) or empty($password)){
					echo "<span style = 'color:#e53d37'>Please fill up this field..!</span> ";
					}
				
				else{
					$password = md5($password);
					$login = $user->loginUser($email, $password);

					if($login){
						header('Location: index.php');
					}
					else{
						echo "<span style = 'color:#e53d37'>Error...email or password do not match..!</span> ";
					}
				}
			}

			 ?>
			 
		</p>
				
		<div class="login_reg">
			<form action="login.php" method="post" autocomplete="off">
				<table>

					<tr>
						<td>Email</td>
						<td> <input type="email" name="email" placeholder="Write your Email"> </td>
					</tr>
					 
 					<tr>
						<td>Password</td>
						<td> <input type="password" name="password" placeholder="Write your password"> </td>
					</tr>

					 <tr>
						<td colspan="2"> 
						<span style="float: right">
							<input type="submit" name="login" value="Login"> 
							<input type="reset" name="reset" value="Reset">
						</span>
						</td>
					</tr>
				</table>
			</form>
		</div>

		<div class="back">
			<a href="login.php"> <img src="img/back.png" alt="back"> </a>
		</div>

	</div>

		<div class="footer">
			<h3>Developed By <b>MD. Golam Raihan</b></h3>
		</div>

	</div>
	
</body>
</html>