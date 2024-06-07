<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/login.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container5">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="./login-qry.php" class="sign-in-form" method="post">
          <?php

if (!empty($_SESSION['success'])) {
    $msg = $_SESSION['success'];
    echo  " 
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Congratulation!</strong> $msg
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
unset($_SESSION['success']);


if (!empty($_SESSION['error'])) {
    $msg = $_SESSION['error'];
    echo " 
    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Warning!</strong> $msg
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>"
 ;
}
unset($_SESSION['error']);

if (!empty($_SESSION['invalid'])) {
    $msg = $_SESSION['invalid'];
    echo "   <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Warning!</strong> $msg
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
unset($_SESSION['imgErr']);

?>
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Email" name="email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" />
            </div>
            <input type="submit" value="login" name="login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
         
          
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
           Create a new account!
           Click the below button foe signing up!!!
            </p>
          <a href="./signup.php">  <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button></a>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="java.js"></script>
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
  </body>
</html>
