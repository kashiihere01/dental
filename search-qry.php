<!DOCTYPE html>
<html lang="zxx">

<head>

    <title>M.K Fashion | Contact us</title>

    <!-- css links include -->
    <?php require_once("./includes/css-links.php") ?>

</head>

<body>
     <!-- header-section include -->
     <?php require_once("./includes/navbar.php") ?>

<div class="row m-0">


<?php

require_once("./includes/helpers.php");
require_once("./includes/css-links.php");

// Sanitize search term
$search_word = mysqli_real_escape_string($con, $_POST['search']);

// Construct the query
$search_qry = "SELECT * FROM doctors 

WHERE doctors.doctor_name LIKE '%$search_word%'";

// Execute the search query
$result = mysqli_query($con, $search_qry);

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
    // get products
    $products = getDoctors($con);
// Process the result, for example, fetch the rows
while ($row = mysqli_fetch_assoc($result)) {


?>
    <div class="col-lg-3 col-md-4 col-sm-6 mix">
                   <div class="team-item">
                       <div class="position-relative rounded-top" style="z-index: 1;">
                           <img class="img-fluid rounded-top w-100" src="./admin/images/doctor/<?php echo $row['doctor_image']?>" alt="">
                           <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                               <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                               <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                               <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                               <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                           </div>
                       </div>
                       <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                           <h4 class="mb-2"><?= $row['doctor_name']?></h4>
                           <p class="text-primary mb-0"><?= $row['speciality']?></p>
                       </div>
                   </div>
               </div>
              
    </div>
    <?php }
                          mysqli_data_seek($doctor, 0);
                          ?>
</div>
    <!-- footer includes -->
    <?php require_once("./includes/footer.php")  ?>

<?php require_once("./includes/javascript-links.php") ?>
</body>