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
    $funeralname = $_POST['funeralname'];
    $fmember = $_POST['fmember'];
    $dgroup = $_POST['dgroup'];
    $dof = $_POST['dof'];
    $funeralloc= $_POST['funeralloc'];
	$region = $_POST['region'];
    $famonth = $_POST['famonth'];

    $adminuser_id =  $_SESSION['user']['ID'];
	$adminuser_name =  $_SESSION['user']['Username'];

		//open the connection and gets the ID of the added member and shows it to them

        global $conn;

		$conn = mysqli_connect('localhost','root','','koforiduabwc');

		$sql="SELECT funeral_name  FROM `funerals` WHERE `funeral_name` = '$funeralname'";


		//global $memberid;

        //first sql
        $result = $conn->query($sql);

        if($fmember == "Member" AND $dgroup == "Not Applicable")
        {
            echo "<script type='text/javascript'>
                    Swal.fire({
                        icon: 'error',
                        title: 'Funeral Added Failed',
                        text: 'Please check entry again Eg. If the deceased is a member, Not Applicable is not valid',
                    });
                  </script>";

        }
        else if($fmember == "Not a Member" AND ($dgroup == "Adom" OR $dgroup == "Second Chance"  ))
        {
            echo "<script type='text/javascript'>
            Swal.fire({
                icon: 'error',
                title: 'Funeral Added Failed',
                text: 'Please check entry again Eg. If the deceased is not a member, Not Applicable is valid',
            });
          </script>";

        }
		else if(($result->num_rows != 0))
             {

				echo "<script type='text/javascript'>
                    Swal.fire({
                        icon: 'error',
                        title: 'Funeral Already Added',
                        text: 'Please check Funeral Events Tab to view $funeralname event',
                    });
                  </script>";        
					
            }
            else if($result->num_rows == 0){

                $sql_insert = "INSERT INTO funerals (funeral_name,funeral_date,deceased_status,deceased_group,funeral_region,funeral_month,funeral_location,adminid,addedby) VALUES ('".$funeralname."','".$dof."','".$fmember."','".$dgroup."','".$region."', '".$famonth."',
                '".$funeralloc."','".$adminuser_id."','".$adminuser_name."') ";   

                if (mysqli_query($conn, $sql_insert) === TRUE) {
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: '$funeralname Added',
                            text: 'Check Funeral Event Tab to other details',
                        });</script>";
                } else {
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: Funeral Addition Failed, Try Again',
                        });<script>";
                }

            }
            

?>