<?php
session_start();
require_once "db-con.php";

if (!isset($_SESSION['login'])  || $_SESSION['login'] == false) {
    header("location: auth-login.php");
} else {
    $sel_sql = "SELECT * FROM users WHERE id='$_SESSION[user_id]' ";
    $result = mysqli_query($con, $sel_sql);

    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_image'] = $row['user_image'];
    $_SESSION['user_city'] = $row['user_city'];
    $_SESSION['user_about'] = $row['user_about'];
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['user_email'] = $row['user_email'];
    $_SESSION['user_mobile'] = $row['user_mobile'];
    $_SESSION['user_description'] = $row['description'];
    $_SESSION['user_role'] = $row['role'];

}
