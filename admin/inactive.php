<?php

include("db-con.php");
$id = $_GET["id"];

if(!empty($id)){

    $active_status = "UPDATE users SET `user_status` = `inactive` WHERE id = '$id'";
    $active_status_run = mysqli_query($con,$active_status);

    if($active_status_run){
        header("Location:view-users.php");
    }

}

?>