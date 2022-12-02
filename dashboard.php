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
    .footer {
	bottom: 0;
	width: 100%;
}

    .footer .foo-top {
        padding: 100px 0 90px;
    }

    .footer .widget h5 {
        color: #fff;
        font-size: 20px;
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 25px;
    }

    .footer .widget h5:before {
        content: "";
        position: absolute;
        top: auto;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #fff;
        height: 2px;
        width: 30px;
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

		<div class="container d-flex justify-content-center">
			<div class="row d-flex justify-content-center" style="position: absolute; top: 50%; transform: translate(0, -50%)">
				<div class="col-lg-4 g-4 col-sm-10 card1">
					<a href="" style="color: inherit; text-decoration: none">
						<div class="card-effect">
							<div class="iconbox">
								<img src="images/maz4.png" class="gen_image" height="28px" alt="" />
							</div>
							<h5 class="mt-4 mb-2" style="font-size: 17px">General Ads</h5>
							<p style="font-size: 14px">
								Come up with Generalized Ad copies using AI.
							</p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 g-4 col-sm-10 card2">
					<a href="{{url_for('socialmedia')}}" style="color: inherit; text-decoration: none">
						<div class="card-effect" style="padding: 25px">
							<div class="iconbox">
								<img src="images/maz4.png" height="25px" class="link_image"
									alt="" />
								<img src="images/maz4.png" height="25px" class="insta_image"
									alt="" />
								<img src="images/maz4.png" height="25px" class="fboo_image"
									alt="" />
								<img src="images/maz4.png" height="25px" class="twit_image"
									alt="" />
							</div>

							<h5 class="mt-4 mb-2" style="font-size: 17px">Social Media Ads</h5>
							<p class="pb-5" style="font-size: 14px">
								Generate catchy Social Media Ads using AI.
							</p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 g-4 col-sm-10 card3">
					<a href="{{url_for('captions')}}" style="color: inherit; text-decoration: none">
						<div class="card-effect">
							<div class="iconbox">
								<img src="images/maz4.png" height="28px" class="cap_image" alt="" />
							</div>
							<h5 class="mt-4 mb-2" style="font-size: 17px">Captions</h5>
							<p style="font-size: 14px">
								Create striking captions for social media posts.
							</p>
						</div>
					</a>
				</div>
			</div>
</div>
	
<!-- Footer start -->
<footer class="footer" style="position: absolute; background-color: #003bb3">
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
