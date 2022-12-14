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
    $fgroup = $_POST['fgroup'];
    $dmember = $_POST['dmember'];
    $funeralname = $_POST['funeralname'];
    $fdoc = $_POST['fdoc'];
	$famount = $_POST['famount'];
    $fmonth = $_POST['fmonth'];

    $adminuser_id =  $_SESSION['user']['ID'];
	$adminuser_name =  $_SESSION['user']['Username'];

		//open the connection and gets the ID of the added member and shows it to them

        global $conn;

		$conn = mysqli_connect('localhost','root','','koforiduabwc');

		$sql="SELECT memberid,grouptype  FROM `members` WHERE `memberid` = '$fid' AND `grouptype` = '$fgroup'";

        $sql_2="SELECT memberid,funeral_name FROM `funeral_contributions` WHERE `memberid` = '$fid' AND `funeral_name` = '$funeralname'";


		//global $memberid;

        //first sql
        $result = $conn->query($sql);

        //second sql
        $result_2 = $conn->query($sql_2);


		if(($result->num_rows == 0))
             {

				echo "<script type='text/javascript'>
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Member ID or Group Type',
                        text: 'Please Member ID $fid is not a member of $fgroup Group. Please verify from user',
                    });
                  </script>";        
					
            }
            else if($result_2->num_rows == 0){

                $sql_insert = "INSERT INTO funeral_contributions (funeral_name,grouptype,deceased_status,amount,memberid,contribution_date,month,adminid,approvedby) VALUES ('".$funeralname."','".$fgroup."','".$dmember."','".$famount."', '".$fid."',
                '".$fdoc."', '".$fmonth."','".$adminuser_id."','".$adminuser_name."') ";   

                if (mysqli_query($conn, $sql_insert) === TRUE) {
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Successful',
                            text: 'Member $fid has now paid the contribution for $funeralname',
                        });</script>";
                } else {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Contribution Failed, Try Again',
                        });<script>";
                }

            }
            else if($result_2->num_rows != 0)
            {
                echo "<script type='text/javascript'>
                    Swal.fire({
                        icon: 'error',
                        title: 'Contribution Already Made',
                        text: 'Member $fid has already paid for $funeralname event',
                    });
                  </script>";  

            }
            

?>