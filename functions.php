<?php 

session_start();

//establishing a connection to the database "tutorsystem"
//Database credentials



	$conn = mysqli_connect('localhost','id16523746_root','Spartan13!24','id16523746_tutor_system');


	//variable declaration
	$uname = "";
	$uemail = "";
	$errors = array();

if(!$conn){
		//If not, the program echoes out "CONNECTION FAILED".
		die("CONNECTION FAILED: " . mysqli_connect_error());
	}else{

	if(isset($_POST['register_btn'])){
		register();
	}

}


	function register(){

		global $conn, $errors, $uname, $uemail;

		$uname = ($_POST['uname']);
		$uemail = ($_POST['uemail']);
		$upass = ($_POST['upass']);
		$cpass = ($_POST['cpass']);

		if(empty($uname)){
			array_push($errors, "<script>swal('Error','Username is required','error')</script>");
		}
		if(empty($uemail)){
			array_push($errors, "<script>swal('Error','Email is required','error')</script>");
		}
		if($upass != $cpass){
			array_push($errors, "<script>swal('Error','Both Passwords do not match','error')</script>");
		}


		if(count($errors) == 0){
			$pass = md5($upass);


			if(isset($_POST['ustatus'])){
			$user_type = ($_POST['ustatus']);
			$query = "INSERT INTO users(username,email,password,user_type) VALUES ('$uname','$uemail','$pass','$user_type')";

			mysqli_query($conn, $query);
			$_SESSION['success'] = "New user created successfully";
			header('location: login.php');
			}else{
			$query = "INSERT INTO users(username,email,password,user_type) VALUES ('$uname','$uemail','$pass','user')";

			mysqli_query($conn, $query);

			$logged_in_user_id = mysqli_insert_id($conn);

			$_SESSION['user'] = getUserById($logged_in_user_id);
			$_SESSION['success'] = "You are now logged in";
			header('location: login.php');

		}


		}
		
	}


	function getUserById($id){
		global $conn;

		$query = "SELECT * from users WHERE user_id=" . $id;
		$result = mysqli_query($conn,$query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}


	function display_error(){
		global $errors;

		if(count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error) {
					echo $error .'<br>';
				}

				echo '</div>';
		}
	}


	function isLoggedIn()
	{
		if(isset($_SESSION['user'])){
			return true;
		}else{
			return false;
		}
	}

	function isTutor(){
		if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'Tutor'){
			return true;
		}else{
			return false;
		}
	}

	function isAdmin(){
		if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'Admin'){
			return true;
		}else{
			return false;
		}
	}

	//Checking login for CSIS Head of department
	function isCSIS_HOD(){
		if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'CSIS_HOD'){
			return true;
		}else{
			return false;
		}
	}

	function isBA_HOD(){
		if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'BA_HOD'){
			return true;
		}else{
			return false;
		}
	}


	function isENG_HOD(){
		if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'ENG_HOD'){
			return true;
		}else{
			return false;
		}
	}

	function isHSS_HOD(){
		if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'HSS_HOD'){
			return true;
		}else{
			return false;
		}
	}




	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['user']);
		header('location: login.php');
	}


	if(isset($_POST['login_btn'])){
		login();
	}

	function login(){
		global $conn , $username , $errors;

		$username = $_POST['username'];
		$password = $_POST['password'];

		if(empty($username)){
			array_push($errors, "<script>swal('Username is required','Please enter your Username','error')</script>");
		}

		if(empty($password)){
			array_push($errors, "<script>swal('Password is required','Please enter your Password','error')</script> ");
		}

		if(count($errors) == 0){
			$password = md5($password);

			$query = "SELECT * from users WHERE username = '$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($conn, $query);

			if(mysqli_num_rows($results) == 1){

				$logged_in_user = mysqli_fetch_assoc($results);
				if($logged_in_user['user_type'] == 'Tutor'){

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success'] = "You are now logged in";
					header('location: tutor/Tutor.php');

				}else if($logged_in_user['user_type'] == 'Admin'){
	
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success'] = "You are now logged in";
					header('location: admin/Admin.php');

				}else if($logged_in_user['user_type'] == 'CSIS_HOD'){
	
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success'] = "You are now logged in";
					header('location: departments/CSIS_HOD.php');

				}else if($logged_in_user['user_type'] == 'BA_HOD'){
	
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success'] = "You are now logged in";
					header('location: departments/BA_HOD.php');

				}else if($logged_in_user['user_type'] == 'ENG_HOD'){
	
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success'] = "You are now logged in";
					header('location: departments/ENG_HOD.php');

				}else if($logged_in_user['user_type'] == 'HSS_HOD'){
	
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success'] = "You are now logged in";
					header('location: departments/HSS_HOD.php');

				}else{

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success'] = "You are now logged in";
					header('location: student/Student.php');

				}
			}else{
				array_push($errors,"<script>swal('Wrong Username or Password','Please try again','error')</script>");
			}
		}
	}


?>