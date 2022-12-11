<?php

//check if form is submitted

	//Get form data
	$searchterm = $_POST['sterm'];
	# execute the function
	ajaxsearch($searchterm);

function ajaxsearch($shterm)
{
	//database connection variables
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "koforiduabwc";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	} 

	//write sql
	$sql = "SELECT memberid,firstname,lastname,grouptype FROM members WHERE memberid LIKE '%$shterm%'";

	//execute sql
	$result = $conn->query($sql);

	//check if any result was returned
	if ($result->num_rows > 0) 
	{
    	//looping - output data of each row
    	while($row = $result->fetch_assoc()) 
    	{

                    $memberid = $row["memberid"];
                    $fname= $row["firstname"];
                    $lname = $row["lastname"];
                    $grouptype = $row["grouptype"];


                
                echo '<center><div class="card-rows">

                <div class="col-12 d-flex justify-content-center mb-5">
                    <div class="cardnew" style="background-color:#003bb3; color: white;">
                        <div class="card-block">
						';
                            echo '<div class="card-body text-center">
                                <h3 class="card-title">'.$memberid.'</h3>
                                <p class="card-text">'.$fname.' '.$lname.'</p>
								<p class="card-text">'.$grouptype.' Group</p>
									<a href="viewMember.php"><button type="button" class="btn btn-primary btn-block" id="button3"
										name="" style="background-color: white; border-color: white;color:#003bb3;">
										Dues and Funeral Contributions
									</button></a>
									<a href="updateMemberDetails.php"><button type="button" class="btn btn-outline btn-block mt-3" id=""
										name="" style="color: white; border-color: white">
										Update Member Registry Info
									</button></a>
                              </div>
                        </div>
                    </div>
                </div></center>
                '; 
    	}
	} 
	else 
	{
    	echo "<div class='alert alert-danger text-center mx-4' style='font-size:16px;margin:auto;'>
					<strong>Sorry!</strong> There are no member with this ID
			  </div>";
	}
	$conn->close();
}




?>