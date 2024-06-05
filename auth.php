<?php

require_once "./includes/db-con.php";

if (!isset($_SESSION['login'])  || $_SESSION['login'] == false) {
    echo("login now");
} else {
    $sel_sql = "SELECT * FROM patients WHERE id='$_SESSION[user_id]' ";
    $result = mysqli_query($con, $sel_sql);

    $patient_row = mysqli_fetch_assoc($result);
   

}
