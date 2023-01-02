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
        <?php 
        //include the controller
        require('../controllers/funeralcontroller.php');


        $id = (isset($_GET['anykey']) ? $_GET['anykey'] : '');
        $funeral = getFuneral($id);
    
    
        if($funeral){
            foreach ($funeral as $value) {
                
                $fname=$value['funeral_name'];
                $fdate=$value['funeral_date'];
                $dstatus=$value['deceased_status'];
                $dgroup= $value["deceased_group"];
                $fregion = $value["funeral_region"];
                $fmonth = $value["funeral_month"];
                $flocation = $value["funeral_location"];
                $fid = $value['funeral_id'];
                $_SESSION['id'] = $fid;										
            
            }
        }
        
        
        //check if submit button was clicked to add tutor profile
        if (isset($_POST['funeral_update'])) {
            //grab form data and stores them in variables
            $funeralname= $_POST['funeralname'];
            $dof= $_POST['dof'];
            $dgroup= $_POST['dgroup'];
            $fmember = $_POST['fmember'];
            $region = $_POST['region'];
            $month = $_POST['month'];
            $funeralloc = $_POST['funeralloc'];
            $udate = $_POST['udate'];
            $adminuser_name =  $_SESSION['user']['Username'];

          
            //calls function from funeralcontroller.php to update a course
            $ret =  updatefuneralctrl($funeralname , $dof, $dgroup ,$fmember, $region, $month, $funeralloc,$adminuser_name, $udate,$_SESSION['id']);
            //echo result
            if ($ret) {
                echo "
                    <script>
                        Swal.fire({
                        title: '<strong>Funeral Event Updated Successfully </strong>',
                        icon: 'success',
                        html: `<a href='funeralevents.php'>Click here</a> to view changes`
                        })
                    </script>";
                    
                
               
            }else{
                //echo danger, if the Funeral was not successfully created
                echo "
                    <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Funeral Event Update Failed',
                        text: 'Please check your entry again',
                        });
                    </script>";
            }
        }
        
        ?>
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
                            <div class='alert alert-success text-center mt-1' id='update_success' style='display:none;'>
                                Success
                            </div>
								<div class="form-header mt-4" style="background-color: #003bb3; border-radius: 0.2rem">
									<h6 class="mt-2 text-center">
										Update Funeral Event&nbsp; <i class="fa fa-building" style="color:white;size: 60px;" aria-hidden="true"></i>
									</h6>
								</div>
							</div>

							<div class="col-6">
								<div class="form-group">
									<input type="text" pattern="[0-9]+" title="Enter a valid member ID"
									class="form-control" placeholder="Enter the Funeral ID" required="required" id="fid"
									name="fid" value="<?php echo isset($fid)? $fid: ''; ?>" style="font-size: 16px;height: 50px;" style="width: 200px;" hidden>
								</div> 
							</div>

                            <div class="col-6">
                                <div class="form-group mt-3">
                                    <input type="date" title="Enter a valid date" class="form-control"
                                    placeholder="Date" required="required" id="udate" name="udate"
                                    style="font-size: 16px; height: 50px;"
                                    style="width: 200px; font-size: medium" readonly hidden/>	
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                <input type="text" pattern="[A-Za-z.0-9\s-]+" title="Enter a valid funeral name"
                                class="form-control" placeholder="Funeral Name eg. The Late Mr. XYZ Funeral" required="required"
                                value="<?php echo isset($fname)? $fname: ''; ?>" id="funeralname" name="funeralname"
                                style="font-size: 16px; height: 50px;" style="width: 200px" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <input type="date" class="form-control"
                                    placeholder="Date of Funeral Event" required="required" id="dof" name="dof"
                                    style="font-size: 16px; height: 50px;"
                                    value="<?php echo isset($fdate)? $fdate: ''; ?>"
                                    style="width: 200px; font-size: medium"/>
                                    <span class="instruction" style="font-size: 11px;color:#003bb3;">Date of Funeral</span>
                                </div>    
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                <select id="dgroup" name="dgroup" placeholder="" class="form-control"
                                    style="height: 50px;" required>
                                    <option name="" value="" style="display:none;">Choose Group Type</option>
                                    <option value="Adom" <?php if($dgroup=="Adom") echo 'selected="selected" ';?> >Adom Group</option>
                                    <option value="Second Chance" <?php if($dgroup=="Second Chance") echo 'selected="selected"';?> >Second Chance Group</option>
                                    <option value="Not Applicable" <?php if($dgroup=="Not Applicable") echo 'selected="selected"';?> >Not Applicable</option>
                                </select>
                                <span class="instruction" style="font-size: 11px;color:#003bb3;">Deceased Group Type</span>
                                </div>    
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select id="fmember" name="fmember" placeholder="Deceased Status" class="form-control"
                                        style="height: 50px;" required>
                                        <option name="" value="" style="display:none;">Deceased Status</option>
                                        <option value="Member" <?php if($dstatus=='Member')  echo'selected="selected"'; ?> >Member</option>
                                        <option value="Not a Member" <?php if($dstatus=='Not a Member') echo 'selected="selected"'; ?> >Not a Member</option>
                                    </select>
                                    <span class="instruction" style="font-size: 11px;color:#003bb3;">Deceased Status</span>
                                </div>    
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <select id="region" name="region" placeholder="Region" class="form-control" style="height: 50px;" required >
                                        <option name="" value="" style="display:none;">Region of Funeral</option>
                                        <option value="AHAFO" <?php if($fregion=='AHAFO') echo 'selected="selected"';?> >AHAFO</option>
                                        <option value="ASHANTI" <?php if($fregion=='ASHANTI') echo 'selected="selected"';?> >ASHANTI</option>
                                        <option value="BONO EAST" <?php if($fregion=='BONO EAST') echo 'selected="selected"';?> >BONO EAST</option>
                                        <option value="BRONG AHAFO" <?php  if($fregion=='BRONG AHAFO') echo 'selected="selected"'; ?> >BRONG AHAFO</option>
                                        <option value="CENTRAL" <?php if($fregion=='CENTRAL') echo 'selected="selected"'; ?> >CENTRAL</option>
                                        <option value="EASTERN" <?php  if($fregion=='EASTERN') echo 'selected="selected"';  ?>>EASTERN</option>
                                        <option value="GREATER ACCRA" <?php if($fregion=='GREATER ACCRA') echo 'selected="selected"'; ?> >GREATER ACCRA</option>
                                        <option value="NORTH EAST" <?php if($fregion=='NORTH EAST') echo 'selected="selected"'; ?> >NORTH EAST</option>
                                        <option value="NORTHERN" <?php if($fregion=='NORTHERN') echo 'selected="selected"'; ?> >NORTHERN</option>
                                        <option value="OTI" <?php if($fregion=='OTI') echo 'selected="selected"'; ?> >OTI</option>
                                        <option value="SAVANNAH" <?php if($fregion=='SAVANNAH') echo 'selected="selected"';  ?> >SAVANNAH</option>
                                        <option value="UPPER EAST" <?php if($fregion=='UPPER EAST') echo 'selected="selected"';  ?> >UPPER EAST</option>
                                        <option value="UPPER WEST" <?php  if($fregion=='UPPER WEST') echo 'selected="selected"'; ?> >UPPER WEST</option>
                                        <option value="WESTERN" <?php  if($fregion=='WESTERN') echo 'selected="selected"'; ?> >WESTERN</option>
                                        <option value="WESTERN NORTH" <?php if($fregion=='WESTERN NORTH') echo 'selected="selected"'; ?>  >WESTERN NORTH</option>
                                        <option value="VOLTA" <?php  if($fregion=='VOLTA') echo 'selected="selected"'; ?> >VOLTA</option>
                                    </select>
                                    <span class="instruction" style="font-size: 11px;color:#003bb3;">Region of Funeral</span>
                                </div>    
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <select id="month" name="month" placeholder="Month(MM)" class="form-control" style="height: 50px;" required >
                                        <option name="" value="" style="display:none;">Month of Funeral</option>
                                        <option value="January" <?php  if($fmonth=='January') echo 'selected="selected"'; ?> >January</option>
                                        <option value="Febuary" <?php if($fmonth=='Febuary') echo 'selected="selected"'; ?>  >Febuary</option>
                                        <option value="March" <?php  if($fmonth=='March') echo 'selected="selected"';  ?>>March</option>
                                        <option value="April" <?php if($fmonth=='April') echo 'selected="selected"'; ?> >April</option>
                                        <option value="May" <?php  if($fmonth=='May') echo 'selected="selected"';  ?> >May</option>
                                        <option value="June" <?php if($fmonth=='June') echo 'selected="selected"';  ?> >June</option>
                                        <option value="July" <?php if($fmonth=='July') echo 'selected="selected"'; ?> >July</option>
                                        <option value="August" <?php if($fmonth=='August') echo 'selected="selected"';  ?>>August</option>
                                        <option value="September" <?php if($fmonth=='September') echo 'selected="selected"'; ?> >September</option>
                                        <option value="October" <?php if($fmonth=='October') echo 'selected="selected"'; ?> >October</option>
                                        <option value="November" <?php if($fmonth=='November') echo 'selected="selected"';  ?>>November</option>
                                        <option value="December" <?php if($fmonth=='December') echo 'selected="selected"'; ?> >December</option>
                                    </select>
                                    <span class="instruction" style="font-size: 11px;color:#003bb3;">Month of Funeral</span>
                                </div> 
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" pattern="[A-Za-z.0-9\s-]+" title="Enter a valid funeral location"
                                    class="form-control" placeholder="Funeral Location" required="required"
                                    value="<?php echo isset($flocation)? $flocation: ''; ?>" id="funeralloc" name="funeralloc"
                                    style="font-size: 16px; height: 50px;" style="width: 200px" />
                                    <span class="instruction" style="font-size: 11px;color:#003bb3;">Funeral Location</span>
                                </div> 
                            </div>


							<div class="form-group mt-4 col-12 mb-5">
								<button type="submit" class="btn btn-primary btn-block" id="button1" name="funeral_update"
									style="background-color: green; border-color: green">
									Update Funeral Event
								</button>
								<div class="text-center mt-3">
									<label style="font-size:14px;"><a href="funeralevents.php">Back</a></label>
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
  <!--Country Code and Flag JS Plugin-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
	<script src="../build/js/intlTelInput.js"></script>
	<script src="../js/country_flag_code.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //sets the date to today and the future but not the past
    const dateInput = document.getElementById("udate");

    // ✅ Using UTC (universal coordinated time)
    dateInput.value = new Date().toISOString().split("T")[0];
                                    
    console.log(new Date().toISOString().split("T")[0]);
</script>

</body>
</html>
