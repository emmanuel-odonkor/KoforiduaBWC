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

    $sql = "SELECT SUM(amount) as total_contributions from `funeral_contributions` WHERE memberid = '$mid'";

    //execute sql
    $result = $conn->query($sql);

    
        $result = mysqli_query($conn, $sql); 
        $row = mysqli_fetch_assoc($result); 
        $sum = $row['total_contributions'];
        echo "GHC ".$sum.".00";

														

?>