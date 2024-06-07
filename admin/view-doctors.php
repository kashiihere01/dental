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
      <h3 style="color: blue;"> <i class="fa fa-eye " style="color: blue;"></i> View Doctors</h3>
      </div>
      <div class="d-flex justify-content-end">
            <a href="doctors.php" class="btn btn-primary text-white" style="color: blue;"><i class="fas fa-user-plus"></i> Add Doctors</a>
          </div>
         
      <div class="card-body text-dark">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Image</th>
                            <th>Doctor Name</th>
                            <th>Speciality</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                           
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php

require_once("./db-con.php");

$get_doctors = "SELECT *  FROM doctors ";

$result = mysqli_query($con, $get_doctors);

if (mysqli_num_rows($result) > 0) {
    $sr=1;
    while ($row = mysqli_fetch_assoc($result)) {


?>

        <tr>
        <td><?= $sr ?></td>
        <td><img src="./images/doctor/<?php echo $row['doctor_image'] ?>" alt="doctor Image" height="60px"></td>
            <td><?= $row['doctor_name'] ?></td>
            <td><?= $row['speciality'] ?></td>
            <td><?= $row['start_time'] ?></td>
            <td><?= $row['end_time'] ?></td>
          
           
            <td>
                <div class="dropdown">
                    <button type="button" class="btn btn-success text-white dropdown-toggle" data-toggle="dropdown">Actions</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="doctor-edit.php?id=<?= $row['id'] ?>">        <i class="fas fa-user-edit"></i> Edit</a>
                        <a class="dropdown-item" href="doctor-delete-qry.php?id=<?= $row['id']?>"><i class="fas fa-trash"></i> Delete</a>
                      
                    </div>
                </div>
            </td>
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
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>