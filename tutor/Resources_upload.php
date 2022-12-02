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
        <title>Upload Resources</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/users.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body style="background-image: url('../images/upload.png');background-size: 100% 100%; background-attachment: fixed; ">
        <?php


                        $tutorresource_id = $_SESSION['user']['user_id'];


        
                        //connecting to tutor_system database.
                        $conn = mysqli_connect('localhost','id16523746_root','Spartan13!24','id16523746_tutor_system');
                        
                        //if button with the name uploadfile has been clicked
                        if(isset($_POST['radd'])) {
                        //declaring variables
                        $r_name = $_POST['rname'];
                        $r_major = $_POST['rmajor'];
                        $filename = $_FILES['uploadfile']['name'];
                        
                        //folder where resources will be uploaded
                        $folder = 'resources/' . $filename;

                        //get extension
                        $extension = pathinfo($filename, PATHINFO_EXTENSION);

                        //physical features
                        $filetmpname = $_FILES['uploadfile']['tmp_name'];
                        $size = $_FILES['uploadfile']['size'];

                        if(!in_array($extension, ['zip','pdf','docx'])){
                            echo "<center><div class='alert alert-danger' style='font-size:16px;'>
                        <strong>Sorry!</strong> Your File must use .pdf format
                     </div></center>";
                        }elseif($_FILES['uploadfile']['size'] > 1000000) {

                            echo "<center><div class='alert alert-danger' style='font-size:16px;'>
                        <strong>Sorry!</strong> File is too large
                     </div></center>";
                        }else{
                            if(move_uploaded_file($filetmpname, $folder)){

                                 $sql = "INSERT INTO resources (`tutorresource_id`,`resource_topic`,`resource_category`,`resource_file`) VALUES ('$tutorresource_id','$r_name','$r_major','$filename')";

                                 if(mysqli_query($conn, $sql)){

                                    echo "<center><div class='alert alert-success' style='font-size:16px;'>
                        <strong>Success!</strong> Resource Uploaded Successfully. Click to <a href='view_upload.php'>view</a> Resources
                     </div></center>";
                                 }

                            }else{
                                echo "<center><div class='alert alert-danger' style='font-size:16px;'>
                        <strong>Sorry!</strong> Failed to upload Resource
                     </div></center>";
                            }
                        }

                    }

                        ?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header" style="background-color: #923D41;"><h3 class="text-center font-weight-light my-4" style="color: white;">Upload Educational Resources <img src="../images/ashesi.jpg" style="width:50px;height:40px;"/></h3>
                                        <h6 class="text-center font-weight-light my-4" style="color: white;">Help Students by uploading resources which would be helpful to them</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="Resources_upload.php" method="post" enctype="multipart/form-data">
                                               <center> <div class="col-md-8">
                                                    <div class="form-group">
                                                       <label class="small mb-1" style="font-weight: bold;">Resource Topic</label>
                                                        <input type="text" class="form-control " placeholder="Theme of the resource" required="required" id="uid" name="rname" style="font-size: 16px;" style="width: 200px;">
                                                    </div>
                                                </div>
                                                
                                            
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label class="small mb-1" style="font-weight: bold;">Resource Category</label>
                                                        <select name="rmajor" class="form-control">
                                                            <option value="Liberal Arts & Sciences Core"> Liberal Arts & Sciences Core</option>
                                                            <option value="ENG-Engineering"> ENG-Engineering</option>
                                                            <option value="CSIS-Computer Science and Information Systems">CSIS-Computer Science and Information Systems</option>
                                                            <option value="BA-Business Administration"> BA-Business Administration</option>
                                                            <option value="HSS-Humanities and Social Science"> HSS-Humanities and Social Science </option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>


                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label class="small mb-1" style="font-weight: bold;">Upload the Resource File <span style="color:red;">( In .pdf format )</span></label>
                                                        <input type="file" class="form-control " required="required" id="prid" name="uploadfile">
                                                    </div>
                                                </div></center>
                                            
                                           <!-- <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" name="tadd" href="#" style="background-color: #923D41;">Create Profile</a></div>-->
                                            <div class="form-group">
                                            <center><button type="submit" name="radd" style="background-color:green;" onclick="resourcevalidation()" class="btn btn-primary btn-block">Upload Resource</button></center>
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






