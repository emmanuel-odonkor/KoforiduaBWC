<?php 

    include('../functions.php');
    if(!isAdmin()){
        $_SESSION['msg'] = "You must log in first";
        header('location: ../index.php');
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['user']);
        header('location:../index.php');
    }

    //grab form data and stores them in variables
    $fid = $_POST['fid'];
    $funeralname= $_POST['funeralname'];
    $dof= $_POST['dof'];
    $dgroup= $_POST['dgroup'];
    $fmember = $_POST['fmember'];
    $region = $_POST['region'];
    $month = $_POST['month'];
    $funeralloc = $_POST['funeralloc'];

    $adminuser_id =  $_SESSION['user']['ID'];
	$adminuser_name =  $_SESSION['user']['Username'];

		//open the connection and gets the ID of the added member and shows it to them

        global $conn;

		$conn = mysqli_connect('localhost','root','','koforiduabwc');

		$sql_update="Update `funerals` SET `funeral_id` = '$fid', `funeral_name` = '$funeralname' , `funeral_date` = '$dof' ,
        `deceased_group` = '$dgroup' , `deceased_status` = '$fmember', `funeral_region` = '$region',`funeral_month` = '$month',
        `funeral_location` = '$funeralloc' ,`updatedby` = '$adminuser_name' WHERE `funeral_id` = '$fid'";


		//global $memberid;

        //first sql
        $result = $conn->query($sql_update);

        if ($result === TRUE) {
            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: '$funeralname event details have been updated',
            });</script>";
        } else {
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '$funeralname event details have not been updated, Try Again',
            });<script>";
        }
?>