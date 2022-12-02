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

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tutor Profile Form</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/users.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <style type="text/css">

            .form-control {
          
                border:1px solid #923D41; 
        
        }

            
        </style>
    </head>
    <body style="background-image: url('../images/ash5.jpg');background-size: 100% 100%; background-attachment: fixed; ">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-2">
                                    <div class="card-header" style="background-color: #923D41;"><h3 class="text-center font-weight-light my-4" style="color: white;">Create Tutor Profile <img src="../images/ashesi.jpg" style="width:50px;height:40px;"/></h3></div>
                                    <div class="card-body">
                                        <form action="Profile_form.php" method="post">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Username</label>
                                                        <input type="text" class="form-control " placeholder="Username" required="required" id="uid" name="uname" style="font-size: 16px;" style="width: 200px;" value="<?php echo $_SESSION['user']['username']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Gender</label>
                                                        <select name="gender" class="form-control">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Student ID</label>
                                                        <input type="number" class="form-control " required="required" id="sid" name="ustid" style="font-size: 16px;" style="width: 200px;">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label class="small mb-1">Email Address</label>
                                                        <input type="email" class="form-control" placeholder="Email Address" required="required" id="eid" name="uemail" style="font-size: 16px;" style="width: 200px;" value="<?php echo $_SESSION['user']['email']; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Contact</label>
                                                        <input type="tel" class="form-control " required="required" id="cid" name="ucontact" style="font-size: 16px;" style="width: 200px;">
                                                    </div>
                                                </div>
                                            
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">YearGroup</label>
                                                        <select name="yeargroup" class="form-control">
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1"> Your Major</label>
                                                        <select name="major" class="form-control">
                                                            <option value="BSc. Computer Engineering">BSc. Computer Engineering</option>
                                                            <option value="BSc. Electrical and Electronic Engineering">BSc. Electrical and Electronic Engineering</option>
                                                            <option value="BSc. Mechanical Engineering">BSc. Mechanical Engineering</option>
                                                            <option value="BSc. Computer Science">BSc. Computer Science</option>
                                                            <option value="BSc. Management and Information Systems">BSc. Management and Information Systems</option>
                                                            <option value="BSc. Business Administration">BSc. Business Administration </option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>

                                                <?php

                                                 //open the connection
                                                 $conn = mysqli_connect('localhost','id16523746_root','Spartan13!24','id16523746_tutor_system');

                                                 $sql="SELECT course_name,payment_status FROM `courses`";

                                                echo '<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Course to Tutor</label>

                                                        <select name = "tname" class="form-control">';

                                                        foreach ($conn->query($sql) as $row){

                                                        echo "<option value='$row[course_name]'>$row[course_name] ($row[payment_status])</option>";
                                                        }

                                                echo '</select>
                                                </div>
                                                </div>';

                                                ?>
                                           
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Tutoring Course Year</label>
                                                        <select name="courseyear" class="form-control">
                                                            <option value="Year_1">Year 1 </option>
                                                            <option value="Year_2">Year 2 </option>
                                                            <option value="Year_3">Year 3 </option>
                                                            <option value="Year_4">Year 4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Day and Time available</label>
                                                        <input type="text" class="form-control " placeholder="day and time" required="required" id="aid" name="uday" style="font-size: 16px;" style="width: 200px;">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Tutoring Course Category / Department</label>
                                                        <select name="department" class="form-control">
                                                            <option value="Liberal Arts & Sciences Core">Liberal Arts & Sciences Core</option>
                                                            <option value="ENG-Engineering">ENG-Engineering</option>
                                                            <option value="CSIS-Computer Science and Information Systems">CSIS-Computer Science and Information Systems</option>
                                                            <option value="HSS-Humanities and Social Sciences">HSS-Humanities and Social Sciences</option>
                                                            <option value="BA-Business Administration">BA-Business Administration</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div> 

                                            </div>
                                            
                                           <!-- <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" name="tadd" href="#" style="background-color: #923D41;">Create Profile</a></div>-->
                                            <div class="form-group">
                                            <center><button type="submit" name="tadd" onclick="profilevalidation()" style="background-color:green;" class="btn btn-primary btn-block">Create Profile</button></center>
                                             </div>
                                             <center><div class="small"><b><a href="Tutor.php">BACK</a></b></div></center>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>


<?php
//open the connection
            $conn = mysqli_connect('localhost','id16523746_root','Spartan13!24','id16523746_tutor_system');


            $id =  $_SESSION['user']['user_id'];


            //for the submision of evaluation data
            if($_SERVER["REQUEST_METHOD"] == "POST")
                            {
                             
                                $tname = $_POST['uname'];
                                $tgender = $_POST['gender'];
                                $tid = $_POST['ustid'];
                                $temail = $_POST['uemail'];
                                $tcontact = $_POST['ucontact'];
                                $tyeargroup = $_POST['yeargroup'];
                                $tmajor = $_POST['major'];
                                $ttutor = $_POST['tname'];
                                $tcouryr = $_POST['courseyear'];
                                $tavailable = $_POST['uday'];
                                $tdepartment = $_POST['department'];

                                $sql = "INSERT INTO tutors (usertutor_id,tutor_name,gender,student_id,email,contact,yeargroup,major,tutoring_course,course_year,available_days,department) VALUES ('".$id."', '".$tname."','".$tgender."', '".$tid."', '".$temail."','".$tcontact."','".$tyeargroup."','".$tmajor."','".$ttutor."','".$tcouryr."','".$tavailable."','".$tdepartment."') ";
                             
                                if (mysqli_query($conn, $sql) === TRUE) {
                                    echo "<script>swal('Successful','Your Profile has been set','success')</script>";
                                } else {
                                   echo "<script>swal('Oops','Error Creating Profile','error')</script>";
                                }
                             
                            }

             ?>