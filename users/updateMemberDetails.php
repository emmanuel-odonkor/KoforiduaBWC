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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">


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

	.dropdown-toggle{
		color:white;
	}

	.home-one
	{

		background-image: linear-gradient(rgba(0, 0, 0, 0.8),
            rgba(0, 0, 0, 0.8)), url("../images/5.jpg");
        background-size: cover;
		background-attachment: fixed;
		background-size:cover;            
		background-repeat: no-repeat;
		background-position: top;
	}

    .card1
    {
        width: 300px;
    }

    .container2
    {
        margin-top: 270px;
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
 
		<div class="col-12 logo-heading" style="margin-top: 130px;">
				<div class="row text-center" style="display: flex; align-items: center;justify-content: center;">
					<img src="../images/bwcLogoHome.png" style="width:120px;">
					<h6 style="color:white;">Koforidua Philadelphia Movement -- Update of Member Dues,Funeral Contributions and Member Registry Information</h6>
				</div>
		</div>
        <!-- Projection of output from AJAX -->
       <div id="message"></div>

       <!-- Projection of Update output from AJAX -->
       <div id="response"></div>
        <!-- Modal -->
        <form id="duesform" action="/" method="POST" enctype="multipart/form-data">
            <!--Dues Payment Modal-->
            <div class="modal fade" id="duesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Dues Payment Section</h5>
                    <button type="button" id="close_b" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                    <div class="form-row">
                        <!--Form Details-->
                        <div class="col-12">
                            <!--Start of dues section form-->
                            <div class="form-row mt-3">
                                <!--Form Details(User)-->
                                <div class="col-12">
                                    <!-- Heading-->
                                    <div class="form-header" style="background-color: #003bb3; border-radius: 0.2rem">
                                            <h6 class="mt-2 text-center">
                                                Payment Details&nbsp; <i class="fa fa-money" style="color:white;" aria-hidden="true"></i>
                                            </h6>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group mt-4">
                                        <input type="text" pattern="[0-9]+" title="Enter a valid member ID"
                                        class="form-control" placeholder="Enter the Member ID" required="required" id="mid"
                                        name="mid" style="font-size: 16px;height: 50px;" style="width: 200px;">
                                        <span class="instruction" style="font-size: 11px;color:#003bb3;padding-bottom: 0px;">Member ID must be valid</span>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group mt-4">
                                        <span style="position: absolute; margin-left: 11px; margin-top: 11px; color:black">GHC</span>
                                        <input type="text" pattern="[0-9]+" title="Enter a valid amount" class="form-control"
                                        placeholder="Amount to be Paid" id="amount" name="amount" style="font-size: 16px;height: 50px;text-indent: 37px;" 
                                        style="width: 200px;" readonly>
                                    </div>    
                                </div>
                                <div class="col-12">
                                    <div class="form-group member">
                                        <select id="grouptype" name="mgroup" placeholder="Gender" class="form-control"
                                        style="height: 50px;" required>
                                        <option name="" value="" style="display:none;">Choose Group Type (Adom or Second Chance)</option>
                                        <option name="Adom" value="Adom">Adom Group</option>
                                        <option name="Second Chance" value="Second Chance">Second Chance Group</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-4" style="position: relative">
                                        <span style="position: absolute; margin-left: 11px; margin-top: 11px; color:black">Year of Dues Payment:</span>
                                            <input type="text" class="form-control" name="year" id="year" placeholder="(YYYY)"
                                             style="font-size: 16px; height: 50px;text-indent: 180px;" readonly/>
                                                <label style="position: absolute;top: 23%;right: 4%;"><i class="fa fa-calendar"></i></label>
                                            
                                    </div>

                                    <!--<div class="form-group mt-4">
                                    <span style="position: absolute; margin-left: 11px; margin-top: 11px; color:black">Year of Dues Payment:</span>
                                        <div class="input-group date" id="picker" data-date-container='#duesModal'>
                                            <input type="text" class="form-control" id="year" placeholder="Year of Dues Payment"
                                             style="font-size: 16px; height: 50px;text-indent: 50px;" readonly/>
                                            <span class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>-->
                                </div>
                                    <!--<div class="form-group mt-1" id="dropdown"></div>--> 
                                <div class="col-6">
                                    <div class="form-group mt-1">
                                        <input type="text" title="Enter a valid date of payment" class="form-control"
                                        placeholder="Date of Payment" required="required" id="dop" name="dop"
                                        style="font-size: 16px; height: 50px;"
                                        style="width: 200px; font-size: medium" onfocus="(this.type='date')"/>
                                    </div>  
                                </div>

                                <div class="col-6">
                                        <div class="form-group mt-1">
                                            <select id="month" name="month" placeholder="Month(MM)" class="form-control" style="height: 50px;" required >
                                                <option name="" value="" style="display:none;">Month of Payment</option>
                                                <option name="January" value="January">January</option>
                                                <option name="February" value="February">February</option>
                                                <option name="March" value="March">March</option>
                                                <option name="April" value="April">April</option>
                                                <option name="May" value="May">May</option>
                                                <option name="June" value="June">June</option>
                                                <option name="July" value="July">July</option>
                                                <option name="August" value="August">August</option>
                                                <option name="September" value="September">September</option>
                                                <option name="October" value="October">October</option>
                                                <option name="November" value="November">November</option>
                                                <option name="December" value="December">December</option>
                                            </select>
                                        </div> 
                                </div>

                        </div>
                        </div>
                        <!--Reset-->
                        <div class="col-6 mt-3">
                            <button type="button" id="ureset" name="ureset" class="btn btn-outline"
                                style="border-color: green;color:green;">Reset</button>
                        </div>
                        <!--Submit-->
                        <div class="col-6 mt-3">
                            <button type="submit" class="btn btn-primary btn-block" id="submitDues"
                                name="uadd" style="background-color: green;border-color: green;">Pay Dues</button>
                        </div>
                    </div>
                    </div>  
                </div>
            </div>
            </div>
            </div>
            <!--End of Due Payment Modal-->
        </form>

		<div class="container d-flex justify-content-center">
			<div class="row d-flex justify-content-center mt-5" style="position: absolute; top: 50%; transform: translate(0, -50%)">
				<div class="col-lg-4 g-4 col-sm-10 card1">
					<a data-bs-toggle="modal" href="#duesModal" style="color: inherit; text-decoration: none">
						<div class="card-effect">
							<div class="iconbox">
								<i class="fa fa-money fa-2x" aria-hidden="true"></i>
							</div>
							<h5 class="mt-4 mb-2" style="font-size: 17px">Dues Payments Form</h5>
							<p style="font-size: 14px">
								Montly payment of Dues
							</p>
						</div>
					</a>
                    
				</div>

				<div class="col-lg-4 g-4 col-sm-10 card2">
					<a data-bs-toggle="modal" href="#funeralModal" style="color: inherit; text-decoration: none">
						<div class="card-effect" style="padding: 25px">
							<div class="iconbox">
								<i class="fa fa-users fa-2x" aria-hidden="true"></i>
							</div>
							<h5 class="mt-4 mb-2" style="font-size: 17px">Funeral Contributions</h5>
							<p class="pb-5" style="font-size: 14px">
								Member Contributions
							</p>
						</div>
					</a>
				</div>

                <div class="col-lg-4 g-4 col-sm-10 card2">
					<a data-bs-toggle="modal" href="#idModal" style="color: inherit; text-decoration: none">
						<div class="card-effect" style="padding: 25px">
							<div class="iconbox">
								<i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
							</div>
							<h5 class="mt-4 mb-2" style="font-size: 17px">Update Member Info</h5>
							<p class="pb-5" style="font-size: 14px">
								Modify member personal data
							</p>
						</div>
					</a>
				</div>

			</div>  
        </div>

         <!-- Funeral Contribution Modal -->
         <form id="funeralform" action="/" method="POST" enctype="multipart/form-data">
            <!--Funeral Modal-->
            <div class="modal fade" id="funeralModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Funeral Contribution Section</h5>
                    <button type="button" id="fclose_b" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                    <div class="form-row">
                        <!--Form Details-->
                        <div class="col-12">
                            <!--Start of dues section form-->
                            <div class="form-row mt-3">

                            <div class="col-12">
                                <div class="form-header" style="background-color: #003bb3; border-radius: 0.2rem">
                                    <h6 class="mt-2 text-center">
                                    Funeral Contribution Details&nbsp; <i class="fa fa-users" style="color:white;" aria-hidden="true"></i>
                                    </h6>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <input type="text" pattern="[0-9]+" title="Enter a valid member ID"
                                        class="form-control" placeholder="Enter the Member ID" required="required" id="fid"
                                        name="fid" style="font-size: 16px;height: 50px;" style="width: 200px;">
                                        <span class="instruction" style="font-size: 11px;color:#003bb3;">Member ID must be valid</span>
                                </div> 
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <span style="position: absolute; margin-left: 11px; margin-top: 11px; color:black">GHC</span>
                                    <input type="text" pattern="[0-9]+" title="Enter a valid amount" class="form-control"
                                    placeholder="Amount to be Paid" id="famount" name="famount" style="font-size: 16px;height: 50px;text-indent: 37px;" 
                                    style="width: 200px;" readonly>
                                </div>    
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select id="fgrouptype" name="fgroup" placeholder="Group Type" class="form-control"
                                        style="height: 50px;" required>
                                        <option name="" value="" style="display:none;">Choose Group Type</option>
                                        <option name="Adom" value="Adom">Adom Group</option>
                                        <option name="Second Chance" value="Second Chance">Second Chance Group</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select id="dmember" name="dmember" placeholder="Deceased Group" class="form-control"
                                        style="height: 50px;" required>
                                        <option name="" value="" style="display:none;">Deceased Status</option>
                                        <option name="Member" value="Member">Member</option>
                                        <option name="Not a Member" value="Not a Member">Not a Member</option>
                                    </select>
                                </div>    
                            </div>
                                <!--Form Details(User)-->
                                <div class="col-12">
                                    <!--<div class="form-group mt-1" id="dropdown"></div>-->
                                    <?php
                                        //open the connection
                                        $conn = mysqli_connect('localhost','root','','koforiduabwc');

                                        $sql="SELECT funeral_name,deceased_status,funeral_date FROM `funerals`";

                                        $result = $conn->query($sql);

                                        echo '<div class="form-group">
                                            <select id="funeralname" name="funeralname" placeholder="Funeral Name" class="form-control"
                                            style="height: 50px;" required onclick="getAmount()">
                                            <option name="" value="" style="display:none;">Choose Funeral Description</option>';
                                            foreach ($conn->query($sql) as $row){
                                            echo "
                                            <option value='$row[funeral_name]'>$row[funeral_name] ($row[funeral_date],$row[deceased_status])</option>";
                                            }
                                            if(($result->num_rows == 0))
                                                {
                                                    echo "

                                                    <option name='' value=''>No Funeral Event has been entered</option>';
                                                    
                                                    ";        
                                                        
                                                }
                                            

                                        echo '</select>
                                        </div>
                                        ';
                                        ?>
                                    
                                    <!--<div class="form-group">
                                        <input type="text" pattern="[A-Za-z.0-9\s-]+" title="Enter a valid funeral name"
                                            class="form-control" placeholder="Funeral Name eg. The Late Mr. XYZ Funeral" required="required"
                                            value="" id="funeralname" name="funeralname"
                                            style="font-size: 16px; height: 50px;" style="width: 200px" />
                                    </div>-->  
                                </div>
                            <div class="col-6">
                                <div class="form-group mt-1">
                                    <input type="text" title="Enter a valid date of contribution" class="form-control"
                                    placeholder="Date of Payment" required="required" id="fdoc" name="fdoc"
                                    style="font-size: 16px; height: 50px;"
                                    style="width: 200px; font-size: medium" onfocus="(this.type='date')"/>
                                </div>  
							</div>

							<div class="col-6">
                                    <div class="form-group mt-1">
                                        <select id="fmonth" name="fmonth" placeholder="Month(MM)" class="form-control" style="height: 50px;" required >
                                            <option name="" value="" style="display:none;">Month of Payment</option>
                                            <option name="January" value="January">January</option>
                                            <option name="February" value="February">February</option>
                                            <option name="March" value="March">March</option>
                                            <option name="April" value="April">April</option>
                                            <option name="May" value="May">May</option>
                                            <option name="June" value="June">June</option>
                                            <option name="July" value="July">July</option>
                                            <option name="August" value="August">August</option>
                                            <option name="September" value="September">September</option>
                                            <option name="October" value="October">October</option>
                                            <option name="November" value="November">November</option>
                                            <option name="December" value="December">December</option>
                                        </select>
                                    </div> 
							</div>
                        </div>
                        </div>
                        <!--Reset-->
                        <div class="col-6 mt-3">
                            <button type="button" id="freset" name="freset" class="btn btn-outline"
                                style="border-color: green;color:green;">Reset</button>
                        </div>
                        <!--Submit-->
                        <div class="col-6 mt-3">
                            <button type="submit" class="btn btn-primary btn-block" id="submitContribution"
                                name="fadd" style="background-color: green;border-color: green;">Pay Contribution</button>
                        </div>
                    </div>
                    </div>  
                </div>
            </div>
            </div>
            </div>
            
            
            <!--End of Funeral Modal-->
        </form>

        <!-- Short modal to receive member id-->
        <form id="idForm" action="/" method="POST" enctype="multipart/form-data">
            <!--Funeral Modal-->
            <div class="modal fade" id="idModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Retrieve Member ID Section</h5>
                    <button type="button" id="fclose_b" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                    <div class="form-row">
                        <!--Form Details-->
                        <div class="col-12">
                            <!--Start of dues section form-->
                            <div class="form-row mt-3">

                            <div class="col-12">
                                <div class="form-header" style="background-color: #003bb3; border-radius: 0.2rem">
                                    <h6 class="mt-2 text-center">
                                    Member ID&nbsp; <i class="fa fa-user" style="color:white;" aria-hidden="true"></i>
                                    </h6>
                                </div>
                                <div class='alert alert-danger text-center mt-1' id='merror' style='display:none;'>
									Enter a Valid Member ID
								</div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mt-4">
                                    <input type="text" pattern="[0-9]+" title="Enter a valid member ID"
                                        class="form-control" placeholder="Enter the Member ID" required="required" id="mid"
                                        name="mid" style="font-size: 16px;height: 50px;" style="width: 200px;">
                                        <span class="instruction" style="font-size: 11px;color:#003bb3;">Member ID must be valid</span>
                                </div> 
                            </div>
                        </div>
                        </div>
                      
                        <div class="col-12">
                             <!--Submit-->
                            <div class="col-6 mt-3" style="float:right;">
                                <button type="submit" class="btn btn-primary btn-block" id="submit"
                                    name="sadd" style="background-color: green;border-color: green;">Send</button>
                            </div>
                        </div>
                    </div>
                    </div>  
                </div>
            </div>
            </div>
            </div>
            
        </form>

        <!-- End of Short modal to receive member id -->
        
       	

        <div class="container2">
            <div class="text-center">
                <label style="font-size:14px;"><span style="color:white;">Back to</span> <a href="dashboard.php">Dashboard Page</a></label>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


    <script>
        //Insertion of Amount per Group chosen in Dues payment
        $("#grouptype").on("change", function () {
            var e = document.getElementById("grouptype");
            var value = e.options[e.selectedIndex].value;

            if(value == "Adom")
            {
                document.getElementById("amount").value = "10.00"
            }
            else if(value == "Second Chance")
            {
                document.getElementById("amount").value = "20.00"
            }
            //console.log(value)
         });
                
    </script>

    <script>
        //ajax call for Dues Payment
        $(document).ready(function(){

            $("#duesform").on('submit',function(e) {

               // console.log('emma')

                $.ajax({
                    type: "POST",
                    url: "process.php",
                    data: $('#duesform').serialize(),
                    success: function(result){

                        $("#message").html(result)
                    }
                })

                e.preventDefault();

            });

        })
        

    </script>

<script>
        //ajax call for Funeral Contribution
        $(document).ready(function(){

            $("#funeralform").on('submit',function(e) {

               // console.log('emma')

                $.ajax({
                    type: "POST",
                    url: "fprocess.php",
                    data: $('#funeralform').serialize(),
                    success: function(result){

                        $("#message").html(result)
                    }
                })

                e.preventDefault();

            });

        })
        

    </script>

<script>
        //reset of form elements in Dues Pay
        $("#ureset").on("click", function () {
            $("#mid").val("")
            $("#grouptype").val("")
            $("#year").val("")
            $("#amount").val("")
            $("#dop").val("")
            $("#month").val("")
         });

         $("#close_b").on("click", function () {
            $("#mid").val("")
            $("#grouptype").val("")
            $("#year").val("")
            $("#amount").val("")
            $("#dop").val("")
            $("#month").val("")
         });

         //reset of form elements in Funeral Contribution
        $("#freset").on("click", function () {
            $("#fid").val("")
            $("#fgrouptype").val("")
            $("#dmember").val("")
            $("#funeralname").val("")
            $("#famount").val("")
            $("#fdoc").val("")
            $("#fmonth").val("")
         });

         $("#fclose_b").on("click", function () {
            $("#fid").val("")
            $("#fgrouptype").val("")
            $("#dmember").val("")
            $("#funeralname").val("")
            $("#famount").val("")
            $("#fdoc").val("")
            $("#fmonth").val("")
         });

    </script>

<script>
    //sets the date to today and the future but not the past
		var today = new Date();
		var year = today.getFullYear(); // YYYY
		var month = ("0" + (today.getMonth() + 1)).slice(-2); // MM
		var day = ("0" + today.getDate()).slice(-2);

		var minDate = year + "-" + month + "-" + day; // Results in "YYYY-MM-DD" for today's date
        var maxDate = year + "-" + month + "-" + day;

		//setting the max and min date value for the calendar to be today's date
		$("#dop").attr("min", minDate);
        $("#dop").attr("max", maxDate);
        $("#fdoc").attr("min", minDate);
        $("#fdoc").attr("max",maxDate);
	</script>


<script>
   /* $(function(){

        var today = new Date();
		var year = today.getFullYear();
        document.getElementById("famount").value = year

        $('#picker').datepicker({ 
            format: "yyyy", 
            viewMode: "years",
            minViewMode: "years",
            changeMonth: true,
            changeYear: true,
            defaultViewDate: {
                year: '2022'
            },
            startDate: 'year',
            endDate: 'year' 
        
        })
    });*/

    $("#grouptype").on("change", function () {

        var today = new Date();
		var year = today.getFullYear();
        document.getElementById("year").value = year

    });

    //Automatic set for month when date is chosen
    $("#fdoc").on("change", function () {

      var today = new Date();
	  var month = ("0" + (today.getMonth() + 1)).slice(-2); // MM
      if(month == 01)
      {
        document.getElementById("fmonth").value = "January"
      }
      else if(month == 02)
      {
        document.getElementById("fmonth").value = "Febuary"
      }
      else if(month == 03)
      {
        document.getElementById("fmonth").value = "March"
      }
      else if(month == 04)
      {
        document.getElementById("fmonth").value = "April"
      }
      else if(month == 05)
      {
        document.getElementById("fmonth").value = "May"
      }
      else if(month == 06)
      {
        document.getElementById("fmonth").value = "June"
      }
      else if(month == 07)
      {
        document.getElementById("fmonth").value = "July"
      }
      else if(month == 08)
      {
        document.getElementById("fmonth").value = "August"
      }
      else if(month == 09)
      {
        document.getElementById("fmonth").value = "September"
      }
      else if(month == 10)
      {
        document.getElementById("fmonth").value = "October"
      }
      else if(month == 11)
      {
        document.getElementById("fmonth").value = "November"
      }
      else if(month == 12)
      {
        document.getElementById("fmonth").value = "December"
      }
        
    });
</script>

<script>
    function getAmount()
    {
            var f = document.getElementById("fgrouptype");
            var fvalue = f.options[f.selectedIndex].value;

            var d = document.getElementById("dmember");
            var dvalue = d.options[d.selectedIndex].value;

            //console.log(fvalue)
            //console.log(dvalue)

            if( fvalue == "Adom" && dvalue == "Member")
            {
                document.getElementById("famount").value = "10.00"
            }
            else if(fvalue == "Adom" && dvalue == "Not a Member")
            {
                document.getElementById("famount").value = "5.00"
            }
            else if(fvalue == "Second Chance" && dvalue == "Member")
            {
                document.getElementById("famount").value = "20.00"
            }
            else if(fvalue == "Second Chance" && dvalue == "Not a Member")
            {
                document.getElementById("famount").value = "10.00"
            }
        
    }
</script>

<script>
        //Insertion of Amount per Group chosen in Funeral Contribution
   /*      $("#fmonth").on("change", function () {
            
            var f = document.getElementById("fgrouptype");
            var fvalue = f.options[f.selectedIndex].value;

            var d = document.getElementById("dmember");
          var dvalue = d.options[d.selectedIndex].value;

            console.log(fvalue)
            console.log(dvalue)
            
          if( fvalue == "Adom" AND dvalue == "Member")
            {
                document.getElementById("famount").value = "10.00"
            }
            else if(fvalue == "Adom" AND dvalue == "Not a Member")
            {
                document.getElementById("famount").value = "5.00"
            }
            else if(fvalue == "Second Chance" AND dvalue == "Member")
            {
                document.getElementById("famount").value = "20.00"
            }
            else if(fvalue == "Second Chance" AND dvalue == "Not a Member")
            {
                document.getElementById("famount").value = "10.00"
            }
            //console.log(value)
         });*/
                
    </script>



<!-- ID Form send -->
<script>
        //ajax call for Dues Payment
        $(document).ready(function(){

            $("#idForm").on('submit',function(e) {

               // console.log('emma')

                $.ajax({
                    type: "POST",
                    url: "idProcess.php",
                    data: $('#idForm').serialize(),
                    success: function(result){

                        $("#message").html(result)
                    }
                })

                e.preventDefault();

            });

        })
        

    </script>





</body>
</html>


