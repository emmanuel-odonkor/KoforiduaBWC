<?php include('functions.php')?>

<!DOCTYPE html>
<html>
<head>
	<title>Ashesi Tutor Managment System-Register</title>
	<meta charset="utf-8">
	<!--CDN Bootstrap and Jquery-->
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Free Template by Free-Template.co" />
    <meta name="keywords" content="free bootstrap 4, free bootstrap 4 template, free website templates, free html5, free template, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="Free-Template.co" />
    
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
	

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/users.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!--Custom CSS for styling the form page and its background-->
	<style type="text/css">
		.login-form {
			width: 100%;
	    	margin: 50px auto;
	    	margin-bottom: 90px;
	        margin-top: 0;
		}
	    .login-form form {
	    	margin-bottom: 90px;
	        background: #f7f7f7;
	        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.4);
	        padding: 70px;
	        opacity: 93%;
	    }
	    .login-form h2 {
	        margin: 0 0 30px;
	    }
	    .form-control, .btn {
	        min-height: 50px;
	        border-radius: 7px;
	    }
	    .btn {        
	        font-size: 15px;
	        font-weight: bold;
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
</head>
<body style="background-image: url('images/2021.jpg');
            background-size: 100% 100%;
            background-attachment: fixed;">
	<div class="login_bg">
        <div class="login-form">
            <div class="row justify-content-center">
                <div class="col-lg-6">            
                    <div class="card-body">
                        <form action="register.php" method="post">
                            <center><img src="images/ashesi.jpg" style="width:100px;height:80px;"/></center>

	    	                <center><h5 id="ftco-navbar" style="color:white; font-family: sans-serif; text-align: center; color: brown; font-weight: bold;">Tutor Managment System</h5></center>
	    	<hr />
			<?php echo display_error(); ?>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                          
                                        <input type="text" class="form-control" placeholder="Username" required="required" id="uid" name="uname" style="font-size: 16px;" style="width: 200px;">
                                    </div>
                                </div>
                            	<div class="col-md-6">
                                    <div class="form-group">
                                                        
                                        <input type="email" class="form-control" placeholder="Email Address" required="required" id="eid" name="uemail" style="font-size: 16px;" style="width: 200px;">
                                    </div>
                            	</div>
                            </div>
                            <hr />
							<p style="font-size: 15px; font-family: unset; text-align: center;"><b>Choose your User Status <span class="fas fa-lightbulb"></span></b></p>
								<div class="col-md-6">
                                    <div class="form-group"> 
                                        <label class="radio_buttons">
                                        <input type="radio"  id="Student" name="ustatus" value="Student"> Student
                                        <span class="checkmark"></span>
                                        </label>   
                                        <label class="radio_buttons">
										<input type="radio"  id="Tutor" name="ustatus" value="Tutor"> Tutor
                                        <span class="checkmark"></span>
                                        </label>
                                    </div>
                            	</div>
                            <hr />
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" id="inputpass" class="form-control" placeholder="Password" required="required" name="upass" style="font-size: 16px;" style="width: 200px;" pattern=".{8}" title="8 characters( Numbers,symbols,letters)">
                                   	</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" id="confirmpass" class="form-control" placeholder="Confirm Password" required="required" name="cpass" style="font-size: 16px;" style="width: 200px;">
                                    </div>
                                </div>
                            </div>

                            <br />
                                    <div class="form-group">
										<button type="submit" class="btn btn-primary btn-block" onclick="uservalidation()" name="register_btn"  style="background-color: #923D41;">Register</button>
							<br />
										<center><b style="font-size: 20px;">Already a user? <a href="login.php" style="font-size: 20px;">Sign In</a></b></center>
									</div>
                             
                    </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>