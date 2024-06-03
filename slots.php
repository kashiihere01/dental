<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DentCare - Dental Clinic Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- css link -->
    <?php include_once("./includes/css-links.php") ?>
</head>

<body>



    <!-- Navbar Start -->
    <?php include_once("./includes/navbar.php") ?>
    <!-- Navbar End -->
    <?php
    if (isset($_POST['apointment'])) {

        $doc_id = $_POST['doctor_id'];
        $date = $_POST['date'];
    }


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
    <?php

    require_once("./includes/db-con.php");

    $get_users = "SELECT *  FROM doctors where id = $doc_id ";

    $doc_result = mysqli_query($con, $get_users);

    if (mysqli_num_rows($doc_result) > 0) {

        while ($doc_row = mysqli_fetch_assoc($doc_result)) {


    ?>




            <!-- Hero Start -->
            <div class="container-fluid bg-primary py-5 hero-header mb-5">
                <div class="row py-3">
                    <div class="col-12 text-center">
                        <h1 class="display-3 text-white animated zoomIn"><?= $doc_row['doctor_name'] ?></h1>
                        <a href="./index.php" class="h4 text-white">Home</a>
                        <i class="far fa-circle text-white px-2"></i>
                        <a href="./appointment.php" class="h4 text-white">Appointment</a>
                    </div>
                </div>
            </div>
            <!-- Hero End -->

    <?php
        }
    }
    mysqli_data_seek($doc_result, 0);
    ?>
    <!-- Appointment Start -->

    <div class="container w-50 p-4">
        <table class="table">
            <thead>
                <tr class="text-center">

                    <th scope="col">start</th>
                    <th scope="col">End time</th>
                    <th scope="col">Availability</th>

                </tr>
            </thead>
            <tbody>
                <?php

                require_once("./includes/db-con.php");

                $get_users = "SELECT 
                slots.*, 
                appointment.*
            FROM 
                slots
            LEFT JOIN 
                appointment 
            ON 
                slots.id = appointment.slot
            AND 
                appointment.date = '$date'
            WHERE 
                slots.doctor_id = '$doc_id'
             ";

                $result = mysqli_query($con, $get_users);

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {


                ?>
                        <tr class="text-center">

                            <td><?= $row['slot_start_time'] ?></td>
                            <td><?= $row['slot_end_time'] ?></td>
                            <td><?php if($row['status'] == 'booked') {
                                    echo "<span class='badge bg-success'> Booked</span>";
                                } else {
                                    echo "<button class='btn btn-primary'>Appointment</button>";
                                }

                                ?></td>
                        </tr>


                <?php
                    }
                }
                mysqli_data_seek($result, 0);
                ?>
            </tbody>
        </table>
    </div>
    <!-- Appointment End -->


    <?php include_once("./includes/footer.php"); ?>

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#top" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <?php include_once("./includes/java-script-links.php"); ?>
</body>

</html>