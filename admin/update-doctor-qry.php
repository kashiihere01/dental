<?php


require_once("./db-con.php");
require_once "./includes/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get data from form...
  
    $doc_name = $_POST['docname'];
    $speciality = $_POST['speciality'];

    $id = $_POST['id'];
    $description = $_POST['description'];
    $start_time= $_POST['stime'];
    $end_time = $_POST['etime'];
    $average_time = $_POST['acheck_up'];
    // check if image is update or not
    if (empty($_FILES['new_image']['name'])) {
        $name = $_POST['old_image'];
    } else {
        $data = uploadImage("doctor", $_FILES['new_image'], 3, "view-doctors");

        if ($data['errors'] === false) {
            $name = $data['result'];
        }
    }

    // update qry run here....

    $query = "UPDATE `doctors` SET `doctor_name`='$doc_name',
    `description`='$description',
    `start_time`='$start_time',
    `end_time`='$end_time',
    `checkup_average_time`='$average_time',
    `speciality`='$speciality',`doctor_image`='$name' WHERE `id`='$id'";

    if (mysqli_query($con, $query)) {

        $_SESSION['success'] = "Category has been added successfully...!";
        header("Location:view-doctors.php");
    } else {
        $_SESSION['error'] = "Category has not been updated...!";
        header("Location:view-doctors.php");
    }
}


//exit;
