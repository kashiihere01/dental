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
 $doctor = getDoctors($con);
?>
    <!-- Navbar End -->





    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5" id="top">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Dentist</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Dentist</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title bg-light rounded h-100 p-5">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Our Dentist</h5>
                        <h1 class="display-6 mb-4">Meet Our Certified & Experienced Dentist</h1>
                        <a href="appointment.html" class="btn btn-primary py-3 px-5">Appointment</a>
                    </div>
                </div>
                <?php while ($row = mysqli_fetch_assoc($doctor)) { ?>
               
                       
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
        </div>
    </div>
    <!-- Team End -->
    
    <?php include_once("./includes/footer.php"); ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#top" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <?php include_once("./includes/java-script-links.php"); ?>
</body>

</html>