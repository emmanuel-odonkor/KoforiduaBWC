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

    $tid = $_POST['tid'];
    $total = $_POST['total'];

    global $conn;

    $conn = mysqli_connect('localhost','root','','koforiduabwc');

    $sql = "SELECT SUM(amount) as total_sum from `dues` WHERE memberid = '$tid' AND year = '$total'";

    //execute sql
    $result = $conn->query($sql);

    
        $result = mysqli_query($conn, $sql); 
        $row = mysqli_fetch_assoc($result); 
        $sum = $row['total_sum'];
        echo "GHC ".$sum.".00";

														

?>