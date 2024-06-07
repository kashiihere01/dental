<?php

require_once("./db-con.php");

$get_product_id = $_GET['id'];

$product_delete_qry = "DELETE FROM patient_messages WHERE id='$get_product_id'";

if (mysqli_query($con, $product_delete_qry)) {
    session_start();
    $_SESSION['success'] = "Operation Performed Successfully...!";
    header("Location:patient_messages.php");
}
