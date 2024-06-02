<?php  
 require_once("./auth.php");
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
          <div class="row">
            <div class="col-4">
              <h3 style="color: blue;"> <i class="fa fa-user-plus " style="color: blue;"></i> Add Users</h3>
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

        <div class="d-flex justify-content-end">
          <a href="view-users.php" class="btn btn-primary text-white" style="color: blue;"><i class="fa fa-eye"></i> View users</a>
        </div>

        <div class="form-container">
          <form action="./add-user-qry.php" method="POST" enctype="multipart/form-data" class="row">

            <div class="col-lg-4 mb-2">
              <label class="form-label" for="name" style="color: blue;">User Name <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control" id="name" name="username" placeholder="Enter here..." required>
            </div>
            <div class="col-lg-4 mb-2">
              <label class="form-label" for="email" style="color: blue;">Email <span class="text-danger">*</span>
              </label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter here..." required>
            </div>

            <div class="col-lg-4 mb-2">
              <label class="form-label" for="email" style="color: blue;">Mobile Number <span class="text-danger">*</span>
              </label>
              <input type="text" class="form-control" id="email" name="mobile" placeholder="Enter here..." required>
            </div>


            <div class="col-lg-4 mb-2">
              <label class="form-label" for="image" style="color: blue;">Password <span class="text-danger">*</span>
              </label>
              <input type="password" class="form-control" id="image" name="password" required>
            </div>


            <div class="col-lg-4 mb-2">
              <label class="form-label" for="image" style="color: blue;">Image <span class="text-danger">*</span>
              </label>
              <input type="file" class="form-control" id="image" name="image" required>
            </div>

            <div class="col-lg-4 mb-2">
              <label class="form-label" for="image" style="color: blue;">City <span class="text-danger">*</span>
              </label>
              <input type="user_city" class="form-control" id="image" name="password" required>
            </div>


            <div class="col-lg-12 mb-2">
              <label class="form-label" for="val-username" style="color: blue;">Description <span class="text-danger">*</span>
              </label>
              <textarea name="description" class="form-control" id="" rows="1"></textarea>
            </div>
            <div class="col-lg-12 mb-2">
              <label class="form-label" for="val-username" style="color: blue;">About <span class="text-danger">*</span>
              </label>
              <textarea name="about-user" class="form-control" id="" rows="1"></textarea>
            </div>

            <div class="offset-8 col-lg-4 mb-2">
              <label for=""></label>

              <button class="btn btn-primary text-white btn-lg mt-2 w-100 " type="submit" name="submit" value="signup"> <i class="fa fa-plus"></i> Add Doctors</button>
            </div>

          </form>
        </div>

      </div>

    </div>

  </div>
  
  <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".uploadingErr").remove();
            }, 3000);


            setTimeout(function() {
                $(".credErr").remove();
            }, 3000);

        })
    </script>
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