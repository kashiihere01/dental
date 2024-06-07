<?php

require_once("./db-con.php");

$get_cat_id = $_GET['id'];

$category_delete_qry = "DELETE FROM doctors WHERE id='$get_cat_id'";

if (mysqli_query($con, $category_delete_qry)) {

    $product_delete_qry = "DELETE FROM slots WHERE doctor_id='$get_cat_id'";

    if (mysqli_query($con, $product_delete_qry)) {
        session_start();
        $_SESSION['success'] = "Operation Performed Successfully...!";
        header("Location:inbox.php");
    }
}
