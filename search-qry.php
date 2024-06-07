<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DentCare - Dental Clinic</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- css link -->
    <?php include_once("./includes/css-links.php") ?>
</head>

<body>

    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include_once("./includes/navbar.php");
    
    ?>
    <!-- Navbar End -->
    <?php
    // select categories
    $cats = getPricing($con);

    $service = getService($con);



    ?>

    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal top" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="search" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Keep Your Teeth Healthy</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Take The Best Quality Dental Treatment</h1>
                            <a href="appointment.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Appointment</a>
                            <a href="contact.php" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Keep Your Teeth Healthy</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Take The Best Quality Dental Treatment</h1>
                            <a href="appointment.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Appointment</a>
                            <a href="contact.php" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Banner Start -->
    <div class="container-fluid banner mb-5">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary d-flex flex-column p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Opening Hours</h3>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">Mon - Fri</h6>
                            <p class="mb-0"> 8:00am - 9:00pm</p>
                        </div>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">Saturday</h6>
                            <p class="mb-0"> 8:00am - 7:00pm</p>
                        </div>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">Sunday</h6>
                            <p class="mb-0"> 8:00am - 5:00pm</p>
                        </div>
                        <a class="btn btn-light" href="./appointment.php">Appointment</a>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-dark d-flex flex-column p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Search A Doctor</h3>
                        <div class="date mb-3" id="date" data-target-input="nearest">
                            <input type="text" class="form-control bg-light border-0 datetimepicker-input" placeholder="Appointment Date" data-target="#date" data-toggle="datetimepicker" style="height: 40px;">
                        </div>
                        <form action="search-qry.php" method="POST">
                            <div class="input-group mb-2">
                                <input class="form-control border-end-0 border" type="search" value="search" id="example-search-input">
                                <span class="input-group-append">
                                    <button class="btn btn-outline-primary bg-white border-start-0 border rounded-pill ms-n3" type="submit" name="search">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <button class="btn btn-light w-100">
                            Search Doctor
                            </button>
                        </form>
                    </div>

                </div>
                <?php
// Sanitize search term
$search_word = mysqli_real_escape_string($con, $_POST['search']);

// Construct the query
$search_qry = "SELECT * FROM doctors 

WHERE doctors.doctor_name AND doctors.speciality  LIKE '%$search_word%'";

// Execute the search query
$result = mysqli_query($con, $search_qry);

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
    // get products

    $doctor = getDoctors($con);
// Process the result, for example, fetch the rows
while ($row = mysqli_fetch_assoc($result)) {


?>
    <div class="col-lg-3 col-md-4 col-sm-6 mix">
    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
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
               <?php }
                          mysqli_data_seek($doctor, 0);
                          ?>
</div>
    <!-- footer includes -->
    <?php require_once("./includes/footer.php")  ?>

<?php require_once("./includes/javascript-links.php") ?>
</body>