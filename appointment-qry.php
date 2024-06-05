<?php
session_start();
// db connection

include_once("./includes/db-con.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['slot_id']) ) {

//  echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

$date_id =$_POST['select_date'];
$doc_id =$_POST['doc_id'];
$patient_id =$_POST['patient_id'];
$slot_id =$_POST['slot_id'];    
    // echo "<pre>"; print_r($_FILES); echo "</pre>";

    // upload image
   

        // $avaible_days = ['monady','tuesday','wednesday'];

        // echo $name;
        // exit;

        $query = "INSERT INTO `appointment`(`doctor_id`, `patient_id`,`slot`, `date`,  `status`) 
            VALUES ('$doc_id','$patient_id', '$date_id' , '$slot_id'";

        if (mysqli_query($con, $query)) {
            $_SESSION['success'] = "Operation Perfomed Successfully...!";
            header("Location:slots.php");
        } else {
            $_SESSION['error'] = "Something went wrong...!";
            header("Location:slots.php");
        }
    }