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
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Student Match</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <script>
        $(document).ready(function(){
                $('#myModal').modal({
                    backdrop: 'static'
                });
             
        });
</script>
    <!--Custom CSS-->
    <style type="text/css" media="screen">
    
        /*overlay settings*/
        .overlay {
          position: absolute;
          bottom: 0;
          left: 0;
          right: 0;
          background-color: green;
          overflow: hidden;
          width: 100%;
          height: 0;
          transition: .5s ease;
        }

        /*card overlay*/
        .card:hover .overlay {
              height: 100%;
            }

        /*text on card*/
        .text {
          color: white;
          font-size: 14px;
          position: absolute;
          width: 100%;
          padding: 10px;
          top: 50%;
          left: 50%;
          -webkit-transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
        }

        .card-rows{
            border-spacing: 10px;
        }

    </style>
    <body class="sb-nav-fixed">
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
                      <div class="dropdown-item">
                        <b><a href="student_profile.php">View Profile <i class="fa fa-user"></i></a></b>
                     </div>
                    <div class="dropdown-divider"></div>
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
                        <center><h1 class="mt-4">Student-Tutor Matching Portal <span style="color: #923D41;" class="fas fa-user-friends"></span></h1></center>
                        <center><div class="jumbotron">


                          <?php 


                       $conn = mysqli_connect('localhost','id16523746_root','Spartan13!24','id16523746_tutor_system');

                       $student_id = $_SESSION['user']['user_id'];

                       $student_name = $_SESSION['user']['username'];
     


                       $sql = "SELECT * FROM tutors INNER join
                       students ON tutors.tutoring_course = students.course AND tutors.tutoring_mode = students.tutoring_approach AND tutors.prerequisite = students.prerequisite OR tutors.theory = students.theory OR tutors.practical = students.practical WHERE userstudent_id = '$student_id' AND tutors.skill_category != students.Skill_level ";

                       //execute sql
                        $result = $conn->query($sql);

                        //check if any result was returned
                        if ($result->num_rows > 0) 
                        {
                            //looping - output data of each row
                            while($row = $result->fetch_assoc()) 
                            {

                               $image = $row['profile_pic'];
                               $tutor_name =$row['tutor_name'];
                               $tutor_course = $row['tutoring_course'];
                               $tavail = $row["available_days"];
                               $tdep = $row["department"];
                               $temail = $row["email"];
                               $tskill = $row["skill_category"];
                               $tmode = $row['tutoring_mode'];
                               $tgoals = $row["goals"];


                               echo "<div class='alert alert-success' style='font-size:16px;'>
                                                                  <strong>Congrats ".$student_name."!!</strong>, You have been matched with a Tutor named ".$tutor_name." from the ".$tdep." Department
                                                                       </div>";


                               echo '<center><div class="card-rows">

                                    <div class="col-sm-4 col-md-4  mb-5">
                                        <div class="card w-500" style="background-color:#923D41; color: white;">
                                            <div class="card-block" >
                                                <center><img src="../images/'.$row['profile_pic'].'" alt="" style="width:230px; height:200px; "></center>';
                                                echo '<div class="card-body text-center">
                                                    <h3 class="card-title">'.$tutor_name.'</h3>
                                                    <p class="card-text">'.$tutor_course.' Tutor</p>
                                                    <p class="card-text"><span class="fas fa-user-friends"></span> Tutoring Mode: '.$tmode.'</p>
                                                  </div>
                                                  <div class="overlay">
                                                    <div class="text">
                                                        <br />
                                                        <center><h6><u><b>Skill Level in Course</b></u></h6></center>
                                                        <center><strong>' .$tskill.' </strong></center><br >
                                                        <center><h6><u><b>Available Days</b></u></h6></center>
                                                        <center><strong>' .$tavail.' </strong></center><br >
                                                        <center><h6><u><b>Email</b></u></h6></center>
                                                        <center><strong>' .$temail.' </strong></center><br />
                                                        <center><h6><u><b>Learning Goals</b></u></h6></center>
                                                        <center><strong>' .$tgoals.' </strong></center><br >

                                                        <br><br>
                                                       
                                                    </div>
                                                  </div>
                                                  <div class="card-footer text-center" style="background-color:green;">Hover to view tutor details</div>
                                            </div>
                                        </div>
                                    </div></center>';   
                            }
                        } 
                        else 
                        {
                            echo "<div class='alert alert-danger' style='font-size:16px;'>
                                              <strong>Sorry!</strong> No match has made been set yet. Request or Re-check later
                                           </div>";
                        }


                         

                  ?>     

                            <center><a href="Student.php"><button class="btn btn-secondary" style="color:#923D41; background-color: white; border:2px solid #923D41; text-decoration: none;  "> <i class="fas fa-arrow-left"></i> Back</button></a>

         

                            <a href="../index.php#section4"><button class="btn btn-secondary" style=" background-color: #923D41; "> <i class="fas fa-comments"></i> Begin Discussion with Tutor</button></a></center>

                            

                            
                        </div></center>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>


