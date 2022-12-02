<?php

//include the database class
require('../settings/db_class.php');

/**
 * 
 *@author Emmanuel Odonkor Teye-Kofi
 */
class tutor_class extends db_connection
{

	//method for insert / adding  a tutor profile
	public function addtutor_mthd($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l){
		//write the query
		$sql = "INSERT INTO `tutors`(`usertutor_id`,`tutor_name`,`gender`,`student_id`, `email`,`contact`, `yeargroup`,`major`,`tutoring_course`, `course_year`,`available_days`,`department`) VALUES('$a', '$b', '$c','$d','$e','$f','$g','$h','$i','$j','$k','$l')";

		//run the query
		return $this->db_query($sql);
	}

	//method for insert / adding  a resource
	public function addresource_mthd($a, $b, $c, $d){
		//write the query
		$sql = "INSERT INTO `resources`(`tutorresource_id`,`resource_topic`,`resource_category`,`resource_file`) VALUES('$a', '$b', '$c','$d')";

		//run the query
		return $this->db_query($sql);
	}


	//a method for updating tutor profile
	public function update_tutor_mthd($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l){
		//write a query
		$sql = "UPDATE `tutors` SET `tutor_name` = '$a' , `gender`='$b' , `student_id`='$c' , `email`='$d', `contact`='$e',`yeargroup`='$f',`major`='$g',`tutoring_course`='$h',`course_year`='$i', `available_days`='$j',`department`='$k' WHERE `usertutor_id`= '$l'";

		//return the executed query
		return $this->db_query($sql);
	}

	//a method for updating tutor profile picture
	public function update_picture_mthd($a, $b){
		//write a query
		$sql= "UPDATE `tutors` SET `profile_pic` = '$a' WHERE `usertutor_id` = '$b'";

		//return the executed query
		return $this->db_query($sql);
	}






	public function delete_account_mthd($a){
		//write a query
		$sql = "DELETE FROM `users` WHERE `user_id` = '$a'";

		//return the executed query
		return $this->db_query($sql);
	}

	//a method for viewing all tasks
	public function viewall_task_mthd($a){
		//write a query
		$sql = "SELECT * FROM `task` WHERE `username` = '$a' order by `date` ";

		//return the executed query
		return $this->db_query($sql);
	}

    
    
    //method for getting task details based on the given task_id
	public function getTaskById($id){
        
        //wrting of query
		$sql = "SELECT * FROM `task` WHERE `task_id`='$id'";

		//run the sql execution

		return $this->db_query($sql);



	}

}

?>