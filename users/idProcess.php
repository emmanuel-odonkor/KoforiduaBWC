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

    $adminuser_id =  $_SESSION['user']['ID'];
	$adminuser_name =  $_SESSION['user']['Username'];

		//open the connection and gets the ID of the added member and shows it to them

        global $conn;

		$conn = mysqli_connect('localhost','root','','koforiduabwc');

        //write sql
        $sql = "SELECT memberid,firstname,lastname,contact,grouptype FROM members WHERE memberid = '$mid'";


		//global $memberid;

        //first sql
        $result = $conn->query($sql);


        if(($result->num_rows > 0))
       {
            //looping - output data of each row
             while ($row = $result->fetch_assoc()) {

                $memberid = $row["memberid"];
                $fname = $row["firstname"];
                $lname = $row["lastname"];
                $contact = $row["contact"];
               $grouptype = $row["grouptype"];

               echo "
                <script type='text/javascript'>
                    $('#idModal').modal('hide')
                    $('#updateMember').modal('show')
                </script>

                <script>
                    //sets the date to today and the future but not the past
                    const dateInput = document.getElementById('mdate');

                    // ✅ Using UTC (universal coordinated time)
                    dateInput.value = new Date().toISOString().split('T')[0];
                                                    
                    console.log(new Date().toISOString().split('T')[0]);
                </script>

               <!--Update Member Modal-->
               <form id='updateMemberform' action='/' method='POST' enctype='multipart/form-data'>
               
                               <div class='modal fade' id='updateMember' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1'
                               aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                               <div class='modal-dialog modal-dialog-scrollable'>
                                   <div class='modal-content'>
                                   <div class='modal-header'>
                                       <h5 class='modal-title' id='staticBackdropLabel'>Update Member Info</h5>
                                       <button type='button' id='close_b' class='close' data-bs-dismiss='modal'>&times;</button>
                                   </div>
                                   <div class='modal-body'>
                                       <div class='col-lg-12'>
                                       <div class='form-row'>
                                           <!--Form Details-->
                                           <div class='col-12'>
                                               <!--Start of dues section form-->
                                               <div class='form-row mt-3'>
                                                   <!--Form Details(User)-->
                                                   <div class='col-12'>
                                                       <!-- Heading-->
                                                       <div class='form-header' style='background-color: #003bb3; border-radius: 0.2rem'>
                                                               <h6 class='mt-2 text-center'>
                                                                   Update Member Information&nbsp; <i class='fa fa-pencil-square-o' style='color:white;' aria-hidden='true'></i>
                                                               </h6>
                                                       </div>
                                                   </div>
                   
                                                   <div class='col-lg-6 col-sm-6'>
                                                       <div class='form-group mt-4'>
                                                           <input type='text' pattern='[0-9]+' title='Enter a valid member ID'
                                                           class='form-control' placeholder='Enter the Member ID' required='required' id='mid'
                                                           name='mid' style='font-size: 16px;height: 50px;' value='$memberid' style='width: 200px;' readonly>
                                                           <span class='instruction' style='font-size: 11px;color:#003bb3;padding-bottom: 0px;'>Member ID must be valid</span>
                                                       </div>
                                                   </div>
                   
                                                   <div class='col-lg-6 col-sm-6'>
                                                       <div class='form-group mt-lg-4 mt-sm-4'>
                                                       <input type='text' pattern='[A-Za-z\s-]+' title='Enter a valid firstname'
                                                           class='form-control' placeholder='First Name' required='required'
                                                           value='$fname'  id='mfname' name='mfname'
                                                           style='font-size: 16px; height: 50px;' style='width: 200px' />
                                                       </div>   
                                                   </div>
       
                                                   <div class='col-lg-6 col-sm-6'>
                                                       <div class='form-group'>
                                                       <input type='text' pattern='[A-Za-z\s-]+' title='Enter a valid lastname'
                                                           class='form-control' placeholder='Last Name' value='$lname'
                                                           required='required' id='mlname' name='mlname'
                                                           style='font-size: 16px; height: 50px;' style='width: 200px' />
                                                       </div>  
                                                   </div>
       
                                                   <div class='col-lg-6 col-sm-6'>
                                                       <div class='form-group u_number'>
                                                       <input type='tel' pattern='^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$'
                                                       title='Enter a valid Phone number' class='form-control'
                                                       placeholder='Mobile Number' required='required' value='$contact'
                                                       id='u_mobile' name='mcontact' style='font-size: 16px; height: 50px' size='90' />
                                                       </div> 
                                                   </div>
                                                   <div class='col-lg-6 col-sm-6'>
                                                       <div class='form-group mt-3'>
                                                           <input type='date' title='Enter a valid date' class='form-control'
                                                           placeholder='Date' required='required' id='mdate' name='mdate'
                                                           style='font-size: 16px; height: 50px;'
                                                           style='width: 200px; font-size: medium' readonly/>
                                                           <span class='instruction' style='font-size: 11px;color:#003bb3;padding-bottom: 0px;'>Date of Update</span>	
                                                       </div>
                                                   </div>
       
                                                   <div class='col-lg-6 col-sm-6'>
                                                        <div class='form-group mt-3 member'>
                                                            <select id='grouptype' name='mgroup' placeholder='Gender' class='form-control'
                                                            style='height: 50px;' required>
                                                                <option name='' value='' style='display:none;'>Group Type (Adom or Second Chance)</option>
                                                                <option value='Adom' "; if($grouptype=='Adom') echo 'selected="selected"'; echo ">Adom Group</option>
                                                                <option value='Second Chance'"; if($grouptype=='Second Chance') echo 'selected="selected"'; echo " >Second Chance Group</option>
                                                            </select>
                                                        </div>
											        </div>

                                           </div>
                                           </div>
                                           <!--Submit-->
                                           <div class='col-12' style='display:flex;justify-content:center;align-items:center'>
                                                <div class='row text-center'>
                                                    <div class='col-lg-6 col-sm-6 mt-1'>
                                                        <button type='submit' class='btn btn-primary btn-block' id='submitUpdate'
                                                            name='uadd' style='background-color: green;border-color: green;'>Update Member</button>
                                                    </div>
                                               </div>
                                           </div>	
                                       </div>
                                       </div>  
                                   </div>
                               </div>
                               </div>
                               </div>
                               <!--End of Modal-->
                           </form>

                           <!-- Update Form Send-->
                            <script>	
                                                                        
                                $(document).ready(function(){

                                    $('#updateMemberform').on('submit',function(e) {
                                                                
                                        $.ajax({
                                            type: 'POST',
                                            url: 'updateMember.php',
                                            data: $('#updateMemberform').serialize(),
                                            success: function(result){
                                                $('#response').html(result)
                                            }
                                        })
                                            e.preventDefault();
                                });
                                                                
                            })
                                                                        
                            </script>

                            "; 


      }
       			
     } else if(($result->num_rows == 0)){
        echo "<script>
            $('#merror').show();
            setTimeout(function () {
                $('#merror').hide();
            }, 5000);
        </script>";
     }
         
?>