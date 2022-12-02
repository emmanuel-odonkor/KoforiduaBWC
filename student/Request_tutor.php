<?php 
	include('../functions.php');
	if(!isLoggedIn()){
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Student</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
</head>
<body class="sb-nav-fixed">
 <!-- Modal1 -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                             
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #923D41;">
                                            <h6 style="color:white;">Request for a Tutor <span class="fas fa-chalkboard-teacher"></span></h6>
                                           <!-- <button type="button" style="background-color:red; color:white;" class="close" data-dismiss="modal">&times;</button>-->
                                        </div>
                                        <div class="modal-body">
                                             <center><img src="../images/Ashesi_resources1.jpg" style="border-radius:50%; width:170px;height:170px; "></center>
                                             <center><div class="jumbotron">
                                                <h5>Welcome to the Request Tutor Portal</h5> 
                                                <p>We are happy to have you here. This portal allows you to be linked with tutors depending on the information you provide. We are going to demand a couple of information from you on course/topic you need help with. Based on this information, we would match you to a Tutor whom you can begin communications</p>

                                                <button type="submit" style="background-color:green; color:white;"  class="btn btn-default" data-toggle="modal" data-target="#myModal2">Get Started<span class="fa fa-paper-plane"></span></button>

                                            </div></center>




                                        </div>
                                        <!--<div class="modal-footer" style="background-color: #923D41;">
                                            <button type="button" style="background-color:red; color:white;" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>-->
                                    </div>
                             
                                </div>
                            </div>
                            <!-- Modal1 -->
                            <div class="modal fade" id="myModal2" role="dialog">
                                <div class="modal-dialog">
                             
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #923D41;">
                                            <h6 style="color:white;">Request for a Tutor <span class="fas fa-chalkboard-teacher"></span></h6>
                                           <!-- <button type="button" style="background-color:red; color:white;" class="close" data-dismiss="modal">&times;</button>-->
                                        </div>
                                        <div class="modal-body">
                                             <center><img src="../images/Ashesi_resources1.jpg" style="border-radius:50%; width:170px;height:170px; "></center>
                                             <center><div class="jumbotron">
                                                <h5>Welcome to the Request Tutor Portal</h5> 
                                                <p>We are happy to have you here. This portal allows you to be linked with tutors depending on the information you provide. We are going to demand a couple of information from you on course/topic you need help with. Based on this information, we would match you to a Tutor whom you can begin communications</p>

                                                <button type="submit" style="background-color:green; color:white;"  class="btn btn-default" data-toggle="modal" data-target="#myModal2">Get Started<span class="fa fa-paper-plane"></span></button>

                                            </div></center>




                                        </div>
                                        <!--<div class="modal-footer" style="background-color: #923D41;">
                                            <button type="button" style="background-color:red; color:white;" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>-->
                                    </div>
                             
                                </div>
                            </div>
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #923D41;">
            <a class="navbar-brand" href="Student.php">Ashesi University</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <h5 style="color:white;"><?php echo $_SESSION['user']['username']; ?></h5>
                <!--<div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>-->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../images/user.png" style="border-radius:50%; width:40px;height:40px; "></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="profile_info">
                            <div>
                                <?php if(isset($_SESSION['user'])) : ?>
                                     <a class="dropdown-item" href="Student.php?logout='1'" style="color:red;">Logout</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #923D41;">
                    <div class="sb-sidenav-menu">
                        <div class="nav" >
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="Student.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Student Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Features</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                                Course Tutors
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">Find Tutors</a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">Tutor Resources</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                                Tutor Evaluations
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="#">Evaluate Tutors</a>

                                        <div class="sb-sidenav-collapse-arrow"></div>
                                </nav>
                                
                            </div>
                            <!--<div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>-->
                        </div>
                        <div class="nav" >
                            <br />
                            <br />
                            <center><div class="sb-sidenav-menu-heading">Managment System</div></center>
                            

                            <center><img src="../images/ashe.png" style="width:170px;height:170px; border-radius: 50%; "/></center>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer" style="background-color: black;">
                        <div class="small">Logged in as:</div>
                        <?php if(isset($_SESSION['user'])) : ?>
                    <strong><?php echo $_SESSION['user']['username']; ?></strong>
                    <small>
                        <i style="color:#888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                    </small>
                    <?php endif ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Student Dashboard <span class="fa fa-user"></span></h1>
                        <center><div class="jumbotron">
                            <h1>Welcome to Student Portal</h1> 
                            <p>Begin your role as a student by <a href="Find_tutors.php">finding tutors</a> <i class="fas fa-chalkboard-teacher" style="color:#923D41;"></i> on this portal to help you with your academics. Get into a continous touch with them and feel free to <a href="rating_dashboard.php">rate and evaluate</a> <i class="fa fa-star" style="color:#923D41;"></i> them on their performances. <a href="find_resources.php">View resources</a> <i class="fas fa-book" style="color:#923D41;"></i> also published by tutors within your course of study.</p>

                        </div></center>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white h-100" style="background-color: #923D41;" >
                                    <div class="card-body">FIND TUTORS</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                        <a class="small text-white stretched-link" href="Find_tutors.php"></a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white h-100" style="background-color: #923D41;" >
                                    <div class="card-body">VIEW RESOURCES </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <i class="fas fa-book"></i>
                                        <a class="small text-white stretched-link" href="find_resources.php"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white h-100" style="background-color: #923D41;" >
                                    <div class="card-body">CHATAPP </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <i class="fas fa-comments"></i>
                                        <a class="small text-white stretched-link" href="../home/index.php#section4"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white h-100" style="background-color: #923D41;" >
                                    <center><div class="card-body">EVALUATE TUTORS </div></center>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <i class="fa fa-star"></i>
                                        <a class="small text-white stretched-link" href="rating_dashboard.php"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-dark mt-auto" style="color:black;">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Tutor Managment System</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
</body>
</html>