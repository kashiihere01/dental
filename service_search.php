

<!DOCTYPE html>
<html lang="zxx">

<head>

    <title>Services</title>

    <!-- css links include -->
    <?php require_once("./includes/css-links.php") ?>

</head>

<body>
     <!-- header-section include -->


<div class="row m-0">

<?php
require_once("./includes/db-con.php");
require_once("./includes/helpers.php");
?>
<!-- Topbar Start -->
<div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <small class="py-2"><i class="far fa-clock text-primary me-2"></i>Opening Hours: Mon - Tues : 6.00 am - 10.00 pm, Sunday Closed </small>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                    <div class="me-3 pe-3 border-end py-2">
                        <p class="m-0"><i class="fa fa-envelope-open me-2"></i>info@example.com</p>
                    </div>
                    <div class="py-2">
                        <p class="m-0"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- start navbar -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
            <h1 class="m-0 text-primary"><i class="fa fa-tooth me-2"></i>DentCare</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="service.php" class="nav-item nav-link">Service</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="price.php" class="dropdown-item">Pricing Plan</a>
                        <a href="team.php" class="dropdown-item">Our Dentist</a>
                        <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                        <a href="appointment.php" class="dropdown-item">Appointment</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
       

            <?php

if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    echo ' <a href="logout.php" class="btn btn-primary py-2 px-4 ms-3"><i class"fa fa-user"></i>Logout</a>     ';


;
} else {
    echo '  
    <a href="login.php" class="btn btn-primary py-2 px-4 ms-3"><i class"fa fa-sign-out"></i>Login</a>          
';
}

?>
        </div>
    </nav>
    <!-- Full Screen Search Start -->
       <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <form  method="post">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="search" class="form-control bg-transparent border-primary p-3" name="search_service" placeholder="Type search keyword" >
                        <button class="btn btn-primary px-4" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->
 
          <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Services</h1>
                <a href="./index.php" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="./service.php" class="h4 text-white">Services</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->         

<?php

// Sanitize search term
$search_word = mysqli_real_escape_string( $con, $_POST['search_service']);

// Construct the query
$search_qry = "SELECT * FROM services 

WHERE services.service LIKE '%$search_word%'";

// Execute the search query
$result = mysqli_query($con, $search_qry);

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
    // get products
    $services = getServiceall($con);
// Process the result, for example, fetch the rows
while ($row = mysqli_fetch_assoc($result)) {


?>
     
                       
                    
                        <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.6s">
                            <div class="rounded-top overflow-hidden">
                                <img class="img-fluid" src="./admin/images//services/<?php echo $row['image'] ?>" alt="">
                            </div>
                            <div class="position-relative bg-light rounded-bottom text-center p-4">
                                <h5 class="m-0"><?= $row['service']?></h5>
                            </div>
                        </div>
                        <?php }
                         
                           ?>
                       
                    </div>



<!-- footer includes -->
    <?php require_once("./includes/footer.php")  ?>

<?php require_once("./includes/java-script-links.php") ?>
</body>