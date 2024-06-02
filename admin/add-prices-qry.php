<?php
session_start();
// db connection

require_once "./db-con.php";
require_once "./includes/helpers.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // echo "<pre>"; print_r($_POST); echo "</pre>";
    // echo "<pre>"; print_r($_FILES); echo "</pre>";

    // upload image
    $data = uploadImage("pricing-plan", $_FILES['image'], 3, "prices");

    if ($data['errors'] === false) {
        // save info into db
        $name = $data['result'];

     

        // echo $name;
        // exit;

        $query = "INSERT INTO `prices`(`name`,`price`,  `image`) 
            VALUES ('$_POST[name]','$_POST[price]','$name')";

        if (mysqli_query($con, $query)) {
            $_SESSION['success'] = "Operation Perfomed Successfully...!";
            header("Location:prices.php");
        } else {
            
            $_SESSION['error'] = "Something went wrong...!";
            header("Location:prices.php");
        }
    } else {
        $_SESSION['error'] = " $data[result]";
        header("Location:prices.php");
   
    }

    exit;
}
