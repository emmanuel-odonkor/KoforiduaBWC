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
	if ($result->num_rows > 0) {


		//looping - output data of each row
		while ($row = $result->fetch_assoc()) {

			$memberid = $row["memberid"];
			$fname = $row["firstname"];
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

			//open the connection
			$conn = mysqli_connect('localhost', 'root', '', 'koforiduabwc');

			$sql_2 = "SELECT memberid,dues_id,month,grouptype,amount,year,dateofpayment,adminid,approvedby FROM dues WHERE memberid = '$memberid'";

			//execute sql
			$result_2 = $conn->query($sql_2);

			$sql_3 = "SELECT distinct year FROM dues WHERE memberid = '$memberid'";

			//execute sql
			$result_3 = $conn->query($sql_3);

			$sql_4 = "SELECT memberid,dues_id,month,grouptype,amount,year,dateofpayment,adminid,approvedby FROM dues WHERE memberid = '$memberid' AND year = '$sql_3'";

			//execute sql
			$result_4 = $conn->query($sql_4);

			echo "
						<div class='modal fade' id='dues' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1'
						aria-labelledby='staticBackdropLabel' aria-hidden='true'>
						<div class='modal-dialog modal-dialog-scrollable'>
							<div class='modal-content'>
							<div class='modal-header'>
								<h5 class='modal-title' id='staticBackdropLabel'> $fname $lname ($grouptype) </h5>
								<button type='button' id='fclose_b' class='close' data-bs-dismiss='modal'>&times;</button>
							</div>
							<div class='modal-body'>
								<div class='col-lg-12 p-0'>
								<div class='form-row'>
									<!--Form Details-->
									<div class='col-12'>
										<!--Start of dues section form-->
										<div class='form-row mt-3'>
			
										<div class='col-12'>
											<div class='form-header modalhead' style='background-color: #003bb3; border-radius: 0.2rem'>
												<h6 class='mt-2 text-center modaltext'>
														Total Dues Payment&nbsp; <i class='fa fa-calendar' style='color:white;' aria-hidden='true'></i>
												</h6>		
											</div>

											<!--Choose Year -->
											<div class='col-8 mt-3 p-0 chooseyear'>
													<div class='form-group'>
													<select id='funeralname' name='funeralname' placeholder='Choose Dues Payment Year' class='form-control'
													required>
													<option name='' value= style='display:none;'>Choose Dues Payment Year</option>";
													foreach ($conn->query($sql_3) as $row){
													echo "
														<option value='$row[year]'>$row[year]</option>";
													}
													if(($result_3->num_rows == 0))
														{
															echo "
															<option name='' value=''>No Payment Year Found</option>';
															";        		
														}
													echo "</select>
												</div>
											</div>
											<!--End of Choose Year -->
										
										

										<!--table 2 Mobile View-->
										<div class='table-responsive'>
											<table class='table table-striped table-hover table-bordered'>
												<thead class='table-heads'>
													<tr>
														<th scope='col' class='text-center'></th>
														<th scope='col' class='text-center'>Month</th>
														<th scope='col' class='text-center'>Amount</th>
														<th scope='col' class='text-center' >Year</th>
													</tr>
												</thead>
												<tbody>";

											foreach ($conn->query($sql_2) as $row_2) {
												echo "
												<tr class='accordion-toggle collapsed text-center' id='accordion1' data-bs-toggle='collapse' data-bs-target='#collapseOne-$row_2[dues_id]' aria-expanded='true' aria-controls='collapseOne'>
													<td class='expand-button text-center'></td>
													<td>$row_2[month]</td>
													<td style='color:green;'>$row_2[amount].00</td>
													<td>$row_2[year]</td>
												</tr>";
											

											
												echo "
												<tr class='hide-table-padding m-auto'>
													<!--<td></td>-->
													<td colspan='4'>
														<div id='collapseOne-$row_2[dues_id]' class='collapse in p-3'>
															<div class='col-12'>
																<div class='row' id='drop1' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
																	<label class='col-4' style='font-weight:bold;text-align: right;padding-left: 0;'>Dues ID:</label>
																	<label class='col-5' style='text-align: left;' >$row_2[dues_id]</label>
																</div>
																<div class='row' id='drop1' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
																	<label class='col-4' style='font-weight:bold;text-align: right;padding-left: 0;'>Date:</label>
																	<label class='col-5' style='text-align: left;' >$row_2[dateofpayment]</label>
																</div>
																<div class='row' id='drop2' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
																	<label  class='col-4' style='font-weight:bold;text-align: right;color:#003bb3;'>Admin ID:</label>
																	<label  class='col-5' style='text-align: left;color:#003bb3;'>$row_2[adminid]</label>
																</div>
																<div class='row' id='drop2' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
																	<label class='col-4' style='font-weight:bold;text-align: right;color:#003bb3;'>Admin:</label>
																	<label class='col-5' style='text-align: left;color:#003bb3;'>$row_2[approvedby]</label>
																</div>
																
															</div>
														</div>
													</td>
												</tr>";
											}

											
														//If Member does not have any Due payments made
													if (($result_2->num_rows == 0)) {
														echo '
														
														<script>

															$(".table-heads").hide();
															$(".modal-footer").hide();
															$(".chooseyear").hide();
															$(".modalhead").css("background-color","red");
															$(".modaltext").show().html("No Dues Payments Made");
	
														</script>
														
														';
	
												}

											echo "
											</tbody>
										</table>
									</div>
						

										</div>

									
									</div>
									</div>
								</div>
								</div>  
							</div>
							<!--Modal Footer -->
							<div class='modal-footer'>

								<div class='col-12' style='display:flex;justify-content:center;align-items:center'>
								
									<button id='stepone' type='button' class='btn btn-outline'
										style='background-color:white;color:green;border-color: green; visibility:hidden;'>Payed</button>
									<button id='stepone' type='button' class='btn btn-primary pay_2'
										style='background-color:green;border-color: green;'>Total Dues Paid </button>
								</div>
							
							</div>
						</div>

						</div>
						
						</div>	
						
						";


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