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
        <title>Dashboard - Student</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
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
                        <h1 class="mt-4">Student Profile Photo <span class="fa fa-user"></span></h1>
                        
                        <div class="col-sm-12 border rounded table-responsive-sm" style="background-color: #DCDCDC"><br>


             <?php 

             //open the connection
             $conn = mysqli_connect('localhost','id16523746_root','Spartan13!24','id16523746_tutor_system');


             $sid = $_SESSION['user']['user_id'];
             $name = $_SESSION['user']['username'];

             $sql="SELECT profile_photo FROM `students` WHERE `userstudent_id` = '$sid'";

             

             //execute sql
                        $result = $conn->query($sql);

                        //check if any result was returned
                        if ($result->num_rows > 0) 
                        {
                            //looping - output data of each row
                            while($row = $result->fetch_assoc()) 
                            {

                               $image = $row["profile_photo"];
                                
                
                        echo '<center><div class="card-rows">

                                    <div class="col-sm-4 col-md-4  mb-5">
                                        <div class="card w-500" style="background-color:#923D41; color: white;">
                                            <div class="card-block" >
                                                <center><img src="../images/'.$row['profile_photo'].'" alt="" style="width:230px; height:200px; "></center>';
                                                echo '<div class="card-body text-center">
                                                    <h3 class="card-title">'.$name.'</h3>
                                                  </div>
                                                  <div class="card-footer text-center">Student</div>
                                            </div>
                                        </div>
                                    </div></center>';   
                            }
                        } 
                        else 
                        {
                            echo "<center><div class='alert alert-danger' style='font-size:16px;'>
                                              <strong>Sorry!</strong> No Profile Photo Set
                                           </div></center>";
                        }



             ?>


             <hr />
                <div class="container text-center headerset">
                <a href="Student.php"><button class="btn btn-secondary" style="color:#923D41; background-color: white; border:2px solid #923D41; text-decoration: none;  "><span class="fas fa-arrow-left"></span> Back</button></a>
            </div>
          <!--  <table class="table table-sm table-borderless">
                <tbody>
                  <tr>
                    td rowspan="6"><img src="../images/'.$tprof" style="width:180px;"><a href="Tutor_profile_pic.php"><button class="btn btn-secondary" style="width: 180px; background-color:blue;"><span class="fas fa-camera"></span> Upload Profile Picture</button></a></td>

                    <td><span class="fas fa-user" style="color: #923D41;"></span><strong> Tutor Name: </strong></td>
                    <td><i> <?php echo $tname; ?> </i></td>
                    <td><span class="fas fa-child" style="color: #923D41;"></span><strong> Gender: </strong></td>
                    <td><i><?php echo $tgender; ?></i></td>
                  </tr>
                  <tr>
                    <td><span class="fas fa-envelope" style="color: #923D41;"></span><strong> Email: </strong></td>
                    <td><i><?php echo $tmail; ?></i></td>
                    <td class=""><span class="fas fa-address-card" style="color: #923D41;"></span><strong> ID: </strong></td>
                    <td><i><?php echo $tid; ?></i></td>
                  </tr>
                  <tr>
                    <td><span class="fas fa-mobile-alt" style="color: #923D41;"></span><strong> Contact: </strong></td>
                    <td><i><?php echo $tcontact; ?></i></td>
                    <td><span class="fas fa-users-cog" style="color: #923D41;"></span><strong> Year Group: </strong></td>
                    <td><i><?php echo $tyr; ?></i></td>
                    
                  </tr>
                  <tr class="">
                    <td><span class="fas fa-graduation-cap" style="color: #923D41;"></span><strong> Major: </strong></td>
                    <td><i><?php echo $tmajor; ?></i></td>
                    <td><span class="fas fa-book-open" style="color: #923D41;"></span><strong> Course of Tutor: </strong></td>
                    <td><i><?php echo $ttutor; ?></i></td>
                  </tr>
                  <tr>
                    <td><span class="fas fa-calendar-day" style="color: #923D41;"></span><strong> Day and Time available: </strong></td>
                    <td><i><?php echo $tavail; ?></i></td>
                    <td><span class="fas fa-building" style="color: #923D41;"></span><strong> Department: </strong></td>
                    <td><i><?php echo $tdep; ?></i></td>

                    
                    
                  </tr>


                  

                </tbody>
            </table>-->

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
