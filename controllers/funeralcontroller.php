<?php

//call on the taskclass
require('../classes/funeralclass.php');


//controller function to update a tutor profile
function updatefuneralctrl($a, $b, $c, $d, $e , $f, $g, $h, $i,$j){
	//create a new instance of the class
	$updatep = new funeral_class;

	//run the update method
	$checkupdate = $updatep->update_funeral_mthd($a, $b, $c, $d, $e , $f, $g, $h, $i,$j);

	if ($checkupdate) {
		return $checkupdate;
	}else{
		return false;
	}

	//return result
}




//controller function to delete a course
function deletecoursectrl($a){
	//create a new instance of the class
	$deletep = new funeral_class;

	//run the delete method
	$checkdelete = $deletep->delete_course_mthd($a);

	if ($checkdelete) {
		return $checkdelete;
	}else{
		return false;
	}

	//return result
}


 //function to help get task data depending on a given course
function getFuneral($a){
	$funeral = new funeral_class();
	$checkfuneral = $funeral->getFuneralById($a);
	if ($checkfuneral){
		//create an array
		$Funeral = array();
		//loop through the fetch and add each to the array
			while ($record = $funeral->db_fetch()) {
				//passing each record to the array
				$Funeral[] = $record;
			}
		//return the array
		return $Funeral;
}
}

?>