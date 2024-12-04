<?php
session_start();
if(isset($_SESSION['loggedin'])){
  session_unset();
  session_destroy();
}
?>

<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Login</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="CampusSync.png">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                <img src="CampusSync.png" style="border-radius: 30px; height:60px; width:60px; margin-right:10px; ">
                </span>
                <span class="app-brand-text demo text-body fw-bolder">Campus Sync</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Welcome to Campus Sync! </h4>
            <p class="mb-4">Please sign-in to your account</p>

            <form id="formAuthentication" class="mb-3" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email or Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your email or username" autofocus />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a href="recover_psw.php">
                    <small>Forgot Password?</small>
                  </a>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <div class="row">
              <div class="mb-3 col-md-6">
                <button class="btn btn-primary d-grid w-100" type="submit"><a href="home page/index.html" style="color:white">Back</a></button>
              </div>
              <div class="mb-3 col-md-6">
                <button class="btn btn-primary d-grid w-100" type="submit" name="submit">Sign in</button>
              </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

<?php


if (isset($_POST['submit'])) {
  require_once('admin/db.php');

  $email = mysqli_real_escape_string($conn, trim($_POST['username']));
  $password = trim($_POST['password']);

  $query = "SELECT * FROM `user_master` WHERE username = '$email'";
  $result = mysqli_query($conn, $query);
  echo $query;
  $count = mysqli_num_rows($result);

  if ($count > 0) {

    $fetch = mysqli_fetch_assoc($result);
    $hashpassword = $fetch["password"];

    if ($password == $hashpassword) {
      $result = mysqli_query($conn, "SELECT * FROM `user_master` WHERE username = '$email'");

      if ($result) {

        while ($row = mysqli_fetch_assoc($result)) {
          if ($row['type'] == 1) {
          

            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['mail'] = $email;

            require "login/Mail/phpmailer/PHPMailerAutoload.php";

            $mail = new PHPMailer;

            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';

            $mail->Username = 'closernxu@gmail.com';
            $mail->Password = 'agyj pipo qjcz pbxz';

            // Email details
            $mail->setFrom('closernxu@gmail.com', 'OTP Verification');
            $mail->addAddress($_POST["username"]);

            $mail->isHTML(true);
            $mail->Subject = "Your verify code";
            $mail->Body = "<p>Dear user, </p> <h3>Your verification code is: $otp <br></h3>
                <br><br>
                <p>With regards,</p>
                <b>Campus Sync</b>";

            if (!$mail->send()) {
                echo "<script>alert('Register Failed, Invalid Email')</script>";
            } else {
                echo "<script>window.alert('Login Credentials match, OTP sent to $email');
                      window.location.href='verfication.php';
                      </script>";
            }
            // $_SESSION["loggedin"] = "true";
            // $_SESSION["admin"] = "true";
            // echo "<script>alert('Login Sucessfull');
            //             window.location.href='admin/index.php';
            //             </script>";
          } elseif ($row['type'] == 2) {

            $u_id = $row['user_id'];
            $sqll = "SELECT professor_master.professor_id, professor_master.d_id, professor_master.type as type
            FROM professor_master
            JOIN user_master ON user_master.user_id = professor_master.user_id
            WHERE user_master.user_id = $u_id
            ";
            $res = mysqli_query($conn, $sqll);
            while ($rows = mysqli_fetch_assoc($res)) {
              $types = $rows['type'];
              $_SESSION['p_id'] = $rows['professor_id'];
              if($rows['d_id']!= NULL){
                $_SESSION['d_id'] = $rows['d_id'];
              }
            
            }

            switch ($types){
       
              
case 2:
              $otp = rand(100000, 999999);
              $_SESSION['otp'] = $otp;
              $_SESSION['mail'] = $email;
  
              require "login/Mail/phpmailer/PHPMailerAutoload.php";
  
              $mail = new PHPMailer;
  
              // SMTP Configuration
              $mail->isSMTP();
              $mail->Host = 'smtp.gmail.com';
              $mail->Port = 587;
              $mail->SMTPAuth = true;
              $mail->SMTPSecure = 'tls';
  
              $mail->Username = 'closernxu@gmail.com';
              $mail->Password = 'agyj pipo qjcz pbxz';
  
              // Email details
              $mail->setFrom('closernxu@gmail.com', 'OTP Verification');
              $mail->addAddress($_POST["username"]);
  
              $mail->isHTML(true);
              $mail->Subject = "Your verify code";
              $mail->Body = "<p>Dear user, </p> <h3>Your verification code is: $otp <br></h3>
                  <br><br>
                  <p>With regards,</p>
                  <b>Campus Sync</b>";
  
              if (!$mail->send()) {
                  echo "<script>alert('Login Failed, Invalid Email')</script>";
              } else {
                  echo "<script>window.alert('Login Credentials match, OTP sent to $email');
                        window.location.href='verification2.php';
                        </script>";
              }
              break;
           case 1:
              $u_id = $row['user_id'];
              $sqll = "SELECT *  FROM `professor_master` JOIN user_master on user_master.user_id = professor_master.user_id WHERE user_master.user_id = $u_id ";
              $res = mysqli_query($conn, $sqll);
              while ($rows = mysqli_fetch_assoc($res)) {
                $_SESSION['p_id'] = $rows['professor_id'];
              }

              $_SESSION['loggedin'] = "true";
              echo "<script>alert('Login Sucessfull');
  window.location.href='professor/dashboard.php';
  </script>";
            break;
          }
        } elseif ($row['type'] == 3) {

            $u_id = $row['user_id'];
            $sqll = "SELECT * FROM student_master JOIN enrollement_master on enrollement_master.student_id = student_master.student_id WHERE user_id = $u_id ";
            $res = mysqli_query($conn, $sqll);
            while ($rows = mysqli_fetch_assoc($res)) {
              $_SESSION['s_id'] = $rows['student_id'];
              $_SESSION['e_id'] = $rows['e_id'];
            }
            $_SESSION['loggedin'] = "true";
            echo "<script>alert('Login Sucessfull');
                        window.location.href='student/html/index.php';
                        </script>";
          } elseif ($row["type"] == 4) {

            $u_id = $row['user_id'];
            $sqll = "SELECT * FROM `user_master` JOIN comapny_master on comapny_master.user_id = user_master.user_id WHERE user_master.user_id =  $u_id ";
            $res = mysqli_query($conn, $sqll);
            while ($rows = mysqli_fetch_assoc($res)) {
              $_SESSION['c_id'] = $rows['company_id'];
            }
            $_SESSION['loggedin'] = "true";
            echo "<script>alert('Login Sucessfull');
                        window.location.href='company/index.php';
                        </script>";
          }
        }
      }
    } else {
      echo "<script>window.alert('Email or Password do not match, please try again');
                        window.location.href='login.php';
                        </script>";
    }
  }
}

?>


</html>