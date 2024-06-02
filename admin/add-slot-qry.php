<?php
session_start();

require_once "./db-con.php";



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // echo "<pre>"; print_r($_POST); echo "</pre>";
    // echo "<pre>"; print_r($_FILES); echo "</pre>";

    // upload image
    

        // echo $name;
        // exit;

        $query = "INSERT INTO `slots`(`slot_start_time`,`slot_end_time`, `doctor_id`) 
            VALUES ('$_POST[stime]','$_POST[etime]','$_POST[docname]')";

        if (mysqli_query($con, $query)) {
            $_SESSION['success'] = "Operation Perfomed Successfully...!";
            header("Location:slots.php");
        } else {
            
            $_SESSION['error'] = "Something went wrong...!";
            header("Location:slots.php");
        }
    } 

    else {
            
        $_SESSION['error'] = "Something went wrong...!";
        header("Location:slots.php");
    }
