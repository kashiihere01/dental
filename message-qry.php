<?php
session_start();
require_once("includes/db-con.php");

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['send'] === "send") {

    $name = $_POST['name'];
    $email =$_POST['email'];

    $subject = $_POST['subject'];
    $message  = $_POST['message'];
    

    // insert
    $sql = "INSERT INTO patient_messages (`name`, `email`,`subject`, `message`) VALUES('$name', '$email','$subject',  '$message') ";

    if (mysqli_query($con, $sql)) {
        $_SESSION['success'] = "Operation Perfomed Successfully...!";
        header("Location:contact.php");
    }
}
