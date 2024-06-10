<?php 
include_once ("./auth.php");
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
                <div class="container mt-3 bg-white p-3">
                    <div class="row">
                    <div class="col-4">
                        <h3 style="color: blue;"> <i class="fa fa-plus " style="color: blue;"></i> Add Prices</h3>
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
                        <form action="./add-prices-qry.php" method="POST" enctype="multipart/form-data" class="row">

                            <div class="col-lg-4 mb-2">
                                <label class="form-label" for="name" style="color: blue;"> Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter here..." required>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <label class="form-label" for="name" style="color: blue;"> Price <span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control" id="name" name="price" placeholder="Enter here..." required>
                            </div>
                            <div class="col-lg-4 mb-2">
                                <label class="form-label" for="image" style="color: blue;">Image <span class="text-danger">*</span>
                                </label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>





                            <div class="offset-8 col-lg-4 ">
                                <label for=""></label>

                                <button class="btn btn-primary text-white btn-lg mt-2 w-100 " type="submit" name="submit" value="signup"> <i class="fa fa-plus"></i> Add services</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
<!-- table start -->
<!-- main  content -->
<div class="row clearfix">

<div class="card">
  <!-- view categories container -->
  <div class="container mt-3 bg-white p-4">
<div class="col-4">
<h3 style="color: blue;"> <i class="fa fa-eye " style="color: blue;"></i> View Prices</h3>
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
                      <th>Name</th>
                      <th>Price</th>
                     
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

require_once("./db-con.php");

$get_services = "SELECT *  FROM prices ";

$result = mysqli_query($con, $get_services);

if (mysqli_num_rows($result) > 0) {
$sr=1;
while ($row = mysqli_fetch_assoc($result)) {


?>

  <tr>
  <td><?= $sr ?></td>
  <td><img src="./images/pricing-plan/<?php echo $row['image'] ?>" alt="Pricing plan Image" height="60px"></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['price'] ?></td>
    
     
      <td>
          <div class="dropdown">
              <button type="button" class="btn btn-success text-white dropdown-toggle" data-toggle="dropdown">Actions</button>
              <div class="dropdown-menu">
                  <a class="dropdown-item" href="our-services-edit.php?id=<?= $row['id'] ?>">        <i class="fas fa-user-edit"></i> Edit</a>
                  <a class="dropdown-item" href="delete.php?id=<?= $row['id'] ?>"><i class="fas fa-trash"></i> Delete</a>
                
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