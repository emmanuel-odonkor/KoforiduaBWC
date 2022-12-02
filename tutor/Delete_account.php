<?php
//include the controller
require('../controllers/tutorcontroller.php');


$tid = $_GET['anykey'];


$tdelete = deleteaccountctrl($tid);

if ($tdelete) {
	
	header("location:../login.php");

}else{
	//echo failure if datails not successfully deleted
				echo "<div class='alert alert-danger'>
  						<strong>Danger!</strong> Failed to Delete Account.
					 </div>";
				echo "<a href='courses.php'>Retry</a>";
	
}

 
?>