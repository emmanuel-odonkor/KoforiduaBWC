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
            rgba(0, 0, 0, 0.8)), url("../images/1.jpg");
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
					<h6 style="color:white;">Koforidua Philadelphia Movement -- Funeral Record Informations</h6>
				</div>
		</div>
        <!-- Projection of output from AJAX -->
       <div id="message"></div>
        <!-- Modal -->
        <form id="funeraladdform" action="/" method="POST" enctype="multipart/form-data">
            <!--Dues Payment Modal-->
            <div class="modal fade" id="funeraladdModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Funeral Event Section</h5>
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
                                               Add Funeral Event Details&nbsp; <i class="fa fa-calendar-plus-o" style="color:white;" aria-hidden="true"></i>
                                            </h6>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <!--<div class="form-group mt-1" id="dropdown"></div>-->
                                    <div class="form-group mt-4">
                                        <input type="text" pattern="[A-Za-z.0-9\s-]+" title="Enter a valid funeral name"
                                                class="form-control" placeholder="Funeral Name eg. The Late Mr. XYZ Funeral" required="required"
                                                value="" id="funeralname" name="funeralname"
                                                style="font-size: 16px; height: 50px;" style="width: 200px" />
                                                <span class="instruction" style="font-size: 11px;color:#003bb3;">Be sure to check Funeral Events if funeral is added to avoid data conflict</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" title="Enter a valid date of funeral" class="form-control"
                                        placeholder="Date of Funeral Event" required="required" id="dof" name="dof"
                                        style="font-size: 16px; height: 50px;"
                                        style="width: 200px; font-size: medium" onfocus="(this.type='date')"/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <select id="fmember" name="fmember" placeholder="Deceased Status" class="form-control"
                                            style="height: 50px;" required>
                                            <option name="" value="" style="display:none;">Deceased Status</option>
                                            <option name="Member" value="Member">Member</option>
                                            <option name="Not a Member" value="Not a Member">Not a Member</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <select id="dgroup" name="dgroup" placeholder="" class="form-control"
                                            style="height: 50px;" required>
                                            <option name="" value="" style="display:none;">Choose Group Type</option>
                                            <option name="Adom" value="Adom">Adom Group</option>
                                            <option name="Second Chance" value="Second Chance">Second Chance Group</option>
                                            <option name="Not Applicable" value="Not Applicable">Not Applicable</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" pattern="[A-Za-z.0-9\s-]+" title="Enter a valid funeral location"
                                        class="form-control" placeholder="Funeral Location" required="required"
                                        value="" id="funeralloc" name="funeralloc"
                                        style="font-size: 16px; height: 50px;" style="width: 200px" />
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                            <select id="region" name="region" placeholder="Region" class="form-control" style="height: 50px;" required >
                                                <option name="" value="" style="display:none;">Region of Funeral</option>
                                                <option name="AHAFO" value="AHAFO">AHAFO</option>
                                                <option name="ASHANTI" value="ASHANTI">ASHANTI</option>
                                                <option name="BONO EAST" value="BONO EAST">BONO EAST</option>
                                                <option name="BRONG AHAFO" value="BRONG AHAFO">BRONG AHAFO</option>
                                                <option name="CENTRAL" value="CENTRAL">CENTRAL</option>
                                                <option name="EASTERN" value="EASTERN">EASTERN</option>
                                                <option name="GREATER ACCRA" value="GREATER ACCRA">GREATER ACCRA</option>
                                                <option name="NORTH EAST" value="NORTH EAST">NORTH EAST</option>
                                                <option name="NORTHERN" value="NORTHERN">NORTHERN</option>
                                                <option name="OTI" value="OTI">OTI</option>
                                                <option name="SAVANNAH" value="SAVANNAH">SAVANNAH</option>
                                                <option name="UPPER EAST" value="UPPER EAST">UPPER EAST</option>
                                                <option name="UPPER WEST" value="UPPER WEST">UPPER WEST</option>
                                                <option name="WESTERN" value="WESTERN">WESTERN</option>
                                                <option name="WESTERN NORTH" value="WESTERN NORTH">WESTERN NORTH</option>
                                                <option name="VOLTA" value="VOLTA">VOLTA</option>
                                            </select>
                                    </div>
							    </div>

							    <div class="col-6">
                                        <div class="form-group">
                                            <select id="famonth" name="famonth" placeholder="Month(MM)" class="form-control" style="height: 50px;" required >
                                                    <option name="" value="" style="display:none;">Month of Funeral</option>
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
                            <button type="button" id="frreset" name="frreset" class="btn btn-outline"
                                style="border-color: green;color:green;">Reset Form</button>
                        </div>
                        <!--Submit-->
                        <div class="col-6 mt-3">
                            <button type="submit" class="btn btn-primary btn-block" id="submitDues"
                                name="fradd" style="background-color: green;border-color: green;">Add Funeral Event</button>
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
				<div class="col-lg-6 g-4 col-sm-10 card1">
					<a data-bs-toggle="modal" href="#funeraladdModal" style="color: inherit; text-decoration: none">
						<div class="card-effect">
							<div class="iconbox">
								<i class="fa fa-calendar-plus-o fa-2x" aria-hidden="true"></i>
							</div>
							<h5 class="mt-4 mb-2" style="font-size: 17px">Add Funeral Events</h5>
							<p style="font-size: 14px">
								Click to add a funeral event
							</p>
						</div>
					</a>
                    
				</div>

				<div class="col-lg-6 g-4 col-sm-10 card2">
					<a data-bs-toggle="modal" href="#funeralrecordModal" style="color: inherit; text-decoration: none">
						<div class="card-effect" style="padding: 25px">
							<div class="iconbox">
								<i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
							</div>
							<h5 class="mt-4 mb-2" style="font-size: 17px">All Funeral Events</h5>
							<p class="pb-5" style="font-size: 14px">
								All added funerals
							</p>
						</div>
					</a>
				</div>
			</div>  
        </div>


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


    <script>
        //ajax call for Dues Payment
        $(document).ready(function(){

            $("#funeraladdform").on('submit',function(e) {

               // console.log('emma')

                $.ajax({
                    type: "POST",
                    url: "faddprocess.php",
                    data: $('#funeraladdform').serialize(),
                    success: function(result){

                        $("#message").html(result)
                    }
                })

                e.preventDefault();

            });

        })
        

    </script>

<script>
        //reset of form elements 
        $("#frreset").on("click", function () {
            $("#funeralname").val("")
            $("#fmember").val("")
            $("#dgroup").val("")
            $("#funeralloc").val("")
            $("#dof").val("")
            $("#region").val("")
            $("#famonth").val("")
         });

         $("#close_b").on("click", function () {
            $("#funeralname").val("")
            $("#fmember").val("")
            $("#dgroup").val("")
            $("#funeralloc").val("")
            $("#dof").val("")
            $("#region").val("")
            $("#famonth").val("")
         });

         //reset of form elements
        $("#freset").on("click", function () {
            $("#fid").val("")
            $("#fgrouptype").val("")
            $("#funeralname").val("")
            $("#famount").val("")
            $("#fdoc").val("")
            $("#fmonth").val("")
         });

         $("#fclose_b").on("click", function () {
            $("#fid").val("")
            $("#fgrouptype").val("")
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
        $("#dof").attr("min", minDate);
	</script>

</body>
</html>


