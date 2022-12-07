<?php 
    include('../functions.php');
    if(!isAdmin()){
        $_SESSION['msg'] = "You must log in first";
        header('location: ../index.php');
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['user']);
        header('location:../index.php');
    }

	//open the connection
    $conn = mysqli_connect('localhost','root','','koforiduabwc');

?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Favicon icon -->
  <link rel="shortcut icon" type="image/png" href="../images/bwcLogoHome.png" />

  <!-- All CSS -->
  <!-- fontAwesome -->
  <link rel="stylesheet" href="../css/all.min.css" />

  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/owl.carousel.min.css" />
  <link rel="stylesheet" href="../css/jquery.fancybox.min.css" />
  <link rel="stylesheet" href="../css/nice-select.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.min.css" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- custom css if you need -->
 
  <link rel="stylesheet" href="../css/custom.css" />

  <title>Believers Worship Center -- Koforidua</title>

<!--Embedded CSS Style -->
<style type="text/css">
    .form-header {
      padding: 10px;
      background-color: #003bb3;
      color: white;
      background-size: 300px 100px;
    }

	footer{
      background-color:#003bb3 !important;
      border-color: #003bb3 !important;
    }

    

    /* Structure for web application in phone view */

    @media only screen and (max-width:800px) {

      .form-tab {
        width: 370px;
        margin-top: 2px;
        margin-left: 2px;

      }
	}


    @media only screen and (max-width:992px) {
      .header .primary-menu .login-button {
        margin-top: 150px;
        padding-bottom: 15px;
      }
    }

	.bannerv7a{

		background-image: linear-gradient(rgba(0, 0, 0, 0.5),
            rgba(0, 0, 0, 0.5)), url("../images/5.jpg");
        background-size: cover;
		background-attachment: fixed;
		background-size:cover;            
		background-repeat: no-repeat;
		background-position: top;
	}

	#show1 {
        position: absolute;
        top: 21%;
        right: 4%;
        cursor: pointer;
    }

	#show {
        position: absolute;
        top: 21%;
        right: 4%;
        cursor: pointer;
    }

	.dropdown-toggle{
		color:white;
	}

  </style>
	</head>
	<body class="home-one">
		<!-- Header start -->
		<header class="header" style="background-color: #003bb3">
		<div class="container d-flex align-items-center">
		<a class="" href="index.html">
			<img src="../images/bwcLogo.png" style="width: 150px;" alt="" />
		</a>
		<span style="color:white;">Welcome <strong><?php echo $_SESSION['user']['Username']; ?></strong> to the Dashboard</span>
		<nav class="primary-menu">
			<a id="mobile-menu-toggler" href="#"><i class="fas fa-bars"></i></a>
			<ul>
			<li><a href="https://www.bwcghana.org/" style="font-size: 16px;">Believers Worship Center Website</a></li>
			<li>
				<div class="dropdown" >
					<button class="dropbtn dropdown-toggle"
						data-toggle="dropdown" style="background-color:transparent;border:none;">
						<img src="../images/user.png" style="width: 37px; display: inline-block;" alt="" />
					</button>
					<div class="dropdown-menu">
						<div class="dropdown-item" style="color:black;padding: 12px;font-size:14px;">
							Logged In as:
							<div>
								<?php if(isset($_SESSION['user'])) : ?>
								<strong><?php echo $_SESSION['user']['Username']; ?></strong>
								<small>
									<i style="color:#888;">(<?php echo ucfirst($_SESSION['user']['usertype']); ?>)</i>
								</small>
								<?php endif ?>
							</div>
						</div>
						<hr class="dropdown-divider">
						<?php if(isset($_SESSION['user'])) : ?>
							<a class="dropdown-item" href="dashboard.php?logout='1'" style="color: red;padding: 12px;font-size:14px;">Log Out</a>
						<?php endif ?>
					</div>
				</div>
			</li>
			</ul>
		</nav>
		</div>
  </header>
  <!-- Header end -->


  <section class="bannerv7a">
		<div class="container d-flex justify-content-center">
			<div class="card col-lg-7" style="border: none; opacity: 0.8; margin-bottom: 0;">
				<div class="card-body">
					<div style="display: flex;justify-content: center;align-items: center;">
						<h3 id="profile" class="card-title text-center"></h3>
					</div>

					<form action="" class="mt-lg-2" method="POST" enctype="multipart/form-data">
						<div class="form-row">
							<!--User Header-->
							<div class="col-12">
							<div class="row" style="display: flex; align-items: center;justify-content: center;">
								<img src="../images/bwcLogoHome.png" style="width:100px;">
							</div>
								<div class="form-header mt-4" style="background-color: #003bb3; border-radius: 0.2rem">
									<h6 class="mt-2 text-center">
										Add Member -- Personal and Church Information&nbsp; <i class="fa fa-user-plus" style="color:white;" aria-hidden="true"></i>
									</h6>
								</div>
							</div>
							<!--User Details-->
							<div class="col-6">
								<div class="form-group mt-4">
									<input type="text" pattern="[A-Za-z\s-]+" title="Enter a valid firstname"
										class="form-control" placeholder="First Name" required="required"
										value="" id="mfname" name="mfname"
										style="font-size: 16px; height: 50px;" style="width: 200px" />
								</div>
							</div>
							<div class="col-6">
								<div class="form-group mt-4">
									<input type="text" pattern="[A-Za-z\s-]+" title="Enter a valid lastname"
										class="form-control" placeholder="Last Name" value=""
										required="required" id="mlname" name="mlname"
										style="font-size: 16px; height: 50px;" style="width: 200px" />
								</div>
							</div>
							<div class="col-6">
								<div class="form-group mt-3 u_number">
									<input type="tel" pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$"
									title="Enter a valid Phone number" class="form-control"
									placeholder="Mobile Number" required="required" value=""
									id="u_mobile" name="mcontact" style="font-size: 16px; height: 50px" size="90" />
								</div>
							</div>

							<div class="col-6">
								<div class="form-group mt-3">
										<select id="gender" name="mgender" placeholder="Gender" class="form-control"
										style="height: 50px;" required>
										<option name="" value="" style="display:none;">Select Your  Gender</option>
										<option name="Male" value="Male">Male</option>
										<option name="Female" value="Female">Female</option>
										</select>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group mt-3">
										<select id="grouptype" name="mgroup" placeholder="Group Type" class="form-control"
										style="height: 50px;" required>
										<option name="" value="" style="display:none;">Choose Your Group Type (Adom or Second Chance)</option>
										<option name="Adom" value="Adom">Adom Group</option>
										<option name="Second Chance" value="Second Chance">Second Chance Group</option>
										</select>
								</div>
							</div>

							<div class="form-group mt-4 col-12 mb-5">
								<button type="submit" class="btn btn-primary btn-block" id="button3"
									name="madd" style="background-color: green; border-color: green">
									Add Member
								</button>
								<div class="text-center mt-3">
									<label style="font-size:14px;">Back to <a href="dashboard.php">Dashboard Page</a></label>
								</div>	
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

