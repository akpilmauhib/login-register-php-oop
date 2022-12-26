<?php 
require_once('config.php');

class LoginRegistration{

	function __construct(){

		$database = new DatabaseConnection();
	}

	public function registerUser($username,$password,$name,$email,$website){

		global $pdo;

		$query = $pdo->prepare("SELECT id FROM users WHERE username = ? AND email = ?");
		$query->execute(array($username,$email));

		$num = $query->rowCount();

		if($num == 0){

			$query = $pdo->prepare("INSERT INTO users (username,password,name,email,website) VALUES (?, ?, ?, ?, ?)");

			$query->execute(array($username,$password,$name,$email,$website));

			return true;
		}
		else{
			return "<span style='color:#e53d37'> Error..Username or Email already use!</span>";
		}
	}

	public function loginUser($email,$password){
		global $pdo;

		$query = $pdo->prepare("SELECT id,username FROM users WHERE email=? AND password=?");
		$query->execute(array($email, $password));
		$userdata = $query->fetch();

		$num = $query->rowCount();

		if($num==1){
			session_start();
			$_SESSION['login'] = true;
			$_SESSION['uid']   = $userdata['id'];
			$_SESSION['uname'] = $userdata['username'];

			$_SESSION['login_msg'] = 'login successfully';

			return true;
		}
		else{
			return false;
		}
	}

	public function getAlluser(){
		global $pdo;
	
		$query = $pdo->prepare("SELECT * FROM users ORDER BY id DESC");
		$query->execute();
		return $query->fetchALL(PDO::FETCH_ASSOC);
	}

	public function getSession(){
		return @$_SESSION['login'];
	}
}

 ?>