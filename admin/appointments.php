<?php require_once("./auth.php");?>
<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dental health management system - home</title>
  <!-- css links -->
  <?php include_once("./includes/css_links.php") ?>
</head>

<body>
  <!-- navbar  -->
  <?php include_once("./includes/navbar.php") ?>
  <!-- navbar  -->
  <?php include_once("./includes/sidebar.php") ?>
  <!-- Main Content -->
  <div class="main-content">
    <!-- main  content -->
    <div class="row clearfix">

      <div class="card">
        <!-- view categories container -->
        <div class="container mt-3 bg-white p-4">
      <div class="col-4">
      <h3 style="color: blue;"> <i class="fa fa-eye " style="color: blue;"></i> View users</h3>
      </div>
      <div class="d-flex justify-content-end">
            <a href="add-user.php" class="btn btn-primary text-white" style="color: blue;"><i class="fas fa-user-plus"></i> Add users</a>
          </div>
         
      <div class="card-body text-dark">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Patient Name</th>
                     
                            <th>Doctor Name</th>
                           
                            <th>Slot start time</th>
                            <th>Slot end time</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                        <?php

require_once("./db-con.php");


$get_appointment = "SELECT 
    patients.name, 
    slots.*,
    appointments.*
FROM
    slots
LEFT JOIN 
    appointments ON slots.id = appointments.slot
LEFT JOIN 
    patients ON appointments.patient_id = patients.id
";




$result = mysqli_query($con, $get_appointment);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {


?>
        <tr>
        <td><?= $sr ?></td>
        
        <td><?= $row['name'] ?></td>
            <td><?= $row['doctor_name'] ?></td>
            <td><?= $row['slot_start_time'] ?></td>
            <td><?= $row['slot_end_time'] ?></td>
        </tr>

<?php
   $sr++; }
}
?>
                          
                        </tbody>
                      </table>
                    </div></div>
      </div>
      </div>
    </div>
    <!-- setting sidebar  content -->
    <?php include_once("./includes/setting_sidebar.php") ?>
  </div>
  <!-- setting sidebar  content -->
  <?php include_once("./includes/footer.php") ?>
  </div>
  </div>
  <!-- java script  links -->
  <?php include_once("./includes/java-script.php") ?>
  <script>
        $(document).ready(function() {
            $("#del").on("click", function(e) {
                e.preventDefault();
    
                let id = $(this).data('id');

                Swal.fire({
                    title: "Do you want to Delete item from cart?",
                    showDenyButton: true,
                    confirmButtonText: "Yes, Delete",
                    denyButtonText: `Don't Delete`
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        $.ajax({
                            url: "delete-users.php",
                            type: "POST",
                            data: {
                                id: id
                            },
                            success: function(response) {
                                if (response == true) {
                                    Swal.fire({
                                        position: "top-center",
                                        icon: "success",
                                        title: "Items is successfully deleted from cart",
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then( () => {
                                        window.location.reload();
                                    })
                                }

                            }
                        })


                    } else if (result.isDenied) {
                        Swal.fire("Okay, not deleted", "", "info");
                    }
                });

            })
        })
    </script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
























