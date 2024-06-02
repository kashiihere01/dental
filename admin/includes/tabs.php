<section class="section">
    <div class="row ">
    <?php
            require_once("db-con.php");
            $user_count_query = "SELECT COUNT(*) AS category FROM users";
            $user_count_result = mysqli_query($con, $user_count_query);
            $user_count_row = mysqli_fetch_assoc($user_count_result);
            $all_user = $user_count_row['category'];

        
            $doctor_count_query = "SELECT COUNT(*) AS doctors FROM doctors";
            $doctor_count_result = mysqli_query($con, $doctor_count_query);
            $doctor_count_row = mysqli_fetch_assoc($doctor_count_result);
            $all_doctor = $doctor_count_row['doctors'];

            $service_count_query = "SELECT COUNT(*) AS services FROM services";
            $service_count_result = mysqli_query($con, $service_count_query);
            $service_count_row = mysqli_fetch_assoc($service_count_result);
            $all_service = $service_count_row['services'];

            $appointment_count_query = "SELECT COUNT(*) AS appointment FROM services";
            $appointment_count_result = mysqli_query($con, $appointment_count_query);
            $appointment_count_row = mysqli_fetch_assoc($appointment_count_result);
            $all_appointment = $appointment_count_row['appointment'];
            ?> 
        <div class="col-xl-3 col-lg-6 col-smd-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Appointments</h5>
                                    <h2 class="mb-3 font-18"><?= $all_appointment ?></h2>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="assets/img/banner/1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">  Docters</h5>
                                    <h2 class="mb-3 font-18"><?= $all_doctor ?></h2>
                                   
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="assets/img/banner/2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Users</h5>
                                    <h2 class="mb-3 font-18"><?= $all_user ?></h2>
                                  
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="assets/img/banner/3.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Services</h5>
                                    <h2 class="mb-3 font-18"><?= $all_service ?></h2>
                                
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="assets/img/banner/4.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
                
   
    

</section>