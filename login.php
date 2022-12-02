<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ashesi Tutor Managment System-Login</title>
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
			width: 400px;
	    	margin: 50px auto;
	    	margin-bottom: 90px;
	        margin-top: 0;
		}
	    .login-form form {
	    	margin-bottom: 100px;
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
	</style>
	</head>
	<body style="background-image: url('images/ash2.jpg');
            background-size: 100% 100%;
            background-attachment: fixed;">
		<div class="login_bg">
			<div class="login-form">
		<form action="login.php" method="post">
			<center><img src="images/ashe.png" style="width:110px;height:99px;"/></center>
			<br />
	    	<h5 class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark" id="ftco-navbar" style="color:white; font-family: sans-serif; text-align: center;">Tutor Managment System</h5>
	    	<br />
		<?php echo display_error(); ?> 
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Username" required="required" id="uid" name="username" style="font-size: 16px;" style="width: 200px;" >
			</div>
			<hr />
			<div class="form-group">
				<input type="password" id="inputpass" class="form-control" placeholder="Password" required="required" name="password" style="font-size: 16px;" style="width: 200px;">
			</div>
			
			<div class="form-group">
				<center><button type="submit" class="btn btn-primary btn-block" name="login_btn" onclick="uservalidation()" style="background-color: #923D41;">Log In</button></center>
			</div>

			<center><b style="font-size: 20px;">No Account?<a href="register.php" style="font-size: 20px;"> Create One</a></b></center>
			<hr style=" border:1px solid #923D41; "/>
			<div class="container text-center headerset">
                <a href="index.php" style="color:#923D41;"><span class="fas fa-home"></span> Back to Home Page</a>
            </div>
	</form>
</div>
</div>
	</body>
</html>