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
                                <h3 class="card-title">' . $memberid . '</h3>
                                <p class="card-text">' . $fname . ' ' . $lname . '</p>
								<p class="card-text">' . $grouptype . ' Group</p>
									<a data-bs-toggle="modal" href="#dues"><button type="button" class="btn btn-primary btn-block" id="button3"
										name="" style="background-color: white; border-color: white;color:#003bb3;">
										Dues Payments
									</button></a>
									<a data-bs-toggle="modal" href="#funeral" ><button type="button" class="btn btn-primary btn-block mt-3" id="button3"
										name="" style="background-color: white; border-color: white;color:#003bb3;">
										Funeral Contributions
									</button></a>
									<a href="updateMemberDetails.php"><button type="button" class="btn btn-outline btn-block mt-3" id=""
										name="" style="color: white; border-color: white">
										Update Member Registry Info
									</button></a>
                              </div>
                        </div>
                    </div>
                </div></center>';

				$conn_2 = mysqli_connect('localhost','root','','koforiduabwc');

				//write sql_2
				$sql_2 = "SELECT dues_id,memberid,month,amount,year,dateofpayment,adminnid,approvedby FROM dues WHERE memberid = '$memberid'";

				//execute sql_2
				$result_2 = $conn_2->query($sql_2);

				//check if any result was returned
				if ($result_2->num_rows > 0) 
				{
					while($row_2 = $result_2->fetch_assoc()) 
					{
						$duesid = $row_2["duesid"];
						$month= $row_2["month"];
						$amount = $row_2["amount"];
						$year = $row_2["year"];
						$dateofpayment = $row_2["dateofpayment"];
						$adminid = $row_2["adminid"];
						$approvedby = $row_2["approvedby"];

						echo '<!--Dues Payment Modal -->
						<div class="modal fade" id="dues" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
						aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-scrollable">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel"> '.$fname.' '.$lname.' ('.$grouptype.')</h5>
								<button type="button" id="close_b" class="close" data-bs-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<div class="col-lg-12">
								<div class="form-row">
									<div class="col-12">
										<div class="form-row mt-3">
											<!--Form Details(User)-->
											<div class="col-12">
												<!-- Heading-->
												<div class="form-header" style="background-color: #003bb3; border-radius: 0.2rem">
														<h6 class="mt-2 text-center">
															'.$year.' &nbsp; <i class="fa fa-money" style="color:white;" aria-hidden="true"></i>
														</h6>
												</div>
											</div>
											<!--table 2 Mobile View-->
											<div class="col-12 table-responsive mt-3">
												<table class="table table-striped align-middle table-hover table-bordered">
													<thead>
														<tr>
															<th scope="col" class="text-center"></th>
															<th scope="col" class="text-center">#</th>
															<th scope="col" class="text-center">Transaction ID</th>
															<th scope="col" class="text-center" >Status</th>
														</tr>
													</thead>
													<tbody>
														<!-- Data for Row 1 in table-->
														<tr class="accordion-toggle collapsed text-center" id="accordion1" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
															<td class="expand-button text-center"></td>
															<td>1</td>
															<td>T21104567</td>
															<td style="color:green;">Completed</td>
														</tr>

														<tr class="hide-table-padding m-auto">
															
															<td colspan="4">
																<div id="collapseOne" class="collapse in p-3">
																	<div class="col-12 drops">
																		<div class="row text-center" style="display:flex;justify-content: center;align-items: center;flex-direction: row;">
																			<label class="col-4" style="font-weight:bold;">Date:</label>
																			<label class="col-5">2022-12-20</label>
																		</div>
																		<div class="row text-center" style="display:flex;justify-content: center;align-items: center;flex-direction: row;">
																			<label  class="col-4" style="font-weight:bold;">Sender:</label>
																			<label  class="col-5">John Dye</label>
																		</div>
																		<div class="row text-center" style="display:flex;justify-content: center;align-items: center;flex-direction: row;">
																			<label class="col-4" style="font-weight:bold;">Receiver:</label>
																			<label class="col-5">Jack Dawson</label>
																		</div>
																		<div class="row text-center" style="display:flex;justify-content: center;align-items: center;flex-direction: row;">
																			<label class="col-4" style="font-weight:bold;">Amount:</label>
																			<label class="col-5">$100.00 USD</label>
																		</div>
																	</div>
																</div>
															</td>
														</tr>
														<!-- End of Data for Row 1 in table-->

													</tbody>
												</table>
											</div>
				
									</div>
									</div>
									<!--Reset-->
									<div class="col-6 mt-3">
										<button type="button" id="ureset" name="ureset" class="btn btn-outline"
											style="border-color: green;color:green;">Reset</button>
									</div>
									<!--Submit-->
									<div class="col-6 mt-3">
										<button type="submit" class="btn btn-primary btn-block" id="submitDues"
											name="uadd" style="background-color: green;border-color: green;">Pay Dues</button>
									</div>
								</div>
								</div>  
							</div>
						</div>
						</div>
						</div>
						'; 




					}

				}
				
    	}
	} 
	else 
	{
    	echo "<div class='alert alert-danger text-center mx-4' style='font-size:16px;margin:auto;'>
					<strong>Sorry!</strong> There is no member with this ID.
			  </div>";
	}
	$conn->close();
}




?>