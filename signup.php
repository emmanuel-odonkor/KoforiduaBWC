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
            rgba(0, 0, 0, 0.5)), url("images/home.jpg");
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

  </style>
	</head>
	<body class="home-one">
	<!-- Header start -->
	<header class="header" style="background-color: #003bb3">
		<div class="container d-flex align-items-center">
		<a class="" href="index.html">
			<img src="images/bwcLogo.png" style="width: 150px;" alt="" />
		</a>
		<span style="color:white;">Believers Worship Center</span>
		<nav class="primary-menu" style="margin-right: 75px;">
			<a id="mobile-menu-toggler" href="#"><i class="fas fa-bars"></i></a>
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
		<div class="container d-flex justify-content-center">
			<div class="card col-lg-7" style="border: none; opacity: 0.9; margin-bottom: 0;">
				<div class="card-body">
					<div style="display: flex;justify-content: center;align-items: center;">
						<h3 id="profile" class="card-title text-center"></h3>
					</div>

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
							<div class="col-6">
								<div class="form-group mt-4">
									<input type="text" pattern="[A-Za-z\s-]+" title="Enter a valid firstname"
										class="form-control" placeholder="First Name" required="required"
										value="" id="f_name" name=""
										style="font-size: 16px; height: 50px;" style="width: 200px" />
								</div>
							</div>
							<div class="col-6">
								<div class="form-group mt-4">
									<input type="text" pattern="[A-Za-z\s-]+" title="Enter a valid lastname"
										class="form-control" placeholder="Last Name" value=""
										required="required" id="" name=""
										style="font-size: 16px; height: 50px;" style="width: 200px" />
								</div>
							</div>
							<div class="col-6">
								<div class="form-group mt-3">
									<input type="text" pattern="[A-Za-z\s-]+"
											title="Enter a valid username" class="form-control" placeholder="Username"
											required="required" id="uname" name=""
											style="font-size: 16px; height: 50px;" style="width: 200px" />
								</div>
							</div>
							<div class="col-6">
								<div class="form-group mt-3 u_number">
									<input type="tel" pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$"
									title="Enter a valid Phone number" class="form-control"
									placeholder="Mobile Number" required="required" value=""
									id="u_mobile" style="font-size: 16px; height: 50px" size="90" />
								</div>
							</div>

							<div class="col-6">
								<div class="form-group mt-3">
									<input type="date" title="Enter a valid date of birth" class="form-control"
									placeholder="Date of Birth" required="required" id="dob" name=""
									value="" style="font-size: 16px; height: 50px;"
									style="width: 200px; font-size: medium" onmouseout="ageCalculator()"/>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group mt-3">
									<input type="number" pattern="[0-9]+" title="Entering your date of birth shows your Age" class="form-control"
									placeholder="Age" required="required" id="age" name="" style="font-size: 16px; height: 50px;"
									style="width: 200px;" readonly/>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group mt-3">
										<select id="gender" placeholder="Gender" class="form-control"
										style="height: 50px;" required>
										<option name="" value="" style="display:none;">Select Your  Gender</option>
										<option name="Male" value="Male">Male</option>
										<option name="Female" value="Female">Female</option>
										</select>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group mt-3">
										<select id="grouptype" placeholder="Gender" class="form-control"
										style="height: 50px;" required>
										<option name="" value="" style="display:none;">Choose Your Group Type</option>
										<option name="Adom" value="Adom">Adom</option>
										<option name="Second Chance" value="Second Chance">Second Chance</option>
										</select>
								</div>
							</div>

							<div class="col-12">
								<div class="form-header mt-4" style="background-color: #003bb3; border-radius: 0.2rem">
									<h6 class="mt-2 text-center">
										Sign Up -- System Information&nbsp; <i class="fa fa-shield" style="color:white;size: 60px;" aria-hidden="true"></i>
									</h6>
								</div>
							</div>

							<div class="col-6">	

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
												id="new_password" name=""
												style="font-size: 16px; height: 50px;"
												style="width: 200px" oninput="typePass()" />
												<label id="show"
												style="color: gray; font-size: 13px">Show</label>
										</div>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group mt-4" id="old_password" style="position: relative">
                                    <input type="password" title="Enter a valid password"
                                        class="form-control" placeholder="Confirm Password" required="required"
                                        id="old_pass" name="" style="font-size: 16px; height: 50px;"
                                        style="width: 200px"/>
                                        <label id="show1" style="color: gray; font-size: 13px">Show</label>
                                </div>
							</div>

							<div class="form-group mt-4 col-12 mb-5">
								<button type="submit" class="btn btn-primary btn-block" id="button1"
									style="background-color: green; border-color: green">
									Log In
								</button>
								<div class="text-center mt-3">
									<label style="font-size:14px;">Don't have an account? <a href="signup.php">Sign Up</a></label>
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

	<script>

	function ageCalculator() {
		var userinput = document.getElementById("dob").value;
		var dob = new Date(userinput);
		
		//calculate month difference from current date in time
		var month_diff = Date.now() - dob.getTime();
		
		//convert the calculated difference in date format
		var age_dt = new Date(month_diff); 
		
		//extract year from date    
		var year = age_dt.getUTCFullYear();
		
		//now calculate the age of the user
		var age = Math.abs(year - 1970);
		
		//display the calculated age
		document.getElementById("age").value =  age ;
		
	}
	</script>
</body>
</html>