<!-- Footer start -->
<footer class="footer">
		<div class="foo-btm">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="copyright text-center">
							Copyright &copy; <a href="/">Believers Worship Center Koforidua Branch</a> - 
							<script>
								document.write(new Date().getFullYear());
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
</footer>
<!-- Footer end -->		
<script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <!--Country Code and Flag JS Plugin-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
	<script src="../build/js/intlTelInput.js"></script>
	<script src="../js/country_flag_code.js"></script>

	<script>
		//hide and show password
		$("#show").on("click", function () {
			var passcode = document.getElementById("new_password");
			if (passcode.type === "password") {
				passcode.type = "text";
				document.getElementById("show").innerHTML = "Hide";
			} else {
				passcode.type = "password";
				document.getElementById("show").innerHTML = "Show";
			}
		});

		 $("#show1").on("click", function () {
			var passcode = document.getElementById("old_pass");
			if (passcode.type === "password") {
				passcode.type = "text";
				document.getElementById("show1").innerHTML = "Hide";
			} else {
				passcode.type = "password";
				document.getElementById("show1").innerHTML = "Show";
			}
		});
	</script>

	<script>
		//Mobile Number section (country codes with flags)
		const u_mobile = document.querySelector("#u_mobile");
		const u_mobile_input = window.intlTelInput(u_mobile, {
			preferredCountries: ["gh", "gb"],
		});

		$(document).ready(function () {
			$(".u_number").click(function () {
				var countryCode = $(".u_number .iti__selected-flag").attr("title");
				var countryCode = countryCode.replace(/[^0-9]/g, "");
				$("#u_mobile").val("");
				$("#u_mobile").val("+" + countryCode + $("#u_mobile").val());
			});
		});
	</script>

	<script>
		//Sliding of password pop message up and down
		$("#password_input").click(function () {
			$("#popup_message").slideDown();
			var show_word = document.getElementById("show");
			return false;
		});

		$(window).click(function () {
			if ($("#popup_message").is(":visible")) {
				$("#popup_message").slideUp();
			}
		});

		//Removal of saved login in Password section
		function typePass() {
			var pass = document.getElementById("password");
			pass.type = "password";
		}

	</script>
</body>
</html>


<?php 

//include the controller
require('../controllers/memberscontroller.php');

//check if submit button was clicked to add member profile
if (isset($_POST['madd'])) {
    //grab form data and stores them in variables
    $mfname = $_POST['mfname'];
	$mlname = $_POST['mlname'];
    $mcontact = $_POST['mcontact'];
    $mgender = $_POST['mgender'];
    $mgroup = $_POST['mgroup'];

    $adminuser_id =  $_SESSION['user']['ID'];
	$adminuser_name =  $_SESSION['user']['Username'];

	 //calls function from memberscontroller.php to add a member
    $ret =  addmemberctrl($adminuser_id,$adminuser_name, $mfname, $mlname, $mcontact, $mgender,$mgroup);
    //echo result
                if ($ret) {
                    //echo success, if the tutor_profile was successfully created
                            echo "<script>Swal.fire({
								icon: 'success',
								title: 'Suuccessful',
								text: 'Member Profile Created',
							  })</script>";
                }else{
                    //echo danger, if the tutor_profile was not successfully created
                    echo "<script>Swal.fire({
						icon: 'error',
						title: 'Oops..',
						text: 'Error creating member account',
					  })</script>";
                }

		//open the connection and gets the ID of the added member and shows it to them
		$conn = mysqli_connect('localhost','root','','koforiduabwc');

		$sql="SELECT memberid,firstname,lastname  FROM `members` WHERE `firstname` = '$mfname' AND `lastname` = '$mlname' AND `adminid` = '$adminuser_id'";

		global $memberid;

		if($result=$conn->query($sql))
             {
                while($row=$result->fetch_assoc()){

                    $memberid = $row["memberid"];
					$fname = $row["firstname"];
					$lname = $row["lastname"];
                
                }

				echo "<script>Swal.fire({
					icon: 'success',
					title: 'Member Profile Created',
					text: 'ID for user, $fname $lname is $memberid',
				  })</script>";
					

				
            }


    }

?>