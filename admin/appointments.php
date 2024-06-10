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
      <h3 style="color: blue;"> <i class="fa fa-eye " style="color: blue;"></i> View Appointment</h3>
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
                            <th>Start slot Time</th>
                           
                            <th>Start slot time</th>
                      
                        
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php

require_once("./db-con.php");

$get_appointments = "SELECT 
    a.id, 
    d.name AS doctor_name, 
    p.name AS patient_name, 
    a.status, 
    s.slot_start_time, 
    s.slot_end_time, 
    a.date, 
    a.created_at
FROM 
    appointment a
JOIN 
    doctors d ON a.doctor_id = d.id
JOIN 
    patients p ON a.patient_id = p.id
JOIN 
    slots s ON a.slot = s.id;
";

$result = mysqli_query($con, $get_appointments);

if (mysqli_num_rows($result) > 0) {
    $sr=1;
    while ($row = mysqli_fetch_assoc($result)) {


?>

        <tr>
        <td><?= $sr ?></td>
    
            <td><?= $row['name'] ?></td>
            <td><?= $row['doct_name'] ?></td>
                 <td><?= $row['slot_start_time'] ?></td>
       
            <td><?= $row['slot_end_time'] ?></td>
            
           
            <td>
                <div class="dropdown">
                    <button type="button" class="btn btn-success text-white dropdown-toggle" data-toggle="dropdown">Actions</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="doctor-edit.php?id=<?= $row['id'] ?>">        <i class="fas fa-user-edit"></i> Edit</a>
                        <a class="dropdown-item" href="delete-users.php?id=<?= $row['id'] ?>">><i class="fas fa-trash"></i> Delete</a>
                        <a class="dropdown-item" href="active.php?id=<?= $row['id'] ?>">  <i data-feather="user-check"></i> Active</a>
                        <a class="dropdown-item" href="inactive.php?id=<?= $row['id'] ?>"><i data-feather="user-x"></i>  Inactive</a>
                      
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


</html>