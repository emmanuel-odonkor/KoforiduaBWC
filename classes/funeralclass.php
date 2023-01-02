<?php

//include the database class
require('../settings/db_class.php');

/**
 * 
 *@author Emmanuel Odonkor Teye-Kofi
 */
class funeral_class extends db_connection
{


	//a method for updating funerals
	public function update_funeral_mthd($a, $b, $c, $d, $e , $f, $g, $h, $i, $j){
		//write a query
		//$sql = "UPDATE `courses` SET `course_name` = '$a' , `course_category`='$b' , `payment_status`='$c' WHERE `course_id`= '$d'";
		$sql = "Update `funerals` SET `funeral_name` = '$a' , `funeral_date` = '$b' ,
        `deceased_group` = '$c' , `deceased_status` = '$d', `funeral_region` = '$e',`funeral_month` = '$f',
        `funeral_location` = '$g' ,`updatedby` = '$h' , `update_date` = '$i' WHERE `funeral_id` = '$j'";
		//return the executed query
	    return $this->db_query($sql);
	}

	


	//a method to delete a course
	public function delete_funeral_mthd($a){
		//write a query
		$sql = "DELETE FROM `funerals` WHERE `funeral_id` = '$a'";

		//return the executed query
		return $this->db_query($sql);
	}


	public function getFuneralById($id){
        
        //wrting of query
		$sql = "SELECT * FROM `funerals` WHERE `funeral_id`='$id'";

		//run the sql execution

		return $this->db_query($sql);



	}

}

?>