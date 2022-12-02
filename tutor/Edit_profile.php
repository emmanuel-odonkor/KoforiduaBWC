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


    //open the connection
    $conn = mysqli_connect('localhost','id16523746_root','Spartan13!24','id16523746_tutor_system');


    $a = $_SESSION['user']['username'];



    $sql="SELECT tutor_name,gender,email,student_id,contact,yeargroup,major,tutoring_course,course_year,available_days,department FROM `tutors` WHERE `tutor_name` = '$a'";

    if($result=$conn->query($sql))
             {
                while($row=$result->fetch_assoc()){
                    

                    $tname = $row["tutor_name"];
                    $tgender = $row["gender"];
                    $tmail = $row["email"];
                    $tid = $row["student_id"];
                    $tcontact = $row["contact"];
                    $tyr = $row["yeargroup"];
                    $tmajor = $row["major"];
                    $ttutor = $row["tutoring_course"];
                    $tcouryr = $row["course_year"];
                    $tavail = $row["available_days"];
                    $tdep = $row["department"];

                }
            }



    //include the controller
require('../controllers/tutorcontroller.php');

//check if submit button was clicked to add tutor profile
if (isset($_POST['tupdate'])) {
    //grab form data and stores them in variables
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


    $tutor_id =  $_SESSION['user']['user_id'];



    //calls function from tutorcontroller.php to add a tutor profile
    $ret =  updatetutorctrl($tname ,$tgender,$tid, $temail, $tcontact, $tyeargroup, $tmajor, $ttutor, $tcouryr, $tavailable, $tdepartment, $tutor_id);
    //echo result
    if ($ret) {
        //echo success, if the tutor_profile was successfully created
                echo "<div class='alert alert-success' style='font-size:16px;'>
                        <strong>Success!</strong> Profile Updated Successfully. Click to <a href='tutor_profile.php'> View Profile</a>
                     </div>";
    }else{
        //echo danger, if the tutor_profile was not successfully created
        echo "<div class='alert alert-danger' style='font-size:16px;'>
                        <strong>Danger!</strong> Error Updating profile.
                     </div>";
    }
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

        <style>
            
            .blink{
            animation:blink 1s steps(1,end) infinite;
        }

        @keyframes blink{
            0%{
                opacity: 1;
            }

            50%{
                opacity: 0;
            }

            100%{
                opacity: 1;
            }
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
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header" style="background-color: #923D41;"><h3 class="text-center font-weight-light my-4" style="color: white;">Update Tutor Profile <img src="../images/ashesi.jpg" style="width:50px;height:40px;"/></h3><h5 style="text-align: center;color: white;">Current tutoring Course :<span class="blink"> <?php echo $ttutor; ?></span></h5></div>

                                    <div class="card-body">
                                        <form action="Edit_profile.php" method="post">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Username</label>
                                                        <input type="text" class="form-control " placeholder="Username" required="required" id="uid" name="uname" style="font-size: 16px;" style="width: 200px;" value="<?php echo $tname; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Gender</label>
                                                        <select name="gender" class="form-control">
                                                            <option value="Male" <?php if($tgender=='Male') echo 'selected="selected"'; ?> >Male</option>
                                                            <option value="Female" <?php if($tgender=='Female') echo 'selected="selected"'; ?> >Female</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Student ID</label>
                                                        <input type="number" class="form-control " required="required" id="sid" name="ustid" value="<?php echo $tid; ?>" style="font-size: 16px;" style="width: 200px;">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label class="small mb-1">Email Address</label>
                                                        <input type="email" class="form-control" placeholder="Email Address" required="required" id="eid" name="uemail" style="font-size: 16px;" style="width: 200px;" value="<?php echo $tmail; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Contact</label>
                                                        <input type="tel" class="form-control " required="required" id="cid" value="<?php echo $tcontact; ?>" name="ucontact" style="font-size: 16px;" style="width: 200px;">
                                                    </div>
                                                </div>
                                            
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">YearGroup</label>
                                                        <select name="yeargroup" class="form-control">
                                                            <option value="2021" <?php if($tyr=='2021') echo 'selected="selected"'; ?> >2021</option>
                                                            <option value="2022" <?php if($tyr=='2022') echo 'selected="selected"'; ?> >2022</option>
                                                            <option value="2023" <?php if($tyr=='2023') echo 'selected="selected"'; ?> >2023</option>
                                                            <option value="2024" <?php if($tyr=='2024') echo 'selected="selected"'; ?> >2024</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Major</label>
                                                        <select name="major"  class="form-control">
                                                            <option value="BSc. Computer Engineering" <?php if($tmajor=='BSc. Computer Engineering') echo 'selected="selected"'; ?> >BSc. Computer Engineering</option>

                                                            <option value="BSc. Electrical and Electronic Engineering" <?php if($tmajor=='BSc. Electrical and Electronic Engineering') echo 'selected="selected"'; ?> >BSc. Electrical and Electronic Engineering</option>

                                                            <option value="BSc. Mechanical Engineering" <?php if($tmajor=='BSc. Mechanical Engineering') echo 'selected="selected"'; ?> >BSc. Mechanical Engineering</option>

                                                            <option value="BSc. Computer Science" <?php if($tmajor=='BSc. Computer Science') echo 'selected="selected"'; ?> >BSc. Computer Science</option>

                                                            <option value="BSc. Management and Information Systems" <?php if($tmajor=='BSc. Management and Information Systems') echo 'selected="selected"'; ?> >BSc. Management and Information Systems</option>
                                                           
                                                           <option value="BSc. Business Administration" <?php if($tmajor=='BSc. Business Administration') echo 'selected="selected"'; ?> >BSc. Business Administration</option>
                                                           
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
                                                             <option value="Year_1" <?php if($tcouryr=='Year_1') echo 'selected="selected"'; ?> >Year 1</option>

                                                              <option value="Year_2" <?php if($tcouryr=='Year_2') echo 'selected="selected"'; ?> >Year 2</option>

                                                              <option value="Year_3" <?php if($tcouryr=='Year_3') echo 'selected="selected"'; ?> >Year 3</option>

                                                              <option value="Year_4" <?php if($tcouryr=='Year_4') echo 'selected="selected"'; ?> >Year 4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Day and Time available</label>
                                                        <input type="text" class="form-control " placeholder="day and time" required="required" id="aid" value="<?php echo $tavail; ?>" name="uday" style="font-size: 16px;" style="width: 200px;">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Tutoring Course Category / Department</label>
                                                        <select name="department" class="form-control">

                                                            <option value="Liberal Arts & Sciences Core" <?php if($tdep=='Liberal Arts & Sciences Core') echo 'selected="selected"'; ?> >Liberal Arts & Sciences Core</option>

                                                             <option value="ENG-Engineering" <?php if($tdep=='ENG-Engineering') echo 'selected="selected"'; ?> >ENG-Engineering</option>

                                                              <option value="CSIS-Computer Science and Information Systems" <?php if($tdep=='CSIS-Computer Science and Information Systems') echo 'selected="selected"'; ?> >CSIS-Computer Science and Information Systems</option>

                                                               <option value="HSS-Humanities and Social Sciences" <?php if($tdep=='HSS-Humanities and Social Sciences') echo 'selected="selected"'; ?> >HSS-Humanities and Social Sciences</option>

                                                                <option value="BA-Business Administration" <?php if($tdep=='BA-Business Administration') echo 'selected="selected"'; ?> >BA-Business Administration</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>

                                                <!--<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1">Update Profile Photo</label>
                                                        <input type="file" value="<?php echo $image; ?>" class="form-control " required="required" id="prid" name="prname">
                                                    </div>
                                                </div>-->
                                               
                                            </div>
                                            
                                           <!-- <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" name="tadd" href="#" style="background-color: #923D41;">Create Profile</a></div>-->
                                            <div class="form-group">
                                            <center><button type="submit" name="tupdate" style="background-color:green;" class="btn btn-primary btn-block">Update Profile</button></center>
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

