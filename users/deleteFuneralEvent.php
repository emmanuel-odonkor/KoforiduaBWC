<?php
//include the controller
require('../controllers/funeralcontroller.php');

//grab the task_id of the task to be deleted
$fid = $_GET['anykey'];

//cal the function from the admincontroller.php to delete task
$fdelete = deletefuneralctrl($fid);

if ($fdelete) {
	//if a course is successfully deleted, it redirects the listcheck.php page to re-view their changes
	header("location:funeralevents.php");

}else{
	//echo failure if datails not successfully deleted
	echo "<div class='alert alert-danger'>
			<strong>Danger!</strong> Failed to Delete Funeral Event.
			</div>";
	echo "<a href='funeralevents.php'>Retry</a>";
	
}

 
?>