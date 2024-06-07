<?php
session_start();
// db connection

include_once("./includes/db-con.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['slot_id']) ) {

//  echo "<pre>"; print_r($_POST); echo "</pre>"; exit;

$date_id =$_POST['select_date'];

$doc_id =$_POST['doc_id'];

$slot_id =$_POST['slot_id']; 
 $patient_id=$_SESSION['user_id'];   
   

        $query = "INSERT INTO `appointment`(`doctor_id`, `date`,`slot`,`patient_id` , `status`) 
            VALUES ('$doc_id', '$date_id' , '$slot_id','$patient_id' , 'booked')";
// echo "$query";
//  exit;
        if (mysqli_query($con, $query)) {
//              echo "$query";
//  exit;
//echo("successfully submit");
$_SESSION['success'] = "Operation perform Successfully...!";
header("Location:index.php");
exit;

        } else {
            $_SESSION['error'] = "Something went wrong...!";
            header("Location:index.php");
        }
    }