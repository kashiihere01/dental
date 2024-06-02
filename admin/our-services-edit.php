<?php
 include_once("./auth.php");

require_once("./db-con.php");

$get_service_id = $_GET['id'];

$select = "SELECT * FROM services WHERE id='$get_service_id'";
$result = mysqli_query($con, $select);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
}

?>

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
    <!-- navbar  --><!-- navbar  -->
    <?php include_once("./includes/navbar.php") ?>
    <!-- navbar  -->
    <?php include_once("./includes/sidebar.php") ?>
    <!-- Main Content -->
    <div class="main-content">
        <!-- main  content -->
        <div class="row clearfix">

            <div class="card">
                <!-- view categories container -->
                <div class="container mt-3 bg-white p-3">
                    <div class="col-4">
                        <h3 style="color: blue;"> <i class="fa fa-edit " style="color: blue;"></i> Edit Services</h3>
                    </div>
                    <div class="col-8">
                        <?php

                        if (!empty($_SESSION['success'])) {
                            $msg = $_SESSION['success'];
                            echo " <div class='alert alert-success alert-dismissible fade show credErr'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
        </button> <strong>Congratulation! </strong> $msg</div>";
                        }
                        unset($_SESSION['success']);


                        if (!empty($_SESSION['error'])) {
                            $msg = $_SESSION['error'];
                            echo " <div class='alert alert-danger alert-dismissible fade show credErr'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
        </button> <strong>Warning! </strong> $msg</div>";
                        }
                        unset($_SESSION['error']);

                        if (!empty($_SESSION['imgErr'])) {
                            $msg = $_SESSION['imgErr'];
                            echo " <div class='alert alert-danger alert-dismissible fade show credErr'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
        </button> <strong>Warning! </strong> $msg</div>";
                        }
                        unset($_SESSION['imgErr']);

                        ?>
                    </div>
                    <hr>

                    <!-- <div class="d-flex justify-content-end">
            <a href="view-doctors.php" class="btn btn-primary text-white" style="color: blue;"><i class="fa fa-eye"></i> View Doctors</a>
          </div> -->

                    <div class="form-container">
                        <form action="./update-service-qry.php" method="POST" enctype="multipart/form-data" class="row">

                            <div class="col-lg-6 mb-2">
                                <label class="form-label" for="name" style="color: blue;"> Service <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" value="<?= $row['service'] ?>" id="name" name="service" placeholder="Enter here..." required>
                            </div>
                            <input type="hidden" name="id" value="<?= $get_service_id ?>">

                            <div class="col-lg-6 mb-2">
                                <label class="form-label" for="image" style="color: blue;">Image <span class="text-danger">*</span>
                                </label>
                                <input type="file" class="form-control" id="userimage" name="new_image" accept="image/*">
                <input type="hidden" class="form-control" value="<?= $row['image'] ?>" name="old_image" accept="image/*" required>
                            </div>





                            <div class="offset-8 col-lg-4 ">
                                <label for=""></label>

                                <button class="btn btn-primary text-white btn-lg mt-2 w-100 " type="submit" name="submit" value="signup"> <i class="fa fa-edit"></i> update services</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
<!-- table start -->

<!-- main end -->
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