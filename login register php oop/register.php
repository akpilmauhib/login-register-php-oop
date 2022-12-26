<?php 
	require_once('config.php');
	require_once('functions.php');
	$user = new LoginRegistration();

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
			<h2>Register</h2>
	
		
		<p class="msg">
			<?php 


				if($_SERVER['REQUEST_METHOD'] == 'POST'){

					$username = $_POST['username'];
					$password = $_POST['password'];
					$name     = $_POST['name'];
					$email    = $_POST['email'];
					$website  = $_POST['website'];

					if(empty($username) or empty($password) or empty($name) or empty($email) or empty($website)){

						echo "<span style='color:#e53d37'> Error..Field can't empty!</span>";
					}
					else{

						$password = md5($password);

						$register = $user->registerUser($username,$password,$name,$email,$website);

						if($register){
							echo "<span style='color:green'>Register done <a href='login.php'>Click Here</a> for login</span> ";
						}
						else{
							echo "<span style='color:#e53d37'>Username or Email already exist.</span> ";
						}
					}

				}

			 ?>
		</p>
				
		<div class="login_reg">
			<form action="register.php" method="post" autocomplete="off">
				<table>
					<tr>
						<td>Username</td>
						<td> <input type="text" name="username" placeholder="Write your Username"> </td>
					</tr>

					<tr>
						<td>Password</td>
						<td> <input type="password" name="password" placeholder="Write your password"> </td>
					</tr>

					<tr>
						<td>Name</td>
						<td> <input type="text" name="name" placeholder="Write your Name"> </td>
					</tr>

					<tr>
						<td>Email</td>
						<td> <input type="email" name="email" placeholder="Write your Email"> </td>
					</tr>

					<tr>
						<td>Website</td>
						<td> <input type="text" name="website" placeholder="Write your Website"> </td>
					</tr>

					<tr>
						<td colspan="2"> 
						<span style="float: right">
							<input type="submit" value="Register"> 
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