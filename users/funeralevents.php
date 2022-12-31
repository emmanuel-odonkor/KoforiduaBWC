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
	  z-index: -2 !important;
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

	.modal-backdrop{z-index: 1050;}
	.modal{z-index: 1060;}


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
													

									if($result=$conn->query($sql))
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
													

													<td><a data-toggle="modal" href="#updateFuneralModal-'.$fid.'" style="color:green;">Update</a> ||
													<a data-toggle="modal" href="#deleteFuneralModal-'.$fid.'" style="color:red;">Delete</a></td>
													</tr>	
													';

													echo '<!--Update Funeral Modal -->
													<!-- Modal -->
												   
												   <form id="updateFuneralform" action="/" method="POST" enctype="multipart/form-data">
													   <div class="modal fade" id="updateFuneralModal-'.$fid.'" data-backdrop="static" data-keyboard="false" tabindex="-1"
													   aria-labelledby="staticBackdropLabel" aria-hidden="true">
													   <div class="modal-dialog modal-dialog-scrollable">
														   <div class="modal-content">
														   <div class="modal-header">
															   <h5 class="modal-title" id="staticBackdropLabel">Update Funeral</h5>
															   <button type="button" id="close_b" class="close" data-dismiss="modal">&times;</button>
														   </div>
														   <div class="modal-body">
															   <div class="col-lg-12">
															   <div class="form-row">
																   <!--Form Details-->
																   <div class="col-12">
																	   <!--Start of dues section form-->
																	   <div class="form-row">
																		   <!--Form Details(User)-->
																		   <div class="col-12">
																			   <!-- Heading-->
																			   <div class="form-header" style="background-color: #003bb3; border-radius: 0.2rem">
																					   <h6 class="mt-2 text-center">
																						   Funeral Event Update&nbsp; <i class="fa fa-building" style="color:white;" aria-hidden="true"></i>
																					   </h6>
																			   </div>
																		   </div>

																		   <div class="col-6">
																				<div class="form-group">
																					<input type="text" pattern="[0-9]+" title="Enter a valid member ID"
																						class="form-control" placeholder="Enter the Funeral ID" required="required" id="fid"
																						name="fid" value="'.$fid.'" style="font-size: 16px;height: 50px;" style="width: 200px;" hidden>
																				</div> 
																			</div>
																		
																		   <div class="col-12">
																			   <div class="form-group">
																			   <input type="text" pattern="[A-Za-z.0-9\s-]+" title="Enter a valid funeral name"
																			   class="form-control" placeholder="Funeral Name eg. The Late Mr. XYZ Funeral" required="required"
																			   value="'.$fname.'" id="funeralname" name="funeralname"
																			   style="font-size: 16px; height: 50px;" style="width: 200px" />
																			   </div>
																		   </div>

																		   <div class="col-6">
																			   <div class="form-group">
																				   <input type="date" class="form-control"
																				   placeholder="Date of Funeral Event" required="required" id="dof" name="dof"
																				   style="font-size: 16px; height: 50px;"
																				   value="'.$fdate.'"
																				   style="width: 200px; font-size: medium"/>
																				   <span class="instruction" style="font-size: 11px;color:#003bb3;">Date of Funeral</span>
																			   </div>    
																		   </div>

																		   <div class="col-6">
																				<div class="form-group">
																				<select id="dgroup" name="dgroup" placeholder="" class="form-control"
																					style="height: 50px;" required>
																					<option name="" value="" style="display:none;">Choose Group Type</option>
																					<option value="Adom" '; if($dgroup=="Adom") echo 'selected="selected"'; echo '>Adom Group</option>
                                                                					<option value="Second Chance" '; if($dgroup=="Second Chance") echo 'selected="selected"'; echo '>Second Chance Group</option>
																					<option value="Not Applicable" '; if($dgroup=="Not Applicable") echo 'selected="selected"'; echo '>Not Applicable</option>
																				</select>
																				<span class="instruction" style="font-size: 11px;color:#003bb3;">Deceased Group Type</span>
																				</div>    
																			</div>
																			<div class="col-6">
																				<div class="form-group">
																					<select id="fmember" name="fmember" placeholder="Deceased Status" class="form-control"
																						style="height: 50px;" required>
																						<option name="" value="" style="display:none;">Deceased Status</option>
																						<option value="Member" '; if($dstatus=='Member')  echo'selected="selected"'; echo '>Member</option>
																						<option value="Not a Member" '; if($dstatus=='Not a Member') echo 'selected="selected"'; echo '>Not a Member</option>
																					</select>
																					<span class="instruction" style="font-size: 11px;color:#003bb3;">Deceased Status</span>
																				</div>    
																			</div>
																		   
																		   <div class="col-6">
																			   <div class="form-group">
																				   <select id="region" name="region" placeholder="Region" class="form-control" style="height: 50px;" required >
																					   <option name="" value="" style="display:none;">Region of Funeral</option>
																					   <option value="AHAFO" '; if($fregion=='AHAFO') echo 'selected="selected"'; echo '>AHAFO</option>
																					   <option value="ASHANTI" '; if($fregion=='ASHANTI') echo 'selected="selected"'; echo '>ASHANTI</option>
																					   <option value="BONO EAST" '; if($fregion=='BONO EAST') echo 'selected="selected"'; echo '>BONO EAST</option>
																					   <option value="BRONG AHAFO" '; if($fregion=='BRONG AHAFO') echo 'selected="selected"'; echo '>BRONG AHAFO</option>
																					   <option value="CENTRAL" '; if($fregion=='CENTRAL') echo 'selected="selected"'; echo '>CENTRAL</option>
																					   <option value="EASTERN" '; if($fregion=='EASTERN') echo 'selected="selected"'; echo '>EASTERN</option>
																					   <option value="GREATER ACCRA" '; if($fregion=='GREATER ACCRA') echo 'selected="selected"'; echo '>GREATER ACCRA</option>
																					   <option value="NORTH EAST" '; if($fregion=='NORTH EAST') echo 'selected="selected"'; echo '>NORTH EAST</option>
																					   <option value="NORTHERN" '; if($fregion=='NORTHERN') echo 'selected="selected"'; echo '>NORTHERN</option>
																					   <option value="OTI" '; if($fregion=='OTI') echo 'selected="selected"'; echo '>OTI</option>
																					   <option value="SAVANNAH" '; if($fregion=='SAVANNAH') echo 'selected="selected"'; echo '>SAVANNAH</option>
																					   <option value="UPPER EAST" '; if($fregion=='UPPER EAST') echo 'selected="selected"'; echo '>UPPER EAST</option>
																					   <option value="UPPER WEST" '; if($fregion=='UPPER WEST') echo 'selected="selected"'; echo '>UPPER WEST</option>
																					   <option value="WESTERN" '; if($fregion=='WESTERN') echo 'selected="selected"'; echo '>WESTERN</option>
																					   <option value="WESTERN NORTH" '; if($fregion=='WESTERN NORTH') echo 'selected="selected"'; echo '>WESTERN NORTH</option>
																					   <option value="VOLTA" '; if($fregion=='VOLTA') echo 'selected="selected"'; echo '>VOLTA</option>
																				   </select>
																				   <span class="instruction" style="font-size: 11px;color:#003bb3;">Region of Funeral</span>
																			   </div>    
																		   </div>
										   
																		   <div class="col-6">
																				   <div class="form-group">
																					   <select id="month" name="month" placeholder="Month(MM)" class="form-control" style="height: 50px;" required >
																						   <option name="" value="" style="display:none;">Month of Funeral</option>
																						   <option value="January" '; if($fmonth=='January') echo 'selected="selected"'; echo '>January</option>
																						   <option value="Febuary" '; if($fmonth=='Febuary') echo 'selected="selected"'; echo '>Febuary</option>
																						   <option value="March" '; if($fmonth=='March') echo 'selected="selected"'; echo '>March</option>
																						   <option value="April" '; if($fmonth=='April') echo 'selected="selected"'; echo '>April</option>
																						   <option value="May" '; if($fmonth=='May') echo 'selected="selected"'; echo '>May</option>
																						   <option value="June" '; if($fmonth=='June') echo 'selected="selected"'; echo '>June</option>
																						   <option value="July" '; if($fmonth=='July') echo 'selected="selected"'; echo '>July</option>
																						   <option value="August" '; if($fmonth=='August') echo 'selected="selected"'; echo '>August</option>
																						   <option value="September" '; if($fmonth=='September') echo 'selected="selected"'; echo '>September</option>
																						   <option value="October" '; if($fmonth=='October') echo 'selected="selected"'; echo '>October</option>
																						   <option value="November" '; if($fmonth=='November') echo 'selected="selected"'; echo '>November</option>
																						   <option value="December" '; if($fmonth=='December') echo 'selected="selected"'; echo '>December</option>
																					   </select>
																					   <span class="instruction" style="font-size: 11px;color:#003bb3;">Month of Funeral</span>
																				   </div> 
																		   </div>
																		
																		   <div class="col-6">
																			   <div class="form-group">
																				   <input type="text" pattern="[A-Za-z.0-9\s-]+" title="Enter a valid funeral location"
																				   class="form-control" placeholder="Funeral Location" required="required"
																				   value="'.$flocation.'" id="funeralloc" name="funeralloc"
																				   style="font-size: 16px; height: 50px;" style="width: 200px" />
																				   <span class="instruction" style="font-size: 11px;color:#003bb3;">Funeral Location</span>
																			   </div> 
																		   </div>

																	   </div>
																   </div>
																   <div class="col-12">
																	   <!--Submit-->
																	   <div class="col-6" style="float:right;">
																		   <button type="submit" class="btn btn-primary btn-block" id="upd"
																			   name="upd" style="background-color: green;border-color: green;">Update Event</button>
																	   </div>
																   </div>
															   </div>
															   </div>  
														   </div>
													   </div>
													   </div>
													   </div>
												   </form>

												   <script>
												   
													//ajax call for Update Funeral Event
													$(document).ready(function(){
														console.log("emma")

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
												   
												   <!--End of Update Funeral Modal -->';

											}

											$output .= '</table>';

											echo $output;

										}


									?>
							</div>
							<!-- Table end -->

							
							<div class="form-group mt-4 col-6 mb-5 text-center">
								<div class="col-3">
									<button type="button" class="btn btn-primary btn-block" id="button3"
										name="madd" onclick=" window.location.href='funerals.php'" style="background-color: green; border-color: green;float:left;">
										Back
									</button>
								</div>
								<!--<div class="text-center mt-3">
									<label style="font-size:14px;">Back to <a href="dashboard.php">Dashboard Page</a></label>
								</div>-->
							</div>
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

</body>
</html>
