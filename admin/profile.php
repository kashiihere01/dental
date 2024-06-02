<?php require_once("./auth.php");

require_once("./db-con.php");

$get_user_id = $_SESSION['user_id'];

$select = "SELECT * FROM users WHERE id='$get_user_id'";
$result = mysqli_query($con, $select);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- profile.html  21 Nov 2019 03:49:30 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <!-- navbar  -->
  <?php include_once("./includes/navbar.php") ?>
  <!-- navbar  -->
  <?php include_once("./includes/sidebar.php") ?>
  </div>
  <!-- Main Content -->
  <div class="main-content">
  <?php if ($_SESSION['user_role'] === "admin") {
            echo '
            <div class="d-flex justify-content-end mt-4">
            <div class="me-2">
                <a href="./add-user.php" class="btn btn-success text-white"><i class="fa fa-plus"></i> Add Users</a>
            </div>
                  
            <div class="ms-3">
                <a href="./view-users.php" class="btn btn-primary text-white"><i class="fa fa-view"></i> view Users</a>
            </div>
</div>
        
            ';
          } ?>
    <section class="section">
      <div class="section-body">
        <div class="row mt-sm-4">
          <!-- Add and View Users -->
        
          <div class="col-12 col-md-12 col-lg-4">
            <div class="card author-box">
              <div class="card-body">
                <div class="author-box-center">
                  <img alt="image" src="./images/admin-users/<?php echo $_SESSION['user_image']?>" class="rounded-circle author-box-picture">
                  <div class="clearfix"></div>
                  <div class="author-box-name">
                    <a href="#"><?= $_SESSION['user_name'] ?></a>
                  </div>
                  <div class="author-box-job"><?= $_SESSION['user_role'] ?></div>
                </div>
                <div class="text-center">
                  <div class="author-box-description">
                    <p>
                      <?= $_SESSION['user_description'] ?>
                    </p>
                  </div>
                  
                  
                  <div class="w-100 d-sm-none"></div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4>Personal Details</h4>
              </div>
              <div class="card-body">
                <div class="py-4">
                  <p class="clearfix">
                    <span class="float-left">
                      City
                    </span>
                    <span class="float-right text-muted">
                    <?= $_SESSION['user_city'] ?>
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Phone
                    </span>
                    <span class="float-right text-muted">
                    <?= $_SESSION['user_mobile'] ?>
                    </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Mail
                    </span>
                    <span class="float-right text-muted">
                    <?= $_SESSION['user_email'] ?>
                    </span>
                  </p>
                  
                  
                </div>
              </div>
            </div>
          </div>
       
          <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
              <div class="padding-20">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab" aria-selected="true">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Setting</a>
                  </li>
                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                    <div class="row">
                      <div class="col-md-3 col-6 b-r">
                        <strong>Full Name</strong>
                        <br>
                        <p class="text-muted">  <?= $_SESSION['user_name'] ?></p>
                      </div>
                      <div class="col-md-3 col-6 b-r">
                        <strong>Mobile</strong>
                        <br>
                        <p class="text-muted">  <?= $_SESSION['user_mobile'] ?></p>
                      </div>
                      <div class="col-md-3 col-6 b-r">
                        <strong>Email</strong>
                        <br>
                        <p class="text-muted">  <?= $_SESSION['user_email'] ?></p>
                      </div>
                      <div class="col-md-3 col-6">
                        <strong>Location</strong>
                        <br>
                        <p class="text-muted">  <?= $_SESSION['user_city'] ?></p>
                      </div>
                    </div>
                    <p class="m-t-30">
                    <?= $_SESSION['user_about'] ?>
                    </p>
                  </div>
                  <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                    <form method="post" action="./profile-update-qry.php" enctype="multipart/form-data" class="needs-validation">
                      <div class="card-header">
                        <h4>Edit Profile</h4>
                      </div>
                      <div class="card-body">
                        <div class="row">
                         
                          <div class="form-group col-md-6 col-12">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="username" value="<?= $row['user_name'] ?>">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>City</label>
                            <input type="text" class="form-control" name="city" value="<?= $row['user_city'] ?>">
                            <div class="invalid-feedback">
                              Please fill in the last name
                            </div>
                          </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $get_user_id ?>">
                        <div class="row">
                          <div class="form-group col-md-4 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $row['user_email'] ?>">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                          <div class="form-group col-md-4 col-12">
                            <label>Image</label>
                            <input type="file" class="form-control" id="userimage" name="new_image" accept="image/*">
                <input type="hidden" class="form-control" value="<?= $row['user_image'] ?>" name="old_image" accept="image/*" required>
                          </div>
                          
                          <div class="form-group col-md-4 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control" name="mobile" value="<?= $row['user_mobile'] ?>">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Bio</label>
                            <textarea class="form-control summernote-simple" name="description"><?= $row['description'];  ?></textarea>
                          </div>
                        
                        </div>
                       
                        <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                      </div>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="settingSidebar">
      <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
      </a>
      <div class="settingSidebar-body ps-container ps-theme-default">
        <div class=" fade show active">
          <div class="setting-panel-header">Setting Panel
          </div>
          <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Select Layout</h6>
            <div class="selectgroup layout-color w-50">
              <label class="selectgroup-item">
                <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                <span class="selectgroup-button">Light</span>
              </label>
              <label class="selectgroup-item">
                <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                <span class="selectgroup-button">Dark</span>
              </label>
            </div>
          </div>
          <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Sidebar Color</h6>
            <div class="selectgroup selectgroup-pills sidebar-color">
              <label class="selectgroup-item">
                <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
              </label>
              <label class="selectgroup-item">
                <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip" data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
              </label>
            </div>
          </div>
          <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Color Theme</h6>
            <div class="theme-setting-options">
              <ul class="choose-theme list-unstyled mb-0">
                <li title="white" class="active">
                  <div class="white"></div>
                </li>
                <li title="cyan">
                  <div class="cyan"></div>
                </li>
                <li title="black">
                  <div class="black"></div>
                </li>
                <li title="purple">
                  <div class="purple"></div>
                </li>
                <li title="orange">
                  <div class="orange"></div>
                </li>
                <li title="green">
                  <div class="green"></div>
                </li>
                <li title="red">
                  <div class="red"></div>
                </li>
              </ul>
            </div>
          </div>
          <div class="p-15 border-bottom">
            <div class="theme-setting-options">
              <label class="m-b-0">
                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="mini_sidebar_setting">
                <span class="custom-switch-indicator"></span>
                <span class="control-label p-l-10">Mini Sidebar</span>
              </label>
            </div>
          </div>
          <div class="p-15 border-bottom">
            <div class="theme-setting-options">
              <label class="m-b-0">
                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input" id="sticky_header_setting">
                <span class="custom-switch-indicator"></span>
                <span class="control-label p-l-10">Sticky Header</span>
              </label>
            </div>
          </div>
          <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
            <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
              <i class="fas fa-undo"></i> Restore Default
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="main-footer">
    <div class="footer-left">
      <a href="templateshub.net">Templateshub</a></a>
    </div>
    <div class="footer-right">
    </div>
  </footer>
  </div>
  </div>
  <!-- js links -->
  <?php include_once("./includes/java-script.php") ?>
</body>


<!-- profile.html  21 Nov 2019 03:49:32 GMT -->

</html>