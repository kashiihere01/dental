<?php include_once("auth.php");
include_once("db-con.php"); ?>


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
    <section class="section">
      <div class="section-body">
        <div class="row">




          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="boxs mail_listing">
                <div class="inbox-body no-pad">
                  <section class="mail-list">
                    <div class="mail-sender">
                      <div class="mail-heading">
                        <h4 class="vew-mail-header">
                          <b>Hi Dear, How are you?</b>
                        </h4>
                      </div>
                      <hr>
                      <div class="media">


                        <?php


                        $get_doctor_id = $_GET['id'];

                        $select = "SELECT * FROM `patient_messages` WHERE id='$get_doctor_id'";
                        $result = mysqli_query($con, $select);

                        if (mysqli_num_rows($result) > 0) {
                          $row = mysqli_fetch_assoc($result);
                        }

                        ?>

                        <div class="media-body">
                          <span class="date pull-right"><?= $row['created_at'] ?></span>
                          <h5 class="text-dark"><?= $row['name'] ?></h5>
                          <small class="text-muted"><?= $row['email'] ?></small>
                        </div>
                      </div>
                    </div>
                    <div class="view-mail p-t-20">
                      <p><?= $row['name'] ?></p>



                    </div>



                </div>

    </section>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </section>
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