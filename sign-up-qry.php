<?php
require_once("./includes/db-con.php");

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['signup'] === "signup") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
$city=$_POST['city'];

    $password  = $_POST['password'];
    if ($email == "" || $password == "") {
        $_SESSION['error'] = "All feilds are requireds...!";
        header("Location:register.php");
        exit;
    }
    // verify username should be unique
    $select_q = "SELECT * FROM patients WHERE name='$name' ";
    $result = mysqli_query($con, $select_q);

    if (mysqli_num_rows($result)  === 1) {
        $_SESSION['error'] = "Invalid Credentials...!";
        header("Location:signup.php");
        exit;
    }
    $select_e = "SELECT * FROM patients WHERE email='$email' ";
    $result = mysqli_query($con, $select_e);

    if (mysqli_num_rows($result)  === 1) {
        $_SESSION['error'] = "User Already exists...!";
        header("Location:signup.php");
        exit;
    }
    // insert
    $sql = "INSERT INTO patients (`name`, `email`, `password` , `city`) 
    VALUES('$name', '$email', '$password' , '$city') ";

    if (mysqli_query($con, $sql)) {
      
       
        $_SESSION['success'] = "Operation perform Successfully...!";
        header("Location:index.php");
        exit;
    
    }
}
