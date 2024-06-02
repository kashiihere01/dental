<?php


require_once("./db-con.php");
require_once "./includes/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get data from form...
  
    $service = $_POST['service'];
    

    $id = $_POST['id'];
   
    // check if image is update or not
    if (empty($_FILES['new_image']['name'])) {
        $name = $_POST['old_image'];
    } else {
        $data = uploadImage("services", $_FILES['new_image'], 3, "our-services");

        if ($data['errors'] === false) {
            $name = $data['result'];
        }
    }

    // update qry run here....

    $query = "UPDATE `services` SET `service`='$service',
 `image`='$name' WHERE `id`='$id'";

    if (mysqli_query($con, $query)) {

        $_SESSION['success'] = "Category has been added successfully...!";
        header("Location:our-services.php");
    } else {
        $_SESSION['error'] = "Category has not been updated...!";
        header("Location:our-services.php");
    }
}


//exit;
