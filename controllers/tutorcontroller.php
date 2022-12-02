<?php


require('../classes/tutorclass.php');

//controller function to add a tutor_profile
function addtutorctrl($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l){
	//create a new instance of the class
	$insertp = new tutor_class;

	//run the insert method
	$checkinsert = $insertp->addtutor_mthd($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l);

	if ($checkinsert) {
		return $checkinsert;
	}else{
		return false;
	}

	//return result
}

//controller function to add a tutor_profile
function addresourcectrl($a, $b, $c, $d){
	//create a new instance of the class
	$insertr = new tutor_class;

	//run the insert method
	$checkinsert = $insertr->addresource_mthd($a, $b, $c, $d);

	if ($checkinsert) {
		return $checkinsert;
	}else{
		return false;
	}

	//return result
}

//controller function to update a tutor profile
function updatetutorctrl($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l){
	//create a new instance of the class
	$updatep = new tutor_class;

	//run the update method
	$checkupdate = $updatep->update_tutor_mthd($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l);

	if ($checkupdate) {
		return $checkupdate;
	}else{
		return false;
	}

	//return result
}


//controller function to update a tutor profile picture
function profilepicctrl($a, $b){
	//create a new instance of the class
	$uprofilepicture = new tutor_class;

	//run the update method
	$checkupdate = $uprofilepicture->update_picture_mthd($a, $b);

	if ($checkupdate) {
		return $checkupdate;
	}else{
		return false;
	}

	//return result
}

//controller function to delete an account
function deleteaccountctrl($a){
	//create a new instance of the class
	$deletep = new tutor_class;

	//run the delete method
	$checkdelete = $deletep->delete_account_mthd($a);

	if ($checkdelete) {
		return $checkdelete;
	}else{
		return false;
	}

	//return result
}

//controller function to view all tasks
function viewalltaskctrl($a){
	//create an instance of the task class
	$displayc = new task_class();

	//run the view all method in the class
	$tasklist = $displayc->viewall_task_mthd($a);

	if ($tasklist) {
		//array
		$db_tasklist = array();
			while ($record = $displayc->db_fetch()) {
				# code...
				$db_tasklist[] = $record;
			}
			//return the array
		return $db_tasklist;
	}else{
		return false;
	}
}


 //function to help get task data depending on a given task_id
function getTask($a){
	$task = new task_class();
	$checktask = $task->getTaskById($a);
	if ($checktask){
		//create an array
		$Task = array();
		//loop through the fetch and add each to the array
			while ($record = $task->db_fetch()) {
				//passing each record to the array
				$Task[] = $record;
			}
		//return the array
		return $Task;
}
}

?>