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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

  <!-- All CSS -->
  <!-- fontAwesome -->
  <link rel="stylesheet" href="../css/all.min.css" />
  <link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.min.css" />

  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/owl.carousel.min.css" />
  <link rel="stylesheet" href="../css/jquery.fancybox.min.css" />
  <link rel="stylesheet" href="../css/nice-select.css" />
  <link rel="stylesheet" href="../css/style.css" />


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

	body{
		overflow-x:hidden;
	}

    .footer {
		position:absolute;
		bottom: 0px !important;
		width: 100%;
	}


	@media only screen and (max-width:497px) {
		#logoimage {
        content: url('../images/bwcLogoHome.png');
		width: 60px !important;

    }
    }

	@media only screen and (max-width:404px) {
		#welcome {
        font-size:small;
    }
    }

	#user_mobile{
		display:none;
	}
	#logout_mobile{
		display:none;
	}

	@media only screen and (max-width:991px) {
		#user_mobile {
        display:block;
    }
		#logout_mobile {
			display:block;
    }
		#user_web{
		display:none;
	}

    }

	@media only screen and (max-width:346px) {
		#welcome {
        display: none;
    }
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

	@media only screen and (max-width:992px) {
      #dashboard {
        margin-top: 100px !important;
		margin-bottom: 900px !important;
      }

	  body{
		min-height: 70vh;
	  }
      .footer {
		position:relative !important;
		bottom: 0px !important;
		width: 100%;
        top:70vh;
		background-color: #003bb3 !important;
      }
    }

	@media only screen and (max-width:576px) {
      #dashboard {
        margin-top: 320px !important;
      }
	  
	  body{
		min-height: 130vh;
		overflow-x: hidden !important;
	  }
      .footer {
		position:relative !important;
		bottom: 0px !important;
		width: 100%;
        top:135vh;
		background-color: #003bb3 !important;
      }
    }

	@media only screen and (max-height: 667px) and (max-width: 992px) {
      #dashboard {
        margin-top: 150px !important;
      }
	  
	  body{
		min-height: 80vh;
	  }
      .footer {
		position:relative !important;
		bottom: 0px !important;
		width: 100%;
        top:95vh;
		background-color: #003bb3 !important;
      }
 
    }

	@media only screen and (max-height: 667px) and (max-width: 576px) {

	  #dashboard {
        margin-top: 370px !important;
      }
	  
	  body{
		min-height: 140vh;
	  }
      .footer {
		position:relative !important;
		bottom: 0px !important;
		width: 100%;
        top:150vh;
		background-color: #003bb3 !important;
      }

    }

	@media only screen and (min-height: 1040px) and (max-width: 992px) {
	  
      .footer {
		position:relative !important;
		bottom: 0px !important;
		width: 100%;
        top:90vh;
		background-color: #003bb3 !important;
      }
 
    }

	@media only screen and (min-height: 1040px) and (max-width: 576px) {
	  
	 
      .footer {
		position:relative !important;
		bottom: 0px !important;
		width: 100%;
        top:120vh;
		background-color: #003bb3 !important;
      }
 
    }



	@media only screen and (max-width:718px) {
      #topic{
        line-height: 20px;
		font-size: 13px;
      }
    }

	.dropdown-toggle{
		color:white;
	}

	.home-one
	{

		background-image: linear-gradient(rgba(0, 0, 0, 0.5),
            rgba(0, 0, 0, 0.5)), url("../images/sign2.jpg");
        background-size: cover;
		background-attachment: fixed;
		background-size:cover;            
		background-repeat: no-repeat;
		background-position: top;
	}


  </style>
	</head>
	<body class="home-one">
	<!-- Header start -->
	<header class="header" style="background-color: #003bb3">
		<div class="container d-flex align-items-center">
		<a class="" href="dashboard.php">
			<img src="../images/bwcLogo.png" id="logoimage" style="width: 150px;" alt="" />
		</a>
		<span id="welcome" style="color:white;">Welcome <strong><?php echo $_SESSION['user']['Username']; ?></strong> to the Dashboard</span>
		<nav class="primary-menu">
			<a id="mobile-menu-toggler" href="#"><i class="fa fa-bars" aria-hidden="true" style='color:white;'></i></a>
			<ul>
			<li><a href="https://www.bwcghana.org/" style="font-size: 16px;">Believers Worship Center Website</a></li>

			<li id="user_mobile" style="color:white;padding-left:27px;">
				Logged In as:
					<div>
						<?php if(isset($_SESSION['user'])) : ?>
						<strong><?php echo $_SESSION['user']['Username']; ?></strong>
						<small>
							<i style="color:#888;">(<?php echo ucfirst($_SESSION['user']['usertype']); ?>)</i>
						</small>
						<?php endif ?>

					</div>
			</li>
			<li id="logout_mobile">
				<?php if(isset($_SESSION['user'])) : ?>
					<a class="dropdown-item" href="dashboard.php?logout='1'" style="color: white;padding-left:28px !important;">Log Out</a>
				<?php endif ?>
			</li>

			<li id="user_web">
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
 
		<div class="col-12 logo-heading" style="margin-top: 130px;">
				<div class="row text-center" style="display: flex; align-items: center;justify-content: center;">
					<img src="../images/bwcLogoHome.png" style="width:120px;">
					<h6 style="color:white;" id="topic">Koforidua Philadelphia Movement -- Membership Dues and Funeral Contribution Database</h6>
				</div>
		</div>

		<div class="container d-flex justify-content-center">
			<div class="row d-flex justify-content-center mt-lg-5" id="dashboard" style="position: absolute; top: 50%; transform: translate(0, -50%)">
				<div class="col-lg-3 g-3 col-sm-6 card1">
					<a href="addMember.php" style="color: inherit; text-decoration: none">
						<div class="card-effect">
							<div class="iconbox">
								<i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
							</div>
							<h5 class="mt-4 mb-2" style="font-size: 17px">Add New Member</h5>
							<p style="font-size: 14px">
								Setup a complete new profile
							</p>
						</div>
					</a>
				</div>

				<div class="col-lg-3 g-3 col-sm-6 card2">
					<a href="viewMe.php" style="color: inherit; text-decoration: none">
						<div class="card-effect" style="padding: 25px">
							<div class="iconbox">
								<i class="fa fa-address-card fa-2x" aria-hidden="true"></i>
							</div>

							<h5 class="mt-4 mb-2" style="font-size: 17px">View Member Details</h5>
							<p class="pb-5" style="font-size: 14px">
								Bullseye view of member records.
							</p>
						</div>
					</a>
				</div>
				<div class="col-lg-3 g-3 col-sm-6 card3">
					<a href="updateMemberDetails.php" style="color: inherit; text-decoration: none">
						<div class="card-effect">
							<div class="iconbox">
								<i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i>
							</div>
							<h5 class="mt-4 mb-2" style="font-size: 17px">Update Member Record</h5>
							<p style="font-size: 14px">
								Update member records in database.
							</p>
						</div>
					</a>
				</div>

				<div class="col-lg-3 g-3 col-sm-6 card3">
					<a href="funerals.php" style="color: inherit; text-decoration: none">
						<div class="card-effect">
							<div class="iconbox">
								<i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
							</div>
							<h5 class="mt-4 mb-2" style="font-size: 17px">Funeral Events</h5>
							<p style="font-size: 14px">
								Keep record of all Funeral events.
							</p>
						</div>
					</a>
				</div>
			</div>
</div>
	
<!-- Footer start -->
<footer class="footer" style="background-color:#003bb3 !important;
      border-color: #003bb3 !important;">
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
	<!-- JS -->
<script src="../js/scripts.js"></script>

</body>
</html>
