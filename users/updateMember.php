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
    $mid = $_POST['mid'];
    $mfname= $_POST['mfname'];
    $mlname= $_POST['mlname'];
    $mcontact= $_POST['mcontact'];
    $mgroup = $_POST['mgroup'];
    $mdate = $_POST['mdate'];

    $adminuser_id =  $_SESSION['user']['ID'];
	$adminuser_name =  $_SESSION['user']['Username'];

		//open the connection and gets the ID of the added member and shows it to them

        global $conn;

		$conn = mysqli_connect('localhost','root','','koforiduabwc');

		$sql_update="Update `members` SET `memberid` = '$mid', `firstname` = '$mfname' , `lastname` = '$mlname' ,
        `contact` = '$mcontact' , `grouptype` = '$mgroup', `updatedby` = '$adminuser_name', `update_date` = '$mdate' WHERE `memberid` = '$mid'";


		//global $memberid;

        //first sql
        $result = $conn->query($sql_update);

        if ($result === TRUE) {
            echo "<script>Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: 'Member $mid details have been updated',
            });</script>";
        } else {
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Member $mid details have not been updated, Try Again',
            });<script>";
        }
?>