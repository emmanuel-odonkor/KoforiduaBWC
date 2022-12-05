<?php 

session_start();

//establishing a connection to the database "KoforiduaBWC"
//Database credentials



	$conn = mysqli_connect('localhost','root','','koforiduabwc');


	//variable declaration
	$ufname = "";
	$ulname = "";
    $uname = "";
	$ucontact = "";

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

		global $conn, $errors, $success, $ufname, $ulname, $uname, $ucontact;

		$ufname = ($_POST['f_name']);
		$ulname = ($_POST['l_name']);
		$uname = ($_POST['uname']);
		$ucontact = ($_POST['umobile']);
		$upass = ($_POST['new_password']);
		//$cpass = ($_POST['cpass']);

		if(empty($ufname)){
			array_push($errors, "<script>alert('Firstname is required')</script>");
		}
		if(empty($ulname)){
			array_push($errors, "<script>alert('Lastname is required')</script>");
		}
		if(empty($uname)){
			array_push($errors, "<script>alert('Username is required')</script>");
		}
		if(empty($ucontact)){
			array_push($errors, "<script>alert('Contact is required')</script>");
		}
		//if($upass != $cpass){
		//	array_push($errors,"<script>Swal.fire({
		//		icon: 'error',
		//		title: 'Passwords do not match',
		//		text: 'Ensure that both passwords are the same',
		//	  })</script>");
		//}


		if(count($errors) == 0){
			$pass = md5($upass);

			$query = "INSERT INTO users(firstname,lastname,username,contact,password,usertype) VALUES ('$ufname','$ulname','$uname','$ucontact','$pass','Admin')";

			mysqli_query($conn, $query);
			$_SESSION['success'] = "New user created successfully";
			header('location: index.php');
			//array_push($success, "<script>alert('Well done')</script>");
			
		}
		
	}


	function getUserById($id){
		global $conn;

		$query = "SELECT * from users WHERE ID =" . $id;
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
		if(isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 'Admin'){
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
		header('location: index.php');
	}


	if(isset($_POST['login_btn'])){
		login();
	}

	function login(){
		global $conn , $username , $errors;

		$username = $_POST['uname'];
		$password = $_POST['pass'];

		if(count($errors) == 0){
			$password = md5($password);

			$query = "SELECT * from users WHERE username = '$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($conn, $query);

			if(mysqli_num_rows($results) == 1){

				$logged_in_user = mysqli_fetch_assoc($results);
				if($logged_in_user['usertype'] == 'Admin'){
	
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success'] = "You are now logged in";
					header('location: users/dashboard.php');

				}else{

				//	$_SESSION['user'] = $logged_in_user;
				//	$_SESSION['success'] = "You are now logged in";
				//	header('location: student/Student.php');

				}
			}else{
				array_push($errors,"<script>Swal.fire({
					icon: 'error',
					title: 'Oops..',
					text: 'Incorrect Username or Password',
				  })</script>");
			}
		}
	}


?>