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
    $duesyears = $_POST['duesyears'];

    global $conn;

    $conn = mysqli_connect('localhost','root','','koforiduabwc');

    $sql_4 = "SELECT memberid,dues_id,month,grouptype,amount,year,dateofpayment,adminid,approvedby FROM dues WHERE memberid = '$mid' AND year = '$duesyears'";

    //execute sql
    $result_4 = $conn->query($sql_4);

    echo "
    <!--table 2 Mobile View For all Payment Dues -->
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

            foreach ($conn->query($sql_4) as $row_4) {
                echo "
                <tr class='accordion-toggle collapsed text-center second' id='accordion1' data-bs-toggle='collapse' data-bs-target='#collapseTwo-$row_4[dues_id]' aria-expanded='true' aria-controls='collapseTwo'>
                    <td class='expand-button text-center'></td>
                    <td>$row_4[month]</td>
                    <td style='color:green;'>$row_4[amount].00</td>
                    <td>$row_4[year]</td>
                </tr>";
            
            
                echo "
                <tr class='hide-table-padding m-auto'>
                    <!--<td></td>-->
                    <td colspan='4'>
                        <div id='collapseTwo-$row_4[dues_id]' class='collapse in p-3'>
                            <div class='col-12'>
                                <div class='row' id='drop1' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
                                    <label class='col-4' style='font-weight:bold;text-align: right;padding-left: 0;'>Dues ID:</label>
                                    <label class='col-5' style='text-align: left;' >$row_4[dues_id]</label>
                                </div>
                                <div class='row' id='drop1' style='display:flex;justify-content: center;align-items: center;flex-direction: row;'>
                                    <label class='col-4' style='font-weight:bold;text-align: right;padding-left: 0;'>Date:</label>
                                    <label class='col-5' style='text-align: left;' >$row_4[dateofpayment]</label>
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