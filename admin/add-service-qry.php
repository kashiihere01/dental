<?php
session_start();
// db connection

require_once "./db-con.php";
require_once "./includes/helpers.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // echo "<pre>"; print_r($_POST); echo "</pre>";
    // echo "<pre>"; print_r($_FILES); echo "</pre>";

    // upload image
    $data = uploadImage("services", $_FILES['image'], 3, "our-services");

    if ($data['errors'] === false) {
        // save info into db
        $name = $data['result'];

     

        // echo $name;
        // exit;

        $query = "INSERT INTO `services`(`service`, `image`) 
            VALUES ('$_POST[service]','$name')";

        if (mysqli_query($con, $query)) {
            $_SESSION['success'] = "Operation Perfomed Successfully...!";
            header("Location:our-services.php");
        } else {
            
            $_SESSION['error'] = "Something went wrong...!";
            header("Location:our-services.php");
        }
    } else {

        echo  "<div class='alert alert-danger mt-2 uploadingErr'> $data[result]</div>";
    }

    exit;
}
