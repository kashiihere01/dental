<!-- General CSS Files -->
<?php
include_once("./auth.php");

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
          <div class="col-4">
            <h3 style="color: blue;"> <i class="fa fa-eye " style="color: blue;"></i> View Messages</h3>
          </div>


          <div class="card-body text-dark">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
<thead>
  <th>Name</th>
  <th>message</th>
  <th>Date</th>
  <th>Delete Message</th>
</thead>
                <tbody>
                  <?php

                  require_once("./db-con.php");

                  $get_doctors = "SELECT *  FROM patient_messages ";

                  $result = mysqli_query($con, $get_doctors);

                  if (mysqli_num_rows($result) > 0) {


                    while ($row = mysqli_fetch_assoc($result)) {


                  ?>

                      <tr class="unread">
                     
                        <td class="hidden-xs"><?= $row['name'] ?></td>
                        <td class="max-texts">
                          <a href="read.php?id=<?= $row['id'] ?>"><?= $row['message'] ?></a>
                        </td>

                        <td class="text-right"> <?= $row['created_at'] ?> </td>
                        <td class="hidden-xs">
                          <a href="./delete-messages.php"> <i class="fas fa-trash text-dark"></i></a>
                        </td>
                      </tr>

                  <?php
                    }
                  }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
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


<!-- email-inbox.html  21 Nov 2019 03:50:58 GMT -->

</html>