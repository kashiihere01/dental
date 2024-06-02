<!-- <?php
        include_once("./auth.php");
    


require_once("./db-con.php");

$get_service_id = $_GET['id'];

$select = "SELECT * FROM slots WHERE id='$get_service_id'";
$result = mysqli_query($con, $select);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
}

?>
        ?> -->
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
                <div class="container mt-3 bg-white p-3">
                    <div class="row">
                        <div class="col-4">
                            <h3 style="color: blue;"> <i class="fa fa-plus " style="color: blue;"></i> Add Slot</h3>
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
                    </div>
                    <hr>



                    <div class="form-container">
                        <form action="./update-slot-qry.php" method="POST" enctype="multipart/form-data" class="row">

                            <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                    <label class="form-label" for="email" style="color: blue;">End time <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="etime" class="form-control timepicker" required>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?= $get_service_id ?>">
                            </div>
                            <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                    <label class="form-label" for="email" style="color: blue;">start time <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="stime" class="form-control timepicker" required>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-4 mb-2">

                                <div class="form-group">
                                    <label class="form-label" for="email" style="color: blue;">Select Doctor <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control select2" name="docname" required>
                                        <option value="-1">Choose here</option>
                                        <!-- fetch category from category table -->
                                        <?php
                                        require_once "./db-con.php";

                                        $select = "SELECT * FROM doctors";
                                        $result = mysqli_query($con, $select);

                                        if (mysqli_num_rows($result) > 0) {

                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                                <option value="<?php echo $row['id'] ?>"> <?php echo $row['doctor_name'] ?> </option>

                                        <?php  }
                                        } ?>
                                    </select>
                                </div>
                            </div>





                            <div class="offset-8 col-lg-4 ">
                                <label for=""></label>

                                <button class="btn btn-primary text-white btn-lg mt-2 w-100 " type="submit" name="submit" value="signup"> <i class="fa fa-plus"></i> Add Slot</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- table start -->
            

                                 
                    </div>
                </div>
            </div>
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