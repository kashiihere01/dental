<?php


require_once("./db-con.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get data from form...
  


    $id = $_POST['id'];
 
    $start_time= $_POST['stime'];
    $end_time = $_POST['etime'];
    $doc_name = $_POST['docname'];
    // check if image is update or not
   
    // update qry run here....

    $query = "UPDATE `doctors` SET

    `slot_start_time`='$start_time',
    `slot_end_time`='$end_time' WHERE `id`='$id'";

    if (mysqli_query($con, $query)) {

        $_SESSION['success'] = "slot has been added successfully...!";
        header("Location:slots.php");
    } else {
        $_SESSION['error'] = "slots has not been updated...!";
        header("Location:slots.php");
    }
}


//exit;
