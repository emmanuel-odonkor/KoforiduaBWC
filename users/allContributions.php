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

    $mid = $_POST['mid'];

    global $conn;

    $conn = mysqli_connect('localhost','root','','koforiduabwc');

    $sql_4 = "SELECT memberid,contribution_id,funeral_name,grouptype,deceased_status,amount,contribution_date,month,adminid,approvedby FROM funeral_contributions WHERE memberid = '$mid'";

    //execute sql
    $result_4 = $conn->query($sql_4);

    echo "
    <!--table 2 Mobile View For all Payment Dues -->
    <div class='table-responsive'>
        <table class='table table-striped table-hover table-bordered'>
            <thead class='table-heads'>
                <tr>
                    <th scope='col' class='text-center'></th>
                    <th scope='col' class='text-center'>Funeral Name</th>
					<th scope='col' class='text-center'>Deceased Status</th>
					<th scope='col' class='text-center' >Amount</th>
                </tr>
            </thead>
            <tbody>";

            foreach ($conn->query($sql_4) as $row_4) {
                echo "
                <tr class='accordion-toggle collapsed text-center second' id='accordion1' data-bs-toggle='collapse' data-bs-target='#collapseTwo-$row_4[contribution_id]' aria-expanded='true' aria-controls='collapseTwo'>
                    <td class='expand-button text-center'></td>
                    <td>$row_4[funeral_name]</td>
					<td>$row_4[deceased_status]</td>
					<td style='color:green;'>$row_4[amount].00</td>
                </tr>";
            
            
                echo "
                <tr class='hide-table-padding m-auto'>
                    <!--<td></td>-->
                    <td colspan='4'>
                        <div id='collapseTwo-$row_4[contribution_id]' class='collapse in p-3'>
                            <div class='col-12'>
                                <div class='row' id='drop1' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
									<label class='col-4' style='font-weight:bold;text-align: right;padding-left: 0;'>Member ID:</label>
									<label class='col-5' style='text-align: left;' >$row_4[memberid]</label>
								</div>
								<div class='row' id='drop1' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
									<label class='col-4' style='font-weight:bold;text-align: right;padding-left: 0;'>Contri. Date:</label>
									<label class='col-5' style='text-align: left;' >$row_4[contribution_date]</label>
							    </div>
								<div class='row' id='drop2' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
									<label  class='col-4' style='font-weight:bold;text-align: right;color:#003bb3;'>Month:</label>
									<label  class='col-5' style='text-align: left;color:#003bb3;'>$row_4[month]</label>
								</div>
								<div class='row' id='drop2' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
									<label  class='col-4' style='font-weight:bold;text-align: right;color:#003bb3;'>Admin ID:</label>
									<label  class='col-5' style='text-align: left;color:#003bb3;'>$row_4[adminid]</label>
								</div>
								<div class='row' id='drop2' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
									<label class='col-4' style='font-weight:bold;text-align: right;color:#003bb3;'>Admin:</label>
									<label class='col-5' style='text-align: left;color:#003bb3;'>$row_4[approvedby]</label>
								</div>  
                            </div>
                        </div>
                    </td>
                </tr>";
            }

        echo "
        </tbody>
    </table>
    "

?>