<?php

include('functions.php');
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
        <title>Dashboard - Rate Tutor</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

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
    
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #923D41;">
            <a class="navbar-brand" href="CSIS_rating.php">Ashesi University</a>
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
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/user.png" style="border-radius:50%; width:40px;height:40px; "></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="profile_info">
                            <div>
                                <?php if(isset($_SESSION['user'])) : ?>
                                     <a class="dropdown-item" href="../Student.php?logout='1'" style="color:red;">Logout</a>
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
                            

                            <center><img src="images/ashe.png" style="width:170px;height:170px; border-radius: 50%; "/></center>
                            
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
                        <h3 class="mt-4">ENG-Engineering -- Evaluation <span class="fa fa-star"></span></h3>
                        <hr />
                        <div class="jumbotron">
            <?php 


            //open the connection
            $conn = mysqli_connect('localhost','id16523746_root','Spartan13!24','id16523746_tutor_system');


            //for the submision of evaluation data
            if($_SERVER["REQUEST_METHOD"] == "POST")
                            {
                             
                                $rate = $_POST['hdnRateNumber'];
                                $title = $_POST['tname'];
                                $tcourse = $_POST['ttutor'];
                                $tdep = $_POST['tdep'];
                                $comment = $_POST['txtComment'];
                                $date = date('Y-m-d H:i:s');
                                $sql = "INSERT INTO tutor_rating (tutor_name,tutor_course,department,rate,review,created) VALUES ('".$title."', '".$tcourse."','".$tdep."', '".$rate."', '".$comment."','".$date."') ";
                             
                                if (mysqli_query($conn, $sql) === TRUE) {
                                    echo "<div class='alert alert-success' style='font-size:16px;'>
                                    <strong>Success!!</strong> Evaluation Submitted Successfully
                                         </div>";
                                } else {
                                    echo "<div class='alert alert-danger' style='font-size:16px;'>
                                    <strong>Danger!!</strong> Error Submitting Tutor Evaluation.
                                         </div>";
                                }
                             
                            }


             $sql="SELECT * FROM `tutors` WHERE `department` = 'ENG-Engineering'";

            //$user_name = $_SESSION["user"]["username"];
            //$user_email = $_SESSION["user"]["email"];

             
             if($result=$conn->query($sql))
             {
                while($row=$result->fetch_assoc()){

                    $tutor_id = $row["tutor_id"];
                    $image = $row["profile_pic"];
                    $tname = $row["tutor_name"];
                    $ttutor = $row["tutoring_course"];
                    $tdep = $row["department"];


                
                echo '<center><div class="card-rows">

                <div class="col-sm-8 col-md-8  mb-5">
                    <div class="card w-500" style="background-color:#923D41; color: white;">
                        <div class="card-block" >
                            <center><img src="images/'.$row['profile_pic'].'" alt="" style="width:230px; height:200px; "></center>';
                            echo '<div class="card-body text-center">
                                <h3 class="card-title">'.$tname.'</h3>
                                <p class="card-text">'.$ttutor.' Tutor</p>
                                <a href="#"><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal-'.$tutor_id.'" style="width: 150px; background-color:green;"><span class="fa fa-star"></span> Click to Evaluate</button></a>


                              </div>
                        </div>
                    </div>
                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

                <style>
                    .heading {  font-size: 20px;  margin-right: 25px; } .fa {  font-size: 30px; } .checked {  color: orange; }
                </style>

                             

                <!-- Modal -->
                            <div class="modal fade" id="myModal-'.$tutor_id.'" role="dialog">
                                <div class="modal-dialog">
                             
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #923D41;">
                                            <h6 style="color:white;">Tutor Rating and Evaluation Form <span class="fa fa-star"></span></h6>
                                            <button type="button" style="background-color:red; color:white;" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">

                                            <script>
                                $(document).ready(function(){
                                    $(".rating .fa-star").click(function(){
                                        if($(this).hasClass("checked")) {
                                            $(this).toggleClass("checked");
                                            $(this).prevAll(".fa-star").addClass("checked");
                                            $(this).nextAll(".fa-star").removeClass("checked");
                                        }
                                        else
                                        {
                                            $(this).toggleClass("checked");
                                            $(this).prevAll(".fa-star").addClass("checked");
                                        }
                                        $("#hdnRateNumber").val($(".checked").length);
                                    });
                                    $("#frmRating").validate({
                                        rules: {
                                            tname: {
                                                required: true
                                            },
                                            ttutor: {
                                                required: true
                                            },
                                            txtComment: {
                                                required: true
                                            }
                                        }
                                    });
                                });
                            </script>

                                            <div class="rating">
                                                <span class="heading" style="color:red; text-align:center;">Give Tutor a rating (Out of 5)</span>
                                                <br />
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <hr />
                                            <form name="frmRating" id="frmRating" method="post">
                                                <div class="form-group">
                                                    <b><label for="txtTitle">Tutor Name:</label></b>
                                                    <input type="hidden" name="hdnRateNumber" id="hdnRateNumber">
                                                    <input type="text" class="form-control" id="tname" name="tname" value="'.$tname.'" required>
                                                </div>
                                                <div class="form-group">
                                                    <b><label for="txtCourse"> Tutoring Course:</label></b>
                                                    <input type="text" class="form-control" id="ttutor" name="ttutor" value="'.$ttutor.'" required>
                                                </div>
                                                <div class="form-group">
                                                    <b><label for="txtDep"> Tutor Department:</label></b>
                                                    <input type="text" class="form-control" id="tdep" name="tdep" value="'.$tdep.'" required>
                                                </div>
                                                <div class="form-group">
                                                    <b><label for="pwd">Evaluation Message:</label></b>
                                                    <textarea name="txtComment" id="txtComment" class="form-control" rows="3" placeholder="Comment on Tutor performance" required></textarea>
                                                </div>
                                                <button type="submit" style="background-color:green; color:white;"  class="btn btn-default">Submit <span class="fa fa-paper-plane"></span></button>
                                            </form>
                                        </div>
                                        <div class="modal-footer" style="background-color: #923D41;">
                                            <button type="button" style="background-color:red; color:white;" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                             
                                </div>
                            </div>

                </center>';   

                }
             }

             ?>
             


                    <div class="container text-center headerset">
                <a href="../rating_dashboard.php"><button class="btn btn-secondary" style="color:#923D41; background-color: white; border:2px solid #923D41; text-decoration: none;  "><span class="fas fa-arrow-left"></span> Back</button></a>
                <a href="ENG_rating.php"><button class="btn btn-secondary" style="width: 130px; background-color:#923D41;"><span class="fas fa-chalkboard-teacher"></span> ENG-Department</button></a>
                <a href="CSIS_rating.php"><button class="btn btn-secondary" style="width: 130px; background-color:#923D41;"><span class="fas fa-chalkboard-teacher"></span> CSIS-Department</button></a>
                <a href="BA_rating.php"><button class="btn btn-secondary" style="width: 130px; background-color:#923D41;"><span class="fas fa-chalkboard-teacher"></span> BA-Department</button></a>
                <a href="HSS_rating.php"><button class="btn btn-secondary" style="width: 130px; background-color:#923D41;"><span class="fas fa-chalkboard-teacher"></span> HSS-Department</button></a>
            </div>
                    </div>
                        
                    </div>
                    <hr />

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