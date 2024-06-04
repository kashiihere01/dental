<?php

session_start();
// db connection
require_once "./db-con.php";
require_once "./includes/helpers.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // upload image
    $data = uploadImage("admin-users", $_FILES['image'], 3, "add-user");

    if ($data['errors'] === false) {
        // save info into db
        $imgName = $data['result'];

        $password = $_POST['password'];

        $query = "INSERT INTO `users`(`user_name`, `user_email`, `user_city`, `about`, `password`, `user_mobile`, `description`, `user_image`) 
            VALUES ('$_POST[username]','$_POST[user_city]','$_POST[user_about]','$_POST[email]' ,'$password','$_POST[mobile]' ,'$_POST[descrption]', '$imgName')";

        if (mysqli_query($con , $query)) {
            $_SESSION['success'] = "Operation Perfomed Successfully...!";
            header("Location:add-user.php");
        } else {
            $_SESSION['error'] = "Something went wrong...!";
            header("Location:add-user.php");
        }
    } else {

        $_SESSION['imgErr'] = "Image uploading Error please Check...!";
        header("Location:add-user.php");
    }
}
