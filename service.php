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
    // select categories


    $services = getServiceall($con);



    ?>

    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal top" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
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


    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            
                    <div class="section-title mb-5">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Our Services</h5>
                        <h1 class="display-5 mb-0">We Offer The Best Quality Dental Services</h1>
                    </div>
            
                    <div class="row g-5">
                    <?php while ($row = mysqli_fetch_assoc($services)) { ?>
                       
                       
                    
                        <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.6s">
                            <div class="rounded-top overflow-hidden">
                                <img class="img-fluid" src="./admin/images//services/<?php echo $row['image'] ?>" alt="">
                            </div>
                            <div class="position-relative bg-light rounded-bottom text-center p-4">
                                <h5 class="m-0"><?= $row['service']?></h5>
                            </div>
                        </div>
                        <?php }
                           mysqli_data_seek($services, 0);
                           ?>
                       
                    </div>
                </div>
            </div>
          
        </div>
    </div>
    <!-- Service End -->
    

    <?php include_once("./includes/footer.php"); ?>
    <!-- footer End -->


    <!-- Back to Top -->
    <a href="#top" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <?php include_once("./includes/java-script-links.php"); ?>
</body>

</html>