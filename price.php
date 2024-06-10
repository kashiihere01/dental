<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DentCare - Dental Clinic Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

   <!-- css link -->
   <?php include_once ("./includes/css-links.php") ?>
</head>

<body>

    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include_once("./includes/navbar.php") ?>
    <!-- Navbar End -->
    <?php
    // select pricing
    $cats = getPricing($con);

?>



    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Pricing</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Pricing</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Pricing Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Pricing Plan</h5>
                        <h1 class="display-5 mb-0">We Offer Fair Prices for Dental Treatment</h1>
                    </div>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo eirmod magna dolore erat amet</p>
                    <h5 class="text-uppercase text-primary wow fadeInUp" data-wow-delay="0.3s">Call for Appointment</h5>
                    <h1 class="wow fadeInUp" data-wow-delay="0.6s">+012 345 6789</h1>
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel price-carousel wow zoomIn" data-wow-delay="0.9s">
                    <?php while ($row = mysqli_fetch_assoc($cats)) { ?>
                                   
                                
                                   <div class="price-item pb-4">
                                       <div class="position-relative">
                                           <img class="img-fluid rounded-top" src="./admin/images/pricing-plan/<?php echo $row['image']?>" alt="">
                                           <div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
                                               <h2 class="text-primary m-0">$<?= $row['price']?></h2>
                                           </div>
                                       </div>
                                       <div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
                                           <h4><?= $row['name']?></h4>
                                           <hr class="text-primary w-50 mx-auto mt-0">
                                           <div class="d-flex justify-content-between mb-3"><span>Modern Equipment</span><i class="fa fa-check text-primary pt-1"></i></div>
                                           <div class="d-flex justify-content-between mb-3"><span>Professional Dentist</span><i class="fa fa-check text-primary pt-1"></i></div>
                                           <div class="d-flex justify-content-between mb-2"><span>24/7 Call Support</span><i class="fa fa-check text-primary pt-1"></i></div>
                                           <a href="appointment.php" class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Appointment</a>
                                       </div>
                                   </div>
           
                                   <?php }
                                           mysqli_data_seek($cats, 0);
                                           ?>
                       
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing End -->
    

    <!-- Newsletter Start -->

    <!-- Newsletter End -->
    

    <!-- Footer Start -->
 
    <?php include_once("./includes/footer.php"); ?>

  
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#top" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <?php include_once("./includes/java-script-links.php"); ?>
</body>

</html>