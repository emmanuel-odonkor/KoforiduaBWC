<?php 

    //grab form data and stores them in variables
    $mid = $_POST['mid'];
    $mgroup = $_POST['mgroup'];
	$amount = $_POST['amount'];
    $month = $_POST['month'];

		//open the connection and gets the ID of the added member and shows it to them
		$conn = mysqli_connect('localhost','root','','koforiduabwc');

		$sql="SELECT memberid  FROM `members` WHERE `memberid` = '$mid'";

		//global $memberid;

        $result = $conn->query($sql);

		if($result->num_rows == 0)
             {

				echo "<script type='text/javascript'>
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Member ID',
                        text: 'Please Member ID $mid does not exist. Enter a valid ID',
                    });
                  </script>";        
					
            }
            else{
                echo "<script>
                        alert('Success');
                  </script>";

                 

            }

?>