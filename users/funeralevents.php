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
		min-height: 100vh;
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

	.modal-backdrop{z-index: 1050;}
	.modal{z-index: 1060;}

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

	@media only screen and (max-width:992px) {
      #second-c {
        margin-top: 100px;
		margin-bottom: 100px;
      }
    }

	.footer {
		position:absolute;
		bottom: 0px !important;
		width: 100%;
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

	@media only screen and (min-height: 1040px) and (max-width: 992px) {
	  
      .footer {
		position:relative !important;
		bottom: 0px !important;
		width: 100%;
        top:0vh;
		background-color: #003bb3 !important;
      }
 
    }

	@media only screen and (min-height: 1040px) and (max-width: 576px) {
	  
	 
      .footer {
		position:relative !important;
		bottom: 0px !important;
		width: 100%;
        top:0vh;
		background-color: #003bb3 !important;
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
	  
	  body{
		min-height: 140vh;
	  }
      .footer {
		position:relative !important;
		bottom: 0px !important;
		width: 100%;
        top:0vh;
		background-color: #003bb3 !important;
      }

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


  <section class="bannerv7a">

     <!--Link to Previous Page -->
	 <a href="funerals.php" class="previous round mt-3 mx-3" style="text-decoration: none;display: inline-block;padding: 8px 13px;">
	        <img src="../images/arrow.png" height="15px" width="15px" class="d-flex justify inline-block align-text-top mt-1"/></a>

		<div class="container d-flex justify-content-center" id="second-c">
			<div class="card col-lg-12 mt-5" style="border: none;margin-bottom: 0;">
				<div class="card-body">
					<div style="display: flex;justify-content: center;align-items: center;">
						<h3 id="profile" class="card-title text-center"></h3>
					</div>

				
						<div class="form-row">
							<!-- AJAX POST Response-->
							<div id="message"></div>
							<!--User Header-->
							<div class="col-12">
								<div class="row" style="display: flex; align-items: center;justify-content: center;">
									<img src="../images/bwcLogoHome.png" style="width:100px;">
								</div>
								<div class="form-header mt-4" style="background-color: #003bb3; border-radius: 0.2rem">
									<h6 class="mt-2 text-center">
										All Funeral Events &nbsp; <i class="fa fa-calendar" style="color:white;" aria-hidden="true"></i>
									</h6>
								</div>
							</div>
							<!--User Details-->
							<div class="col-12 mt-3">
								<!--table start-->
								<div id="trans-table" class="table-responsive">

								<?php

									$conn = mysqli_connect('localhost','root','','koforiduabwc');



									$sql="SELECT * FROM `funerals`";

									$adminuser_id =  $_SESSION['user']['ID'];
									$adminuser_name =  $_SESSION['user']['Username'];

									$result = $conn->query($sql);
													

									if($result->num_rows != 0)
										{

											$output = '<table class="table table-hover table-bordered text-center">
												<thead>
													<tr>
													<th scope="col">Funeral Event </th>
													<th scope="col">Date</th>
													<th scope="col">Dec. Status</th>
													<th scope="col">Dec. Group</th>
													<th scope="col">Region</th>
													<th scope="col">Month</th>
													<th scope="col">Location</th>
													<th scope="col" style="width:15%">Action</th>
													</tr>
												</thead>
													';

											while($row=$result->fetch_assoc()){
												
												$fid = $row["funeral_id"];
												$fname = $row["funeral_name"];
												$fdate = $row["funeral_date"];
												$dstatus = $row["deceased_status"];
												$dgroup= $row["deceased_group"];
												$fregion = $row["funeral_region"];
												$fmonth = $row["funeral_month"];
												$flocation = $row["funeral_location"];
												

												$_SESSION['fid'] = $fid;

												$output .= '
													<tr>
													<td>'.$fname.'</td>
													<td>'.$fdate.'</td>
													<td>'.$dstatus.'</td>
													<td>'.$dgroup.'</td>
													<td>'.$fregion.'</td>
													<td>'.$fmonth.'</td>
													<td>'.$flocation.'</td>
													

													<td><a href="updateFuneralEvent.php?anykey='.$fid.'" style="color:green;">Update</a> ||
													<a href="deleteFuneralEvent.php?anykey='.$fid.'" style="color:red;">Delete</a></td>
													</tr>	
													';

											}

											$output .= '</table>';

											echo $output;

										}
										else if($result->num_rows == 0){

											echo '
											<div class="form-header mt-4" style="background-color: transparent; border-radius: 0.2rem;">
												<h6 class="mt-2 text-center" style="color:grey;">
													No Funeral Event Found. Click <a class="addFuneral"  href="#addFuneral" data-bs-toggle="modal">Here</a> to add Funeral Event
												</h6>
											</div>'
										;
										}


									?>
							</div>
							<!-- Table end -->

							
							<!--<div class="form-group mt-4 col-6 mb-5 text-center">
								<div class="col-3">
									<button type="button" class="btn btn-primary btn-block" id="button3"
										name="madd" onclick=" window.location.href='funerals.php'" style="background-color: green; border-color: green;float:left;">
										Back
									</button>
								</div>
								<div class="text-center mt-3">
									<label style="font-size:14px;">Back to <a href="dashboard.php">Dashboard Page</a></label>
								</div>
							</div>-->
						</div>
				
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
  <!--Country Code and Flag JS Plugin-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
	<script src="../build/js/intlTelInput.js"></script>
	<script src="../js/country_flag_code.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <!-- JS -->
  <script src="../js/scripts.js"></script>

<script>
												   
	//ajax call for Update Funeral Event
	$(document).ready(function(){
													
		$("#updateFuneralform").on("submit",function(e) {
	   
			$.ajax({
				type: "POST",
				url: "updateFuneralEvent.php",
				data: $("#updateFuneralform").serialize(),
				success: function(result){
	   
					$("#message").html(result)
				}
			})
	   
				e.preventDefault();
			});
	   
		})
</script>

<!--Redirection to funeralevents.php to activate add funeral modal when "Add Funeral" is clicked here-->
<script>
	$(".addFuneral").on("click", function () {
		window.location.href = "funerals.php#addFuneral";
	});
</script>

</body>
</html>
