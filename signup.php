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
  <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/jquery.fancybox.min.css" />
  <link rel="stylesheet" href="css/nice-select.css" />
  <link rel="stylesheet" href="css/style.css" />


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

  </style>
	</head>
	<body class="home-one">
	<!-- Header start -->
	<header class="header" style="background-color: #003bb3">
		<div class="container d-flex align-items-center d-inline-block">
		<a class="" href="index.html">
			<!-- <img src="images/favicon.png" style="width: 85px;" alt="" /> -->
			<img src="images/bwcLogoHome.png" style="width: 85px;" alt="" />
			<!--<label>Believers Worship Center -- Koforidua Branch</label>-->
		</a>
		<nav class="primary-menu" style="margin-right: 75px;">
			<a id="mobile-menu-toggler" href="#"><i class="fas fa-bars"></i></a>
			<ul>
			<li><a href="#ourStory" style="font-size: 16px;">Our Story</a></li>
			<!--<li><a data-toggle="modal" href="#myModal" style="font-size: 16px;">Send Money</a></li>-->
			<li><a href="#securePaymment" style="font-size: 16px;">Security</a></li>

			<li><a href="faq.html" style="font-size: 16px;">Help</a></li>
			<li><a href="signup.html" style="font-size: 16px;">Sign up</a></li>
			<li class="login-button" style="position: absolute;top: 14px;">
				<a href="login.html" class="login btn btn-outline btn-round"
				style="padding-top: 10px !important; padding-bottom: 10px !important;padding-left: 23px !important; padding-right: 23px !important;">
				<span class="bh"></span><span style="font-size: 15px;">login</span></a>
			</li>
			</ul>
		</nav>
		</div>
  </header>
  <!-- Header end -->

  <section class="banner v7a" style="background-image: url('images/homeProphet.jpg'); width: 100vw;">
		<div class="container d-flex justify-content-center">
			<div class="card col-lg-7" style="border: none">
				<div class="card-body">
					<div style="
								display: flex;
								justify-content: center;
								align-items: center;
							">
						<h3 id="profile" class="card-title text-center"></h3>
					</div>

					<form action="" class="mt-lg-2" method="POST" enctype="multipart/form-data">
						<div class="form-row">
							<!--User Header-->
							<div class="col-12">
								<div class="form-header" style="background-color: #003bb3; border-radius: 0.2rem">
									<h6 class="mt-2 text-center">
										User Details&nbsp; <i size="60px" class="fas fa-user"></i>
									</h6>
								</div>
							</div>
							<!--User Details-->
							<div class="col-6">
								<div class="form-group mt-4">
									<span class="mx-1" style="position: absolute; margin-top: 12px; color: black">
										<img src="images/signup_logos/account.png"
											style="width: 25px; height: 25px" /></span>
									<input type="text" pattern="[A-Za-z\s-]+" title="Enter a valid firstname"
										class="form-control" placeholder="First Name" required="required" readonly
										value="Jane" id="f_name" name=""
										style="font-size: 16px; height: 50px; text-indent: 28px" style="width: 200px" />
								</div>
							</div>
							<div class="col-6">
								<div class="form-group mt-4">
									<span class="mx-1" style="position: absolute; margin-top: 12px; color: black">
										<img src="images/signup_logos/account.png"
											style="width: 25px; height: 25px" /></span>
									<input type="text" pattern="[A-Za-z\s-]+" title="Enter a valid lastname"
										class="form-control" placeholder="Last Name" readonly value="Doe"
										required="required" id="l_name" name=""
										style="font-size: 16px; height: 50px; text-indent: 28px" style="width: 200px" />
								</div>
							</div>
							<div class="col-12">
								<div class="form-group mt-2">
									<span class="mx-1" style="position: absolute; margin-top: 12px; color: black"><img
											src="images/signup_logos/mail-inbox-app.png"
											style="width: 25px; height: 25px" /></span>
									<input type="email" pattern="[a-z._0-9-]+@[a-z]+\.[a-z]{2,3}"
										title="Enter a valid email address" class="form-control" placeholder="Email"
										required="required" id="email" value="jane.doe@jd.com" readonly name=""
										style="font-size: 16px; height: 50px; text-indent: 25px" style="width: 200px" />
								</div>
								<div class="form-group mt-4 u_number">
									<input type="tel" pattern="^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$"
										title="Enter a valid Phone number" class="form-control"
										placeholder="Mobile Number" required="required" readonly value="+44 1632 960482"
										id="u_mobile" style="font-size: 16px; height: 50px" size="90" />
								</div>
								<div class="form-group mt-4">
									<span class="mx-2" style="position: absolute; margin-top: 12px; color: black"><img
											src="images/signup_logos/date-of-birth.png"
											style="width: 23px; height: 23px" /></span>
									<input type="date" title="Enter a valid date of birth" class="form-control"
										placeholder="Date of Birth" required="required" id="dob" name=""
										value="1998-10-23" style="font-size: 16px; height: 50px; text-indent: 28px"
										style="width: 200px; font-size: medium" readonly />
								</div>

								<!--Card Header-->
								<div class="form-header mt-5" style="background-color: #003bb3; border-radius: 0.2rem">
									<h6 class="mt-2 text-center">
										ID Card Details&nbsp; <i style="size: 60px;"
										class="fas fa-id-card"></i>
									</h6>
								</div>
								
								<!--Card Details-->
								<div class="form-group mt-4">
									<select id="id_type" placeholder="ID_Type" class="form-control"
									 style="height: 50px;" required disabled >
									  <option name="" value="" style="display:none;">Select ID Type</option>
									  <option name="National ID" value="1">National ID</option>
									  <option name="Passport" value="2">Passport</option>
									  <option name="Driver's License" value="3">Driver's License</option>
									</select>
								</div>
								<div class="form-group mt-4">
									<input type="text" pattern="[A-Za-z0-9\s-]+"
										title="Enter a valid ID Number" class="form-control" placeholder="ID Number"
										required="required" id="id_num" value="" name=""
										style="font-size: 16px; height: 50px;" style="width: 200px" readonly />
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<label style="font-size:12px;">ID Start date</label>
									<input type="date" title="Enter a valid start date" class="form-control"
										placeholder="Start Date" required="required" id="s_date" name=""
										style="font-size: 16px; height: 50px;"
										style="width: 200px; font-size: medium" readonly />
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label style="font-size:12px;">ID Expiry date</label>
									<input type="date" title="Enter a valid expiry date" class="form-control"
										placeholder="Expiry Date" required="required" id="e_date" name=""
										style="font-size: 16px; height: 50px;"
										style="width: 200px; font-size: medium" readonly />
								</div>
							</div>

							<div class="form-group mt-4 col-12 mb-5">
								<button type="submit" class="btn btn-primary btn-block" id="button1"
									style="background-color: green; border-color: green">
									Update Profile
								</button>
								<div class="text-center mt-3">
									<label style="font-size:14px;">Do you want to <a href="change_password.html">Change Password?</a></label>
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
</body>
</html>
