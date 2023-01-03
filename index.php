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

	.bannerv7a{
	          
		background-repeat: no-repeat;
		background-image: url('images/homeProphet.jpg') ;
		background-position: top;
		background-size: cover;
		min-height: 100vh;

	}


	@media only screen and (max-width:992px) {
      #second-c {
        margin-top: 100px;
      }
    }

	@media only screen and (max-width:444px) {
		#logoimage {
        content: url('images/bwcLogoHome.png');
		width: 60px !important;

    }
    }

	@media only screen and (max-width:992px) {
      .header .primary-menu .login-button {
        margin-top: 75px;
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

	#show1 {
        position: absolute;
        top: 23%;
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
			<div class="card col-lg-5" style="border: none; opacity: 0.9; margin-bottom: 0; height: 550px;">
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
										Log In&nbsp; <i class="fa fa-user" style="color:white;size: 60px;" aria-hidden="true"></i>

									</h6>
								</div>
							</div>
							<!--Username and Password-->
							<div class="col-12">
								<div class="form-group mt-4">
									<input type="text" pattern="[A-Za-z\s-]+"
										title="Enter a valid username" class="form-control" placeholder="Username"
										required="required" id="uname" name="uname"
										style="font-size: 16px; height: 50px;" style="width: 200px" />
								</div>
                                <div class="form-group" id="old_password" style="position: relative">
                                    <input type="password" title="Enter a valid password"
                                        class="form-control" placeholder="Password" required="required"
                                        id="pass" name="pass" style="font-size: 16px; height: 50px;"
                                        style="width: 200px"/>
                                        <label id="show1" style="color: gray; font-size: 13px">Show</label>
                                </div>	
							</div>

							<div class="form-group mt-4 col-12 mb-5">
								<button type="submit" class="btn btn-primary btn-block" id="button2"
									name="login_btn" style="background-color: green; border-color: green">
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
		 $("#show1").on("click", function () {
			var passcode = document.getElementById("pass");
			if (passcode.type === "password") {
				passcode.type = "text";
				document.getElementById("show1").innerHTML = "Hide";
			} else {
				passcode.type = "password";
				document.getElementById("show1").innerHTML = "Show";
			}
		});
	</script>
</body>
</html>
