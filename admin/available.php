<?php

include("db-con.php");
$id = $_GET["id"];

if(!empty($id)){

    $active_status = "UPDATE slots SET `status` = 1 WHERE id = '$id'";
    $active_status_run = mysqli_query($con,$active_status);

    if($active_status_run){
        header("Location:slots.php");
    }

}

?>