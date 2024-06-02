<?php
session_start();
// db connection

require_once "./db-con.php";
require_once "./includes/helpers.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // echo "<pre>"; print_r($_POST); echo "</pre>";
    // echo "<pre>"; print_r($_FILES); echo "</pre>";

    // upload image
    $data = uploadImage("doctor", $_FILES['image'], 3, "view-doctors");

    if ($data['errors'] === false) {
        // save info into db
        $name = $data['result'];

        $avaible_days = ['monady','tuesday','wednesday'];

        // echo $name;
        // exit;

        $query = "INSERT INTO `doctors`(`doctor_name`, `speciality`, `start_time`, `end_time`,  `working_days`, `checkup_average_time`,  `doctor_image`, `description`) 
            VALUES ('$_POST[docname]','$_POST[speciality]' ,'$_POST[stime]','$_POST[etime]','$_POST[acheck_up]','$name','$_POST[description]') ";

        if (mysqli_query($con, $query)) {
            $_SESSION['success'] = "Operation Perfomed Successfully...!";
            header("Location:doctors.php");
        } else {
            $_SESSION['error'] = "Something went wrong...!";
            header("Location:doctors.php");
        }
    } else {

        echo  "<div class='alert alert-danger mt-2 uploadingErr'> $data[result]</div>";
    }

    exit;
}
