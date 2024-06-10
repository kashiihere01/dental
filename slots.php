<?php

include_once("./auth.php")
?>
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



    <?php

    require_once("./includes/db-con.php");

    $get_users = "SELECT *  FROM doctors where id = $doc_id ";

    $doc_result = mysqli_query($con, $get_users);

    if (mysqli_num_rows($doc_result) > 0) {

        while ($doc_row = mysqli_fetch_assoc($doc_result)) {


    ?>




            <!-- Hero Start -->
            <div class="container-fluid bg-primary py-5 hero-header mb-5" id="top">
                <div class="row py-3">
                    <div class="col-12 text-center">
                        <h1 class="display-3 text-white animated zoomIn"><?= $doc_row['doctor_name'] ?></h1>

                        <p class="text-center text-ehite"><?= $doc_row['speciality'] ?></p>
                    </div>
                </div>
            </div>
            <!-- Hero End -->
            <p class="text-center">
                <?php echo ("$date"); ?>
            </p>
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
                $dt = date_create($date);
                $formatted_date = date_format($dt, "Y-m-d");

                $get_appointment = "SELECT 
                slots.*, 
                appointment.status
            FROM 
                slots
            LEFT JOIN 
                appointment 
            ON 
                slots.id = appointment.slot
            AND 
                appointment.date = '$formatted_date'
            WHERE 
                slots.doctor_id = '$doc_id'
             ";




                $result = mysqli_query($con, $get_appointment);

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {


                ?>
                        <tr class="text-center">

                            <td><?= $row['slot_start_time'] ?></td>
                            <td><?= $row['slot_end_time'] ?></td>

                            <td><?php if ($row['status'] == 'booked') {
                                    echo "<span class='badge bg-success'> Booked</span>";
                                } else {
                                    echo "<button class='btn btn-primary openModalApp' data-slot_id='" . $row['id'] . "'>Appointment</button>";
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



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./appointment-qry.php" method="post">
                        <h6 class="modal-title" id="exampleModalLabel">Do You want make an Appointment?</h6>
                        <input type="hidden" name="slot_id" id="slotID" value="" />
                        <input type="hidden" value="<?=$doc_id?>" name="doc_id">
                        <input type="hidden" value="<?=$formatted_date?>" name="select_date">
                   
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="appointment" value="appointment">Make Appointment</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <?php include_once("./includes/footer.php"); ?>

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#top" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <?php include_once("./includes/java-script-links.php"); ?>
    <script>
        const modalBtn = document.querySelectorAll('.openModalApp');
        const slotIdInput = document.querySelector('#slotID');
        const myModal = new bootstrap.Modal('#exampleModal', {
            keyboard: false
        });

        modalBtn.forEach((btn) => {
            btn.addEventListener('click', (e) => {
                const slotId = e.target.dataset.slot_id;
                slotIdInput.setAttribute("value", slotId);
                myModal.show();
            })
        })
    </script>
</body>

</html>