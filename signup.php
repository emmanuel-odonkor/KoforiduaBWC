<?php include('functions.php')?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Favicon icon -->
  <link rel="shortcut icon" type="image/png" href="images/bwcLogoHome.png" />

  <!-- All CSS -->
  <!-- fontAwesome -->
  <link rel="stylesheet" href="css/all.min.css" />

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/jquery.fancybox.min.css" />
  <link rel="stylesheet" href="css/nice-select.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- custom css if you need -->
 
  <link rel="stylesheet" href="css/custom.css" />

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

	body {
		position: relative;
		min-height: 100vh;
		margin: 0;
	}

	footer {
		position: absolute;
		width: 100%;
		bottom: 0px;
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
        margin-top: 75px;
      }
    }


    @media only screen and (max-width:992px) {
      .header .primary-menu .login-button {
        margin-top: 150px;
        padding-bottom: 15px;
      }
    }

	@media only screen and (max-height: 667px) and (max-width: 992px) {
  
      .footer {
		position:relative !important;
		bottom: 0px !important;
		width: 100%;
        top:0vh;
		background-color: #003bb3 !important;
      }
 
    }

	@media only screen and (max-height: 667px) and (max-width: 576px) {

	 
      .footer {
		position:relative !important;
		bottom: 0px !important;
		width: 100%;
        top:0vh;
		background-color: #003bb3 !important;
      }

    }

	.bannerv7a{

		background-image: linear-gradient(rgba(0, 0, 0, 0.5),
            rgba(0, 0, 0, 0.5)), url("images/home.jpg");
        background-size: cover;
		background-attachment: fixed;
		background-size:cover;            
		background-repeat: no-repeat;
		background-position: top;
		min-height: 100vh;
	}

	@media only screen and (max-width:992px) {
      #second-c {
        margin-top: 100px;
		margin-bottom: 100px;
      }
    }
	@media only screen and (max-width:992px) {
      .header .primary-menu .login-button {
        margin-top: 75px;
      }
    }

	@media only screen and (max-width:444px) {
		#logoimage {
        content: url('images/bwcLogoHome.png');
		width: 60px !important;

    }
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

	#signupalert {
		display: none;
	}

  </style>
	</head>
	<body class="home-one">
	<!-- Header start -->
	<header class="header" style="background-color: #003bb3">
		<div class="container d-flex align-items-center">
		<a class="" href="index.html">
			<img src="images/bwcLogo.png" id="logoimage" style="width: 150px;" alt="" />
		</a>
		<span style="color:white;">Believers Worship Center</span>
		<nav class="primary-menu" style="margin-right: 75px;">
			<a id="mobile-menu-toggler" href="#"><i class="fa fa-bars" aria-hidden="true" style='color:white;'></i></a>
			<ul>
			<li><a href="https://www.bwcghana.org/" style="font-size: 16px;">Believers Worship Center Website</a></li>
			<li><a href="signup.php" style="font-size: 16px;">Sign up</a></li>
			<li class="login-button" style="position: absolute;top: 14px;">
				<a href="index.php" class="login btn btn-outline btn-round"
				style="padding-top: 10px !important; padding-bottom: 10px !important;padding-left: 23px !important; padding-right: 23px !important;">
				<span class="bh"></span><span style="font-size: 15px;">login</span></a>
			</li>
			</ul>
		</nav>
		</div>
  </header>
  <!-- Header end -->

  <section class="bannerv7a">
		<div class="container d-flex justify-content-center" id="second-c">
			<div class="card col-lg-7" style="border: none; opacity: 0.8; margin-bottom: 0;">
				<div class="card-body">
					<div style="display: flex;justify-content: center;align-items: center;">
						<h3 id="profile" class="card-title text-center"></h3>
					</div>
					<?php echo display_error(); ?>
					<form action="" class="mt-lg-2" method="POST" enctype="multipart/form-data">
						<div class="form-row">
							<!--User Header-->
							<div class="col-12">
							<div class="row" style="display: flex; align-items: center;justify-content: center;">
								<img src="images/bwcLogoHome.png" style="width:100px;">
							</div>
								<div class="form-header mt-4" style="background-color: #003bb3; border-radius: 0.2rem">
									<h6 class="mt-2 text-center">
										Sign Up -- Personal and Church Information&nbsp; <i class="fa fa-user" style="color:white;size: 60px;" aria-hidden="true"></i>
									</h6>
								</div>
							</div>

							<!--User Details-->
							<div class="col-lg-6 col-sm-6">
								<div class="form-group mt-4">
									<input type="text" pattern="[A-Za-z\s-]+" title="Enter a valid firstname"
										class="form-control" placeholder="First Name" required="required"
										value="<?php echo $ufname; ?>" id="f_name" name="f_name"
										style="font-size: 16px; height: 50px;" style="width: 200px" />
								</div>
							</div>
							<div class="col-lg-6 col-sm-6">
								<div class="form-group mt-4">
									<input type="text" pattern="[A-Za-z\s-]+" title="Enter a valid lastname"
										class="form-control" placeholder="Last Name" value="<?php echo $ulname; ?>"
										required="required" id="l_name" name="l_name"
										style="font-size: 16px; height: 50px;" style="width: 200px" />
								</div>
							</div>
							<div class="col-lg-6 col-sm-6">
								<div class="form-group mt-3">
									<input type="text" pattern="[A-Za-z\s-]+"
											title="Enter a valid username" class="form-control" placeholder="Username"
											required="required" id="uname" name="uname" value="<?php echo $uname; ?>"
											style="font-size: 16px; height: 50px;" style="width: 200px" />
								</div>
							</div>
							<div class="col-lg-6 col-sm-6">
								<div class="form-group mt-3 u_number">
									<input type="tel" pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$"
									title="Enter a valid Phone number" class="form-control"
									placeholder="Mobile Number" required="required" value="<?php echo $ucontact; ?>"
									id="u_mobile" name="umobile" style="font-size: 16px; height: 50px" size="90" />
								</div>
							</div>

							<div class="col-12">
								<div class="form-header mt-4" style="background-color: #003bb3; border-radius: 0.2rem">
									<h6 class="mt-2 text-center">
										Sign Up -- System Information&nbsp; <i class="fa fa-shield" style="color:white;size: 60px;" aria-hidden="true"></i>
									</h6>
								</div>
							</div>

							<div class="col-lg-6 col-sm-6">	

								<!--Pop up message-->
                                <div class="form-group mt-4" id="popup_message" style="
                                font-size: 14px;
                                background-color: #fcfcfc;
                                display: none;">
                                    <label class="mx-1" style="
                                            font-family: 'Gill Sans', 'Gill Sans MT', Calibri,
                                                'Trebuchet MS', sans-serif;
                                        ">
                                        <i class="fa fa-info-circle" aria-hidden="true" style="color: #003bb3"></i>
                                        Your password content should be:</label>
                                    <ul style="
                                            font-family: 'Gill Sans', 'Gill Sans MT', Calibri,
                                                'Trebuchet MS', sans-serif;
                                            text-indent: 22px;
                                            margin-top: 0px;
                                            margin-bottom: 20px;
                                        ">
                                        <li>8 characters long</li>
                                        <li>At least 1 Uppercase letter</li>
                                        <li>At least 1 Lowecase letter</li>
                                        <li>At least 1 Numeric digit</li>
                                    </ul>
                                </div>
                                <!--End of Pop up message-->

								<div class="mt-4 popupinput">
										<div class="form-group" id="password_input" style="position: relative">
											<input type="text" title="Enter a valid password"
												class="form-control" placeholder="Password" required="required"
												id="new_password" name="new_password"
												style="font-size: 16px; height: 50px;"
												style="width: 200px" oninput="typePass()" />
												<label id="show"
												style="color: gray; font-size: 13px">Show</label>
										</div>
								</div>
							</div>

							<div class="col-lg-6 col-sm-6">
								<div class="form-group mt-4" id="cpassword" style="position: relative">
                                    <input type="password" title="Enter a valid password"
                                        class="form-control" placeholder="Confirm Password" required="required"
                                        id="cpass" name="cpass" style="font-size: 16px; height: 50px;"
                                        style="width: 200px"/>
                                        <label id="show1" style="color: gray; font-size: 13px">Show</label>
                                </div>
							</div>

							<div class="form-group mt-4 col-12 mb-5">
								<button type="submit" class="btn btn-primary btn-block" id="button1" name="register_btn"
									style="background-color: green; border-color: green">
									Sign Up
								</button>
								<div class="text-center mt-3">
									<label style="font-size:14px;">Already have an account? <a href="index.php">Log In</a></label>
								</div>	
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

<!-- Footer start -->
<footer class="footer" style="position: absolute;">
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
<script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <!--Country Code and Flag JS Plugin-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
	<script src="build/js/intlTelInput.js"></script>
	<script src="js/country_flag_code.js"></script>

	<!-- JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/owl.carousel.min.js"></script>
<script src="js/owl.carousel2.thumbs.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<!-- <script src="../../cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script> -->
<!-- <script src="../../s3-us-west-2.amazonaws.com/s.cdpn.io/106949/jquery.onscreen.js"></script> -->
<script src="js/scripts.js"></script>
<script src="js/remitone/corporate_calculator.js"></script>

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
			var passcode = document.getElementById("cpass");
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
			var pass = document.getElementById("new_password");
			pass.type = "password";
		}

	</script>

	<script>
		//switch from first form to second form
		$("#button1").on("click", function () {
			var password = document.getElementById("new_password").value;
			var password_c = document.getElementById("cpass").value;

			//regex for password
			let password_regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;

			if (password == "") {
				Swal.fire({
				icon: 'error',
				title: 'Empty Password Field',
				text: 'Fill the Password section',
			  })
				return false;
			} else if (!password.match(password_regex)) {
				Swal.fire({
				icon: 'error',
				title: 'Incorrect Password',
				text: 'Please follow the instruction to create a strong password',
			  })
				return false;
			}
			else if(password != password_c)
			{
				Swal.fire({
				icon: 'error',
				title: 'Passwords do not match',
				text: 'Ensure that both passwords are the same',
			  })
			  return false;

			}
		});

	</script>
</body>
</html>
