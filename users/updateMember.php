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

		$sql="Update `members` SET `memberid` = '$mid', `firstname` = '$mfname' , `lastname` = '$mlname' ,
        `contact` = '$mcontact' , `grouptype` = '$mgroup' WHERE `memberid` = '$mid'";


		//global $memberid;

        //first sql
        $result = $conn->query($sql);


		if(($result->num_rows == 0))
             {

				echo "<script type='text/javascript'>
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Member ID or Group Type',
                        text: 'Please Member ID $mid is not a member of $mgroup Group. Please verify from user',
                    });
                  </script>";        
					
            }
            else if($result_2->num_rows == 0){

                $sql_insert = "INSERT INTO dues (grouptype,dateofpayment,amount,month,year,memberid,adminid,approvedby) VALUES ('".$mgroup."','".$mdate."', '".$amount."',
                '".$month."','".$year."', '".$mid."','".$adminuser_id."','".$adminuser_name."') ";   

                if (mysqli_query($conn, $sql_insert) === TRUE) {
                    echo "<script>Swal.fire({
                        icon: 'success',
                        title: 'Successful',
                        text: 'Member $mid has now paid for the Month, $month in the year $year',
                    });</script>";
                } else {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Payment Failed, Try Again',
                    });<script>";
                }

            }
            else if($result_2->num_rows != 0)
            {
                echo "<script type='text/javascript'>
                    Swal.fire({
                        icon: 'error',
                        title: 'Dues Already Paid',
                        text: 'Member has already paid for the Month, $month in the year $year',
                    });
                  </script>";  

            }
            

?>