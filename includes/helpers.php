<?php


function pp($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    //exit;
}

function getPricing($con)
{
// prices function
    $sql = "SELECT * FROM prices";
    $result = mysqli_query($con, $sql);
    return $result;
}
// Services function limit
function getService($con)
{

    $service_sql = "SELECT * FROM services LIMIT 2";
    $service_result = mysqli_query($con, $service_sql);
    return $service_result;
}
// Doctors function
function getDoctors($con)
{

    $doctor_sql = "SELECT * FROM doctors";
    $doctor_result = mysqli_query($con, $doctor_sql);
    return $doctor_result;
}
// Services function all
function getServiceall($con)
{

    $service_sql_all = "SELECT * FROM services";
    $service_result_all = mysqli_query($con, $service_sql_all);
    return $service_result_all;
}
function getImageUrl($folder, $image)
{
    return "admin/images/$folder/$image";
}
// get doctors by id

