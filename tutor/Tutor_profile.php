<?php 
    include('../functions.php');
    if(!isTutor()){
        $_SESSION['msg'] = "You must log in first";
        header('location: ../login.php');
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['user']);
        header('location:../login.php');
    }



    //$conn = mysqli_connect('localhost','root','','tutor_system');

    //$a = $_SESSION['user']['username'];


   // $query = "SELECT `tutor_name`,`gender`,`email`,`student_id`,`contact`,`yeargroup`,`major`,`tutoring_course`,`available_days`,`department` FROM `tutors` WHERE `tutor_name` = '$a'";

   // $query = $mysqli->query("SELECT * FROM `tutors` WHERE `tutor_name` = '$a'");




  /*  if($result = $conn->query($query)){

        while($row = $result->fetch_assoc()){
            $tname = $row["tutor_name"];
            $tgender = $row["gender"];
            $tmail = $row["email"];
            $tid = $row["student_id"];
            $tcontact = $row["contact"];
            $tyr = $row["yeargroup"];
            $tmajor = $row["major"];
            $ttutor = $row["tutoring_course"];
            $tavail = $row["available_days"];
            $tdep = $row["department"];
            $tprof = $row["profile_pic"];
        }

        $result->free();
    }


*/

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Tutor Profile</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #923D41;">
            <a class="navbar-brand" href="Tutor.php">Ashesi University</a>
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
                        <b><a href="Tutor_profile.php">View Profile <i class="fa fa-user"></i></a></b>
                     </div>
                    <div class="dropdown-divider"></div>
                        <div class="profile_info">
                            <div>
                                <?php if(isset($_SESSION['user'])) : ?>
                                     <a class="dropdown-item" href="Tutor.php?logout='1'" style="color:red;">Logout</a>
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
                            <a class="nav-link" href="Tutor.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Tutor Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Features</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                                My Profile
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                 <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Tutor_profile.php">View Profile</a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Edit_profile.php">Update / Edit Profile</a>
                                </nav>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Tutor_profile_pic.php">Update Profile Photo</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                                My Resources
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="#">View Resources</a>

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
                        <h1 class="mt-4">Tutor Profile <span class="fa fa-user"></span></h1>
                        
                        <div class="col-sm-12 border rounded table-responsive-sm" style="background-color: #DCDCDC"><br>


             <?php 

             //open the connection
             $conn = mysqli_connect('localhost','id16523746_root','Spartan13!24','id16523746_tutor_system');


             $a = $_SESSION['user']['username'];

             $sql="SELECT * FROM `tutors` WHERE `tutor_name` = '$a'";

             

             echo '<table class="table table-sm table-borderless" >

             <tr>

             
            

             </tr>';

             
             if($result=$conn->query($sql))
             {
                while($row=$result->fetch_assoc()){
                    
                    $image = $row["profile_pic"];
                    $tname = $row["tutor_name"];
                    $tgender = $row["gender"];
                    $tmail = $row["email"];
                    $tid = $row["student_id"];
                    $tcontact = $row["contact"];
                    $tyr = $row["yeargroup"];
                    $tmajor = $row["major"];
                    $ttutor = $row["tutoring_course"];
                    $tavail = $row["available_days"];
                    $tdep = $row["department"];

                    echo '<tr>
                        
                        <td rowspan="7"><img src="images/'.$row['profile_pic'].'" style="width:180px;"></td>
                        <td><span class="fas fa-user" style="color: #923D41;"></span><strong> Tutor Name: </strong></td>
                    <td>'.$tname.'</td>
                    <td><span class="fas fa-child" style="color: #923D41;"></span><strong> Gender: </strong></td>
                    <td>'.$tgender.'</td>
                         </tr>';

                    echo '<tr>

                    <td><span class="fas fa-envelope" style="color: #923D41;"></span><strong> Email: </strong></td>
                    <td>'.$tmail.'</td>
                    <td class=""><span class="fas fa-address-card" style="color: #923D41;"></span><strong> ID: </strong></td>
                    <td>'.$tid.'</td>
                    </tr>';

                    echo '<tr>

                    <td><span class="fas fa-mobile-alt" style="color: #923D41;"></span><strong> Contact: </strong></td>
                    <td>'.$tcontact.'</td>
                    <td><span class="fas fa-users-cog" style="color: #923D41;"></span><strong> Year Group: </strong></td>
                    <td>'.$tyr.'</td>

                    </tr>';

                    echo '<tr>

                    <td><span class="fas fa-graduation-cap" style="color: #923D41;"></span><strong> Major: </strong></td>
                    <td>'.$tmajor.'</td>
                    <td><span class="fas fa-book-open" style="color: #923D41;"></span><strong> Course of Tutor: </strong></td>
                    <td>'.$ttutor.'</td>
                    </tr>';

                    echo '<tr>

                    <td><span class="fas fa-calendar-day" style="color: #923D41;"></span><strong> Day and Time available: </strong></td>
                    <td>'.$tavail.'</td>
                    <td><span class="fas fa-building" style="color: #923D41;"></span><strong> Department: </strong></td>
                    <td>'.$tdep.'</td>

                    </tr>';

                }
             }

             
             echo '</table>';
             


             ?>

             <hr />
             <div class="container text-center headerset">
                <a href="Tutor.php"><button class="btn btn-secondary" style="color:red; background-color: white; border:2px solid red; text-decoration: none;  "><span class="fas fa-arrow-left"></span> Back</button></a>
                <?php echo ' || ';?>
                <a href="Tutor_profile_pic.php"><button class="btn btn-secondary" style="width: 130px; background-color:green;"><span class="fas fa-camera"></span> Upload Profile Picture</button></a>
                <?php echo ' || ';?>
                <a href="Edit_profile.php"><button class="btn btn-secondary" style="color:green; background-color: white; border:2px solid green; text-decoration: none;  "><span class="fas fa-user"></span> Edit Profile</button></a>
                <?php echo ' || ';?>
                 <a><button class="btn btn-secondary" data-toggle="modal" data-target="#myModal" style="color:white; background-color: red; text-decoration: none;  "><span class="fas fa-user-slash"></span> Delete Account</button></a>
            </div>

             <!-- Modal  -->
        <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                             
                                    <!-- Modal content-->
                                    <div class="modal-content" >
                                        <div class="modal-header" style="background-color: #923D41;">
                                            <h6 style="color:white;"><?php echo $_SESSION['user']['username'];  ?></h6>
                                            <button type="button" style="background-color:red; color:white;" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                             <center><img src="../images/ash2.jpg" style=" width:400px;height:200px; border-width: 5px; "></center>
                                             <center><div class="jumbotron">
                                                <h5 style="color: #923D41;"><b>Deactivating Your Account</b></h5> 
                                                <p>When you deactivate your account, your role as a Tutor would be revoked hence you would to re-register before using the system. Do you still wish to deactivate your account?</p>

                                                <?php

                                                $tid = $_SESSION['user']['user_id'];


                                                echo '
                                                <a href="Delete_account.php?anykey='.$tid.'"><button type="submit" style="background-color:red; color:white;"  class="btn btn-default">Yes, delete account <span class="fas fa-user-slash"></span></button></a>';
                                                ?>
                                                
                                            </div></center>

                                        </div>
                                        <div class="modal-footer" style="background-color: #923D41;">
                                            <button type="button" style="background-color:red; color:white;" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                             
                                </div>
                            </div>
        

            <div>
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
