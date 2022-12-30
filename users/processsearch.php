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
	$sql = "SELECT memberid,firstname,lastname,contact,grouptype FROM members WHERE memberid LIKE '%$shterm%'";


	//execute sql
	$result = $conn->query($sql);

	//check if any result was returned
	if ($result->num_rows > 0) {


		//looping - output data of each row
		while ($row = $result->fetch_assoc()) {

			$memberid = $row["memberid"];
			$fname = $row["firstname"];
			$lname = $row["lastname"];
			$contact = $row["contact"];
			$grouptype = $row["grouptype"];

			echo '<center><div class="card-rows">

                <div class="col-12 d-flex justify-content-center mb-5">
                    <div class="cardnew" style="background-color:#003bb3; color: white;">
                        <div class="card-block">
						';
			echo '<div class="card-body text-center">
								<h3 class="card-title">' . $memberid . '</h3>
								<p class="card-text">' . $fname . ' ' . $lname . '</p>
								<p class="card-text">' . $contact .'</p>
								<p class="card-text">' . $grouptype . ' Group</p>
								<a data-bs-toggle="modal" href="#dues"><button type="button" class="btn btn-primary btn-block" id="button3"
									name="" style="background-color: white; border-color: white;color:#003bb3;">
										Dues Payments
								</button></a>
								<a data-bs-toggle="modal" href="#funeral" ><button type="button" class="btn btn-outline btn-block mt-3" id="button3"
									name="" style="color: white; border-color: white">
										Funeral Contributions
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

			$sql_5 = "SELECT distinct deceased_status FROM funeral_contributions WHERE memberid = '$memberid'";
			//execute sql
			$result_5 = $conn->query($sql_5);

			$sql_6 = "SELECT memberid,contribution_id,funeral_name,grouptype,deceased_status,amount,contribution_date,month,adminid,approvedby FROM funeral_contributions WHERE memberid = '$memberid'";
			//execute sql
			$result_6 = $conn->query($sql_6);
			

			//Modal Code to show Dues Payments
			echo "
						<div class='modal fade' id='dues' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1'
						aria-labelledby='staticBackdropLabel' aria-hidden='true'>
						<div class='modal-dialog modal-dialog-scrollable'>
							<div class='modal-content'>
							<div class='modal-header'>
								<h5 class='modal-title' id='staticBackdropLabel'> $fname $lname ($grouptype) </h5>
								<button type='button' id='fclose_b' class='close' data-bs-dismiss='modal'>&times;</button>
							</div>
							<div class='modal-body' id='modalbody'>
								<div class='col-lg-12 p-0'>
								<div class='form-row'>
									<!--Form Details-->
									<div class='col-12'>
										<!--Start of dues section form-->
										<div class='form-row mt-3'>
			
										<div class='col-12'>
											<div class='form-header modalhead' style='background-color: #003bb3; border-radius: 0.2rem'>
												<h6 class='mt-2 text-center modaltext'>
														Dues Payments&nbsp; <i class='fa fa-money' style='color:white;' aria-hidden='true'></i>
												</h6>		
											</div>
											<div class='alert alert-danger text-center mt-1' id='error' style='display:none;'>
												Please enter a payment year
											</div>

											<!--Choose Year -->
											<form id='yearsform' action='/' method='POST' enctype='multipart/form-data'>
											<div class='row'>
												<div class='col-8 mt-3'>
													<select id='duesyears' name='duesyears' placeholder='Choose Dues Payment Year' class='form-control'
													required>
													<option name='' value='nothing' style='display:none;'>Choose Dues Payment Year</option>";
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
												<div class='col-1 mt-2 mx-0'>
													<button type='submit' class='btn btn-primary' id='submitYear'
														name='yadd' style='color:white;background-color: blue;
														border:none;min-width:0;min-height:0;'>Search</button>
												</div>

											</div>
												<div class='col-6'>
													<div class='form-group'>
														<input type='text' pattern='[0-9]+' title='Enter a valid member ID'
															class='form-control' placeholder='Enter the Member ID' required='required' id='mid'
															name='mid' value='$memberid' style='font-size: 16px;height: 50px;' style='width: 200px;' hidden>
													</div> 
												</div>			
											</form>

											<script type='text/javascript'>
														
											$(document).ready(function(){

												$('#yearsform').on('submit',function(e) {
									
													var text = document.getElementById('duesyears');
													var value = text.options[text.selectedIndex].value;

													if(value == 'nothing')
													{
														
														$('#error').show();
														setTimeout(function () {
															$('#error').hide();
														}, 5000);
													}
													else{

														$.ajax({
															type: 'POST',
															url: 'yprocess.php',
															data: $('#yearsform').serialize(),
															success: function(result){
																
																$('#tableData').html(result)
															}
														})

													}
									
													e.preventDefault();
									
												});
									
											})
											
											</script>
											<!--End of Choose Year -->

										<!--table 2 Mobile View For all Payment Dues -->
										<div class='table-responsive' id='tableData'>
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

								<!--When All Years is Chosen -->
								<form id='allYears' action='/' method='POST' enctype='multipart/form-data'>
									<div class='col-6'>
										<div class='form-group'>
											<input type='text' pattern='[0-9]+' title='Enter a valid member ID'
												class='form-control' placeholder='Enter the Member ID' required='required' id='mid'
												name='mid' value='$memberid' style='font-size: 16px;height: 50px;' style='width: 200px;' hidden>
										</div> 
									</div>
									<div class='col-8 mt-3 p-0 chooseyear'>
										<div class='form-group'>
										<select id='allYears' name='allYears' placeholder='Choose Dues Payment Year' class='form-control'
										required hidden>
										<option name='' value= style='display:none;'>Choose Dues Payment Year</option>
										<option value='All'>All Years</option>
										</select>
									</div>
								</div>
								<div class='row'>
									<div class='col-6'>
										<button type='submit' class='btn btn-outline' id='submitYear'
										name='aadd' style='background-color: white;color:green;border-color: green;'>All Years</button>
									</div>
									<div class='col-6'>
									<button data-bs-toggle='modal' data-bs-target='#total' type='button' class='btn btn-primary pay_2'
									style='background-color:green;border-color: green;'>Total Dues Paid </button>
									</div>
								</div>
								</form>

								<script>				
									$(document).ready(function(){

										$('#allYears').on('submit',function(e) {
									
											$.ajax({
												type: 'POST',
												url: 'allYearsprocess.php',
												data: $('#allYears').serialize(),
												success: function(result){
													$('#tableData').html(result)
												}
											})
											e.preventDefault();
										});
									
									})
											
								</script>

								</div>
							
							</div>
						</div>

						</div>
						
						</div>	
						
						";

						//End of Dues Payments

						//Modal form for Total Dues Paid
						echo "
						<div class='modal fade' id='total' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1'
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
														Total Dues Paid&nbsp; <i class='fa fa-money' style='color:white;' aria-hidden='true'></i>
												</h6>		
											</div>
											<div class='alert alert-danger text-center mt-1' id='error' style='display:none;'>
												Please enter a year to check Total
											</div>

											<!--Choose Year -->
											<form id='totalform' action='/' method='POST' enctype='multipart/form-data'>
												<div class='row col-12 mt-4' style='justify-centent: center;align-items:center;'>
													<div class='col-8 mt-2'>
														<select id='total' name='total' placeholder='Choose Dues Payment Year' class='form-control'
														required title='Please enter a year to check Total'>
														<option name='' value='' style='display:none;'>Choose Year</option>";
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
													<div class='col-1 mt-2 mx-0'>
														<button type='submit' class='btn btn-primary' id='totalYear'
															name='tadd' style='color:white;background-color: blue;
															border:none;min-width:0;min-height:0;'>Total</button>
													</div>

												</div>
												<div class='col-6'>
													<div class='form-group'>
														<input type='text' pattern='[0-9]+' title='Enter a valid member ID'
															class='form-control' placeholder='Enter the Member ID' required='required' id='tid'
															name='tid' value='$memberid' style='font-size: 16px;height: 50px;' style='width: 200px;' hidden>
													</div> 
												</div>			
											</form>

											<script type='text/javascript'>
														
											$(document).ready(function(){

												$('#totalform').on('submit',function(e) {


														$.ajax({
															type: 'POST',
															url: 'tprocess.php',
															data: $('#totalform').serialize(),
															success: function(result){
																
																$('.totaltext').html(result)
															}
														})

														e.preventDefault();	
									
												});
									
											})
											
											</script>
											<!--End of Choose Year -->
											<div class='form-header totalhead' style='background-color: green; border-radius: 0.2rem'>
												<h4 class='mt-2 text-center totaltext'>
														Results is shown here
												</h4>		
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

								<!--When All Years is Chosen -->
								<form id='allYearsDues' action='/' method='POST' enctype='multipart/form-data'>
									<div class='col-6'>
										<div class='form-group'>
											<input type='text' pattern='[0-9]+' title='Enter a valid member ID'
												class='form-control' placeholder='Enter the Member ID' required='required' id='mid'
												name='mid' value='$memberid' style='font-size: 16px;height: 50px;' style='width: 200px;' hidden>
										</div> 
									</div>
									<div class='col-8 mt-3 p-0 chooseyear'>
										<div class='form-group'>
										<select id='allYears' name='allYears' placeholder='Choose Dues Payment Year' class='form-control'
										required hidden>
										<option name='' value= style='display:none;'>Choose Dues Payment Year</option>
										<option value='All'>All Years</option>
										</select>
									</div>
								</div>
								<div class='row'>
									<div class='col-6'>
										<button type='submit' class='btn btn-outline' id='DuesYear'
										name='aadd' style='background-color: white;color:green;border-color: green;'>All Years Total</button>
									</div>
									<div class='col-6'>
									<button id='stepone' data-bs-dismiss='modal' data-bs-toggle='modal' data-bs-target='#dues' type='button' class='btn btn-outline pay_2'
									style='background-color:green;border-color: green;color:white;'>Previous</button>
									</div>
								</div>
								</form>

								<script>				
									$(document).ready(function(){

										$('#allYearsDues').on('submit',function(e) {
									
											$.ajax({
												type: 'POST',
												url: 'allYearsDuesprocess.php',
												data: $('#allYearsDues').serialize(),
												success: function(result){
													$('.totaltext').html(result)
												}
											})
											e.preventDefault();
										});
									
									})
											
								</script>

								</div>
							
							</div>
						</div>

						</div>
						
						</div>	
						
						";

						//End of Dues Payment Modals

						//Beginning of Funeral Contribution
						echo "
						<div class='modal fade' id='funeral' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1'
						aria-labelledby='staticBackdropLabel' aria-hidden='true'>
						<div class='modal-dialog modal-dialog-scrollable'>
							<div class='modal-content'>
							<div class='modal-header'>
								<h5 class='modal-title' id='staticBackdropLabel'> $fname $lname ($grouptype) </h5>
								<button type='button' id='fclose_b' class='close' data-bs-dismiss='modal'>&times;</button>
							</div>
							<div class='modal-body' id='modalbody'>
								<div class='col-lg-12 p-0'>
								<div class='form-row'>
									<!--Form Details-->
									<div class='col-12'>
										<!--Start of dues section form-->
										<div class='form-row mt-3'>
			
										<div class='col-12'>
											<div class='form-header funeral_modalhead' style='background-color: #003bb3; border-radius: 0.2rem'>
												<h6 class='mt-2 text-center funeral_modaltext'>
														Funeral Contributions Payments&nbsp; <i class='fa fa-users' style='color:white;' aria-hidden='true'></i>
												</h6>		
											</div>
											<div class='alert alert-danger text-center mt-1' id='ferror' style='display:none;'>
												Please choose a category
											</div>

											<!--Choose Year -->
											<form id='funeral_form' action='/' method='POST' enctype='multipart/form-data'>
											<div class='row'>
												<div class='col-8 mt-3'>
													<select id='d_status' name='d_status' placeholder='Choose deceased status' class='form-control'
													required>
													<option name='' value='nothing' style='display:none;'>Choose Category</option>";
													foreach ($conn->query($sql_5) as $row5){
													echo "
														<option value='$row5[deceased_status]'>$row5[deceased_status]</option>";
													}
													if(($result_5->num_rows == 0))
														{
															echo "
															<option name='' value=''>No Funeral Contribution Made</option>';
															";        		
														}
													echo "</select>
												</div>
												<div class='col-1 mt-2 mx-0'>
													<button type='submit' class='btn btn-primary' id='submitYear'
														name='yadd' style='color:white;background-color: blue;
														border:none;min-width:0;min-height:0;'>Search</button>
												</div>

											</div>
												<div class='col-6'>
													<div class='form-group'>
														<input type='text' pattern='[0-9]+' title='Enter a valid member ID'
															class='form-control' placeholder='Enter the Member ID' required='required' id='mid'
															name='mid' value='$memberid' style='font-size: 16px;height: 50px;' style='width: 200px;' hidden>
													</div> 
												</div>			
											</form>

											<script type='text/javascript'>
														
											$(document).ready(function(){

												$('#funeral_form').on('submit',function(e) {
								
													
														$.ajax({
															type: 'POST',
															url: 'funeralAllprocess.php',
															data: $('#funeral_form').serialize(),
															success: function(result){
																
																$('#tableData_2').html(result)
															}
														})

													
									
													e.preventDefault();
									
												});
									
											})
											
											</script>
											<!--End of Choose Year -->

										<!--table 2 Mobile View For all Funeral Contributions -->
										<div class='table-responsive' id='tableData_2'>
											<table class='table table-striped table-hover table-bordered'>
												<thead class='funeral_table-heads'>
													<tr>
														<th scope='col' class='text-center'></th>
														<th scope='col' class='text-center'>Funeral Name</th>
														<th scope='col' class='text-center'>Deceased Status</th>
														<th scope='col' class='text-center' >Amount</th>
													</tr>
												</thead>
												<tbody>";

											foreach ($conn->query($sql_6) as $row6) {
												echo "
												<tr class='accordion-toggle collapsed text-center' id='accordion1' data-bs-toggle='collapse' data-bs-target='#collapseOne-$row6[contribution_id]' aria-expanded='true' aria-controls='collapseOne'>
													<td class='expand-button text-center'></td>
													<td>$row6[funeral_name]</td>
													<td>$row6[deceased_status]</td>
													<td style='color:green;'>$row6[amount].00</td>
												</tr>";
											

											
												echo "
												<tr class='hide-table-padding m-auto'>
													<!--<td></td>-->
													<td colspan='4'>
														<div id='collapseOne-$row6[contribution_id]' class='collapse in p-3'>
															<div class='col-12'>
																<div class='row' id='drop1' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
																	<label class='col-4' style='font-weight:bold;text-align: right;padding-left: 0;'>Member ID:</label>
																	<label class='col-5' style='text-align: left;' >$row6[memberid]</label>
																</div>
																<div class='row' id='drop1' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
																	<label class='col-4' style='font-weight:bold;text-align: right;padding-left: 0;'>Contri. Date:</label>
																	<label class='col-5' style='text-align: left;' >$row6[contribution_date]</label>
																</div>
																<div class='row' id='drop2' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
																	<label  class='col-4' style='font-weight:bold;text-align: right;color:#003bb3;'>Month:</label>
																	<label  class='col-5' style='text-align: left;color:#003bb3;'>$row6[month]</label>
																</div>
																<div class='row' id='drop2' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
																	<label  class='col-4' style='font-weight:bold;text-align: right;color:#003bb3;'>Admin ID:</label>
																	<label  class='col-5' style='text-align: left;color:#003bb3;'>$row6[adminid]</label>
																</div>
																<div class='row' id='drop2' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
																	<label class='col-4' style='font-weight:bold;text-align: right;color:#003bb3;'>Admin:</label>
																	<label class='col-5' style='text-align: left;color:#003bb3;'>$row6[approvedby]</label>
																</div>
																
															</div>
														</div>
													</td>
												</tr>";
											}

											
														//If Member does not have any Due payments made
													if (($result_6->num_rows == 0)) {
														echo '
														
														<script>

															$(".funeral_table-heads").hide();
															$("#funeral_modal").hide();
															$(".chooseyear").hide();
															$(".funeral_modalhead").css("background-color","red");
															$(".funeral_modaltext").show().html("No Funeral Contribution Payments Made");
	
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
							<div class='modal-footer' id='funeral_modal'>

								<div class='col-12' style='display:flex;justify-content:center;align-items:center'>

								<!--When All Years is Chosen -->
								<form id='allFunerals' action='/' method='POST' enctype='multipart/form-data'>
									<div class='col-6'>
										<div class='form-group'>
											<input type='text' pattern='[0-9]+' title='Enter a valid member ID'
												class='form-control' placeholder='Enter the Member ID' required='required' id='mid'
												name='mid' value='$memberid' style='font-size: 16px;height: 50px;' style='width: 200px;' hidden>
										</div> 
									</div>
									<div class='col-8 mt-3 p-0 chooseyear'>
										<div class='form-group'>
										<select id='allYears' name='allYears' placeholder='Choose Dues Payment Year' class='form-control'
										required hidden>
										<option name='' value= style='display:none;'>Choose Dues Payment Year</option>
										<option value='All'>All Years</option>
										</select>
									</div>
								</div>
								<div class='row'>
									<div class='col-6'>
										<button type='submit' class='btn btn-outline' id='submitYear'
										name='aadd' style='background-color: white;color:green;border-color: green;'>All Contributions</button>
									</div>
									<div class='col-6'>
									<button data-bs-toggle='modal' data-bs-target='#totalContributions' type='button' class='btn btn-primary pay_2'
									style='background-color:green;border-color: green;'>Total Contri. Paid</button>
									</div>
								</div>
								</form>

								<script>				
									$(document).ready(function(){

										$('#allFunerals').on('submit',function(e) {
									
											$.ajax({
												type: 'POST',
												url: 'allContributions.php',
												data: $('#allFunerals').serialize(),
												success: function(result){
													$('#tableData_2').html(result)
												}
											})
											e.preventDefault();
										});
									
									})
											
								</script>

								</div>
							
							</div>
						</div>

						</div>
						
						</div>	
						
						";

						//End Funeral Contribution

						//Modal form for Total Funeral Contributions Paid
						echo "
						<div class='modal fade' id='totalContributions' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1'
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
														Total Contributions Paid&nbsp; <i class='fa fa-users' style='color:white;' aria-hidden='true'></i>
												</h6>		
											</div>
											

											<!--Choose Year -->
											<form id='totalContributionsform' action='/' method='POST' enctype='multipart/form-data'>
												<div class='row col-12 mt-4' style='justify-centent: center;align-items:center;'>
													<div class='col-8 mt-2'>
														<select id='totalContrib' name='totalContrib' placeholder='Choose category' class='form-control'
														required title='Please enter a category to check Total'>
														<option name='' value='' style='display:none;'>Choose Category</option>";
														foreach ($conn->query($sql_5) as $row5){
														echo "
															<option value='$row5[deceased_status]'>$row5[deceased_status]</option>";
														}
														if(($result_5->num_rows == 0))
															{
																echo "
																<option name='' value=''>No Contribution Found</option>';
																";        		
															}
														echo "</select>
													</div>
													<div class='col-1 mt-2 mx-0'>
														<button type='submit' class='btn btn-primary' id='totalYear'
															name='tadd' style='color:white;background-color: blue;
															border:none;min-width:0;min-height:0;'>Total</button>
													</div>

												</div>
												<div class='col-6'>
													<div class='form-group'>
														<input type='text' pattern='[0-9]+' title='Enter a valid member ID'
															class='form-control' placeholder='Enter the Member ID' required='required' id='tid'
															name='tid' value='$memberid' style='font-size: 16px;height: 50px;' style='width: 200px;' hidden>
													</div> 
												</div>			
											</form>

											<script type='text/javascript'>
														
											$(document).ready(function(){

												$('#totalContributionsform').on('submit',function(e) {


														$.ajax({
															type: 'POST',
															url: 'totalContrib.php',
															data: $('#totalContributionsform').serialize(),
															success: function(result){
																
																$('.totaltext_2').html(result)
															}
														})

														e.preventDefault();	
									
												});
									
											})
											
											</script>
											<!--End of Choose Year -->
											<div class='form-header totalhead' style='background-color: green; border-radius: 0.2rem'>
												<h4 class='mt-2 text-center totaltext_2'>
														Results is shown here
												</h4>		
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

								<!--When All Years is Chosen -->
								<form id='allContribTotal' action='/' method='POST' enctype='multipart/form-data'>
									<div class='col-6'>
										<div class='form-group'>
											<input type='text' pattern='[0-9]+' title='Enter a valid member ID'
												class='form-control' placeholder='Enter the Member ID' required='required' id='mid'
												name='mid' value='$memberid' style='font-size: 16px;height: 50px;' style='width: 200px;' hidden>
										</div> 
									</div>
									<div class='col-8 mt-3 p-0 chooseyear'>
										<div class='form-group'>
										<select id='allYears' name='allYears' placeholder='Choose Dues Payment Year' class='form-control'
										required hidden>
										<option name='' value= style='display:none;'>Choose Dues Payment Year</option>
										<option value='All'>All Years</option>
										</select>
									</div>
								</div>
								<div class='row'>
									<div class='col-6'>
										<button type='submit' class='btn btn-outline' id='ContributionsYear'
										name='aadd' style='background-color: white;color:green;border-color: green;'>All Contrib. Total</button>
									</div>
									<div class='col-6'>
									<button id='stepone' data-bs-dismiss='modal' data-bs-toggle='modal' data-bs-target='#funeral' type='button' class='btn btn-outline pay_2'
									style='background-color:green;border-color: green;color:white;'>Previous</button>
									</div>
								</div>
								</form>

								<script>				
									$(document).ready(function(){

										$('#allContribTotal').on('submit',function(e) {
									
											$.ajax({
												type: 'POST',
												url: 'totalContribTotal.php',
												data: $('#allContribTotal').serialize(),
												success: function(result){
													$('.totaltext_2').html(result)
												}
											})
											e.preventDefault();
										});
									
									})
											
								</script>

								</div>
							
							</div>
						</div>

						</div>
						
						</div>	
						
						";
						//End of Total Funeral Contributions Paid			

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