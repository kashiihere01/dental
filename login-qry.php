<?php

session_start();

require_once "./includes/db-con.php";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    // verify inputs are correct ?

    if ($email == "" || $password == "") {
        $_SESSION['error'] = "All feilds are requireds...!";
        header("Location:login.php");
        exit;
    }

    // verify user is exist ?
    $sel_sql = "SELECT * FROM patients WHERE email='$email' ";
    $exists = mysqli_query($con, $sel_sql);

    if (mysqli_num_rows($exists) === 0) {
        $_SESSION['error'] = "Invalid Credentials...!";
        header("Location:login.php");
        exit;
    }

    // if user exists then verify its password is correct ?
    $user = mysqli_fetch_assoc($exists);

    // if (password_verify($password, $user['password']) === false) {
    //     die("invalid credentials");
    // }
    if ($password != $user['password']) {
        $_SESSION['invalid'] = "Invalid Credentials...!";
        header("Location:login.php");
        exit;
    } else {
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $user['id'];

        header("Location:index.php");
    }
}
