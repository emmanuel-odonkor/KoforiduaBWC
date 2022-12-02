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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <script>
        $(document).ready(function(){
                $('#myModal').modal({
                    backdrop: 'static'
                });
             
        });
</script>
<!--Custom CSS for styling the form page and its background-->
    <style type="text/css">

                 /* Customize the label */
        .check_boxes {
          display: block;
          position: relative;
          padding-left: 35px;
          margin-bottom: 12px;
          cursor: pointer;
          font-size: 18px;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
        }

        /* Hide the browser's default radio button */
        .check_boxes input {
          position: absolute;
          opacity: 0;
          cursor: pointer;
          height: 0;
          width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
          position: absolute;
          top: 0;
          left: 0;
          height: 25px;
          width: 25px;
          background-color: #ccc;
          border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .check_boxes:hover input ~ .checkmark {
          background-color: #923D41;
        }

        /* When the checkbox is checked, add a blue background */
        .check_boxes input:checked ~ .checkmark {
          background-color: #923D41;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
          content: "";
          position: absolute;
          display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .check_boxes input:checked ~ .checkmark:after {
          display: block;
        }

        /* Style the indicator (dot/circle) */
        .check_boxes .checkmark:after {
          left: 9px;
          top: 5px;
          width: 5px;
          height: 10px;
          border: solid white;
          border-width: 0 3px 3px 0;
          -webkit-transform: rotate(45deg);
          -ms-transform: rotate(45deg);
          transform: rotate(45deg);
        }


                   /* Customize the label */
        .radio_buttons {
          display: block;
          position: relative;
          padding-left: 35px;
          margin-bottom: 12px;
          cursor: pointer;
          font-size: 18px;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
        }

        /* Hide the browser's default radio button */
        .radio_buttons input {
          position: absolute;
          opacity: 0;
          cursor: pointer;
          height: 0;
          width: 0;
        }

        /* Create a custom radio button */
        .checkmark {
          position: absolute;
          top: 0;
          left: 0;
          height: 25px;
          width: 25px;
          background-color: #ccc;
          border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .radio_buttons:hover input ~ .checkmark {
          background-color: #923D41;
        }

        /* When the radio button is checked, add a blue background */
        .radio_buttons input:checked ~ .checkmark {
          background-color: #923D41;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
          content: "";
          position: absolute;
          display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .radio_buttons input:checked ~ .checkmark:after {
          display: block;
        }

        /* Style the indicator (dot/circle) */
        .radio_buttons .checkmark:after {
          top: 9px;
          left: 9px;
          width: 8px;
          height: 8px;
          border-radius: 50%;
          background: white;
        } 


        
    </style>
    <body class="sb-nav-fixed">
        <!-- Modal  -->
        <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                             
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #923D41;">
                                            <h6 style="color:white;">Request for a Tutor <span class="fas fa-chalkboard-teacher"></span></h6>
                                            <button type="button" style="background-color:red; color:white;" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                             <center><img src="../images/ash2.jpg" style=" width:400px;height:200px; border-width: 5px; "></center>
                                             <center><div class="jumbotron">
                                                <h5 style="color: #923D41;"><b>Welcome to the Request Tutor Portal</b></h5> 
                                                <p>We are happy to have you here. This portal allows you to be linked with tutors depending on the information you provide. We are going to demand a couple of information from you on course/topic you need help with. Based on this information, we would match you to a Tutor whom you can begin communications</p>

                                                <button type="submit" style="background-color:green; color:white;"  class="btn btn-default" data-toggle="modal" data-target="#myModal1">Get Started<span class="fa fa-paper-plane"></span></button>

                                            </div></center>

                                        </div>
                                        <div class="modal-footer" style="background-color: #923D41;">
                                            <button type="button" style="background-color:red; color:white;" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                             
                                </div>
                            </div>
                            <!-- Modal1 -->
                            <div class="modal fade" id="myModal1" role="dialog" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                             
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #923D41;">
                                              <h4 style="color:white; align-items-center"><?php echo $_SESSION['user']['username'];  ?></h4>
                                              
                                           <button type="button" style="background-color:red; color:white;" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                             <form action="" method="post">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="tname" name="tname" value="<?php echo $_SESSION['user']['username']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <b><label for="txtTitle">Your Major: <span class="fas fa-graduation-cap" style="color: #923D41;"></span></label></b>
                                                    <select name="major" class="form-control">
                                                            <option value="BSc. Computer Engineering">BSc. Computer Engineering</option>
                                                            <option value="BSc. Electrical and Electronic Engineering">BSc. Electrical and Electronic Engineering</option>
                                                            <option value="BSc. Mechanical Engineering">BSc. Mechanical Engineering</option>
                                                            <option value="BSc. Computer Science">BSc. Computer Science</option>
                                                            <option value="BSc. Management and Information Systems">BSc. Management and Information Systems</option>
                                                            <option value="BSc. Business Administration">BSc. Business Administration </option>
                                                        </select>
                                                </div>
                                                <?php

                                                 //open the connection
                                                 $conn = mysqli_connect('localhost','id16523746_root','Spartan13!24','id16523746_tutor_system');

                                                 $sql="SELECT course_name,payment_status FROM `courses`";

                                                echo '<div class="form-group">
                                                        <b><label for="txtDep"> Course for which you need a Tutor: <span class="fas fa-book-open" style="color: #923D41;"></span></label></b>

                                                        <select name = "tcourse" class="form-control">';

                                                        foreach ($conn->query($sql) as $row){

                                                        echo "<option value='$row[course_name]'>$row[course_name]</option>";
                                                        }

                                                echo '</select>
                                                </div>';

                                                ?>
                                                <div class="form-group">
                                                    <b><label for="txtskill">What mode of tutoring do you prefer? <span class="fas fa-user-friends" style="color: #923D41;"></span></label></b>
                                                      <label class="radio_buttons">
                                                              <input type="radio" name="tmode" value="One-on-One">One-on-One
                                                              <span class="checkmark"></span>
                                                            </label>

                                                            <label class="radio_buttons">
                                                              <input type="radio" name="tmode" value="Group Session">Group Session
                                                              <span class="checkmark"></span>
                                                            </label>

                                                            <label class="radio_buttons">
                                                              <input type="radio" name="tmode" value="Any is fine">Any is fine
                                                              <span class="checkmark"></span>
                                                            </label>
                                                </div>

                                                <div class="form-group">
                                                    <b><label for="pwd">Topics the tutor should cover: <span class="fa fa-list-alt" style="color: #923D41;"></span></label></b>
                                                    <textarea name="topics" id="topics" class="form-control" rows="3"  required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <b><label for="txtskill"> Your Skill Level in the Course: <span class="fa fa-cogs" style="color: #923D41;"></span></label></b>
                                                     <select name="tskill" class="form-control">
                                                            <option value="Beginner">Beginner</option>
                                                            <option value="Intermediate">Intermediate</option>
                                                        </select>
                                                </div>
                                                <!--<div class="form-group">
                                                    <b><label for="txtskill"> What defines your weaknesses in the course: (Select all that apply) <span class="fas fa-hand-rock" style="color: #923D41;"></span></label></b>
                                                      <label class="check_boxes">
                                                              <input type="checkbox" name="weaknesses[]" value="Prequisites">Prequisites
                                                              <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check_boxes">
                                                              <input type="checkbox" name="weaknesses[]" value="Theory">Theory
                                                              <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check_boxes">
                                                              <input type="checkbox" name="weaknesses[]" value="Practicals">Practicals
                                                              <span class="checkmark"></span>
                                                            </label>
                                                </div>-->
                                                <div class="form-group">
                                                    <b><label for="txtskill"> Do you have an issue with the Pre-requisite aspect of the course? <span class="fas fa-hand-rock" style="color: #923D41;"></span></label></b>
                                                      <label class="radio_buttons">
                                                              <input type="radio" name="Pre-requisite" value="Yes">Yes
                                                              <span class="checkmark"></span>
                                                            </label>

                                                            <label class="radio_buttons">
                                                              <input type="radio" name="Pre-requisite" value="No">No
                                                              <span class="checkmark"></span>
                                                            </label>
                                                </div>
                                                <div class="form-group">
                                                    <b><label for="txtskill"> Do you have an issue with the Theory aspect of the course? <span class="fas fa-hand-rock" style="color: #923D41;"></span></label></b>
                                                      <label class="radio_buttons">
                                                              <input type="radio" name="Theory" value="Yes">Yes
                                                              <span class="checkmark"></span>
                                                            </label>

                                                            <label class="radio_buttons">
                                                              <input type="radio" name="Theory" value="No">No
                                                              <span class="checkmark"></span>
                                                            </label>
                                                </div>
                                                <div class="form-group">
                                                    <b><label for="txtskill"> Do you have an issue with the Practical aspect of the course? <span class="fas fa-hand-rock" style="color: #923D41;"></span></label></b>
                                                      <label class="radio_buttons">
                                                              <input type="radio" name="Practical" value="Yes">Yes
                                                              <span class="checkmark"></span>
                                                            </label>

                                                            <label class="radio_buttons">
                                                              <input type="radio" name="Practical" value="No">No
                                                              <span class="checkmark"></span>
                                                            </label>
                                                </div>
                                                <div class="form-group">
                                                    <b><label for="pwd">What are your strenghts which you would like the tutor to know concerning this tutoring?<span class="fa fa-list-alt" style="color: #923D41;"></span></label></b>
                                                    <textarea name="strengths" id="strengths" class="form-control" rows="3"  required></textarea>
                                                </div>


                                                <!--<div class="form-group">
                                                    <b><label for="txtskill"> Your Location: <span class="fas fa-map-marker-alt" style="color: #923D41;"></span></label></b>
                                                      <label class="radio_buttons">
                                                              <input type="radio" name="location" value="On-Campus">On-Campus
                                                              <span class="checkmark"></span>
                                                            </label>

                                                            <label class="radio_buttons">
                                                              <input type="radio" name="location" value="Off-Campus">Off-Campus
                                                              <span class="checkmark"></span>
                                                            </label>
                                                </div>-->
                                                <div class="form-group">
                                                    <b><label for="txtskill"> Which Ashesi Learning Goals are you hoping to achieve in the end of your tutoring Journey?(Select all that apply) <span class="fas fa-crosshairs" style="color: #923D41;"></span></label></b>
                            
                                                      <label class="check_boxes">
                                                              <input type="checkbox" name="goals[]" value="Ethics & Civil Engagement">Ethics & Civil Engagement
                                                              <span class="checkmark"></span>
                                                            </label>

                                                            <label class="check_boxes">
                                                              <input type="checkbox" name="goals[]" value="Critical Thinking">Critical Thinking
                                                              <span class="checkmark"></span>
                                                            </label>
                                                    

                                                            <label class="check_boxes">
                                                              <input type="checkbox" name="goals[]" value="Communication">Communication
                                                              <span class="checkmark"></span>
                                                            </label>
                                                            <label class="check_boxes">
                                                              <input type="checkbox" name="goals[]" value="Leadership & Teamwork">Leadership & Teamwork
                                                              <span class="checkmark"></span>
                                                            </label>
                                                    
                                                            <label class="check_boxes">
                                                              <input type="checkbox" name="goals[]" value="Innovation and Action">Innovation and Action
                                                              <span class="checkmark"></span>
                                                            </label>
                                                            <label class="check_boxes">
                                                              <input type="checkbox" name="goals[]" value="Curiosity and Skill">Curiosity and Skill
                                                              <span class="checkmark"></span>
                                                            </label>
                                                            <label class="check_boxes">
                                                              <input type="checkbox" name="goals[]" value="Technological Competence">Technological Competence
                                                              <span class="checkmark"></span>
                                                            </label>
                                                            <label class="check_boxes">
                                                              <input type="checkbox" name="goals[]" value="Professionalism">Professionalism
                                                              <span class="checkmark"></span>
                                                            </label>
                                                          
                                                </div>
                                                <div class="form-group">
                                                    <b><label for="pwd">What are your expectations at the end of tutoring journey?: <span class="fas fa-crosshairs" style="color: #923D41;"></span></label></b>
                                                    <textarea name="expect" id="expect" class="form-control" rows="3"  required></textarea>
                                                </div>

                                                
                                                <center><button type="submit" name="tsubmit" style="background-color:green; color:white;"  class="btn btn-default">Submit <span class="fa fa-paper-plane"></span></button></center>
                                            </form>



                                        </div>
                                        <div class="modal-footer" style="background-color: #923D41;">
                                            <button type="button" style="background-color:red; color:white;" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
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
                        <h1 class="mt-4">Student Dashboard <span class="fa fa-user"></span></h1>
                        <center><div class="jumbotron">
                           <?php 



                                           $conn = mysqli_connect('localhost','id16523746_root','Spartan13!24','id16523746_tutor_system');

                                           $id = $_SESSION['user']['user_id'];

                                            //FORM DETAILS FOR THE TUTOR INFORMATION
                                          if(isset($_POST['tsubmit']))
                                                          {
                                                              $tname = $_POST['tname'];
                                                              $major = $_POST['major'];
                                                              $mode = $_POST['tmode'];
                                                              $tcourse = $_POST['tcourse'];
                                                              $topics = $_POST['topics'];
                                                              $tskill = $_POST['tskill'];
                                                              $student_strengths=$_POST['strengths'];
                                                              $expectations=$_POST['expect'];
                                                              $theory = $_POST['Theory'];
                                                              $practical = $_POST['Practical'];
                                                              $prerequisite = $_POST['Pre-requisite'];


                                                              $sgoals = $_POST['goals'];
                                                              $goals = implode(',',$sgoals);

                                                              $sql = "UPDATE `students` SET `student_name` = '$tname',`major` = '$major',`course` = '$tcourse',`topics` = '$topics', `Skill_level` = '$tskill',`student_strengths`='$student_strengths',`tutoring_approach`='$mode',`objectives` = '$expectations',`theory` = '$theory',`practical`='$practical',`prerequisite`='$prerequisite',`core_values`='$goals' WHERE `userstudent_id` = '$id'";                                                            
  
                                                            // $sql = "INSERT INTO tutors (Skill_level,strengths) VALUES ('$tskill','$strength') WHERE usertutor_id = $id";
                                                           
                                                              if (mysqli_query($conn, $sql) === TRUE) {
                                                                  echo "<div class='alert alert-success' style='font-size:16px;'>
                                                                  <strong>Success!!</strong> Request is Successfully Sent. Click <a href='Tutor_match.php'>here</a> to view match
                                                                       </div>";
                                                              } else {
                                                                  echo "<div class='alert alert-danger' style='font-size:16px;'>
                                                                  <strong>Danger!!</strong> Error Sending Request
                                                                       </div>";
                                                              }
                                                           
                                                          }


                  ?>
                            <h1>Welcome to Student Portal</h1> 
                            <p>Begin your role as a student by <a href="Find_tutors.php">finding tutors</a> <i class="fas fa-chalkboard-teacher" style="color:#923D41;"></i> on this portal to help you with your academics. Get into a continous touch with them and feel free to <a href="rating_dashboard.php">rate and evaluate</a> <i class="fa fa-star" style="color:#923D41;"></i> them on their performances. <a href="find_resources.php">View resources</a> <i class="fas fa-book" style="color:#923D41;"></i> also published by tutors within your course of study.</p>

                            <a href="student_photo.php"><button class="btn btn-secondary" style="color:black; background-color: white; border:2px solid #923D41; text-decoration: none;  "> <i class="fas fa-camera"></i> Upload Profile Photo</button></a>

                            <a href="Tutor_match.php"><button class="btn btn-secondary" style=" background-color: #923D41; "> <i class="fas fa-user-friends"></i> Already Matched? View Your Tutor</button></a>

                            <a><button class="btn btn-secondary" data-toggle="modal" data-target="#myModal" style="color:#923D41; background-color: white; border:2px solid #923D41; text-decoration: none;  "> <i class="fas fa-chalkboard-teacher"></i> Request For a Tutor</button></a>

                            
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
                                        <a class="small text-white stretched-link" href="../index.php#section4"></a>
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

<!--<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	
	<link type="text/css" rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="header">
			<h2>Home Page</h2>
		</div>
		<div class="content">

			<?php if(isset($_SUCCESS['success'])) : ?>
				<div class="error success">
					<h3>
						<?php

						echo $_SESSION['success'];
						unset($_SESSION['success']);

						 ?>
					</h3>
				</div>
			<?php endif ?>

			
			<h4>hello</h4>

			<div>
				<?php if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i style="color:#888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
						<br />
						<a href="index.php?logout='1'" style="color:red;">logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</body>
</html>-->