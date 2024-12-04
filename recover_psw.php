<?php session_start() ?>
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">


<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" type="image/png" href="CampusSync.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

<!-- Icons. Uncomment required icon fonts -->
<link rel="icon" type="image/png" href="CampusSync.png">

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
    <title>Recover Password</title>
</head>

<body>

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
            <h4 class="mb-2">Password Recovery</h4>
            <p class="mb-4">Please enter youre email to recover password</p>

            <form id="formAuthentication" class="mb-3" action="#" method="POST" name="recover_psw">
              <div class="mb-5">
                <label for="email" class="form-label">Email Address</label>
                <input type="text" id="email_address" class="form-control" name="email"  placeholder="Enter your email or username" required autofocus />
              </div>
              
              <div class="mb-3 row">
              <div class="col-md-6">
              <button class="btn btn-primary d-grid w-100" type="submit"><a href="index.php" style="color: white;">Back</a></button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-primary d-grid w-100" type="submit" value="Recover" name="recover">Recover</button>
              </div>  
            </div>
            </form>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

                   

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

</html>

<?php 
    if(isset($_POST["recover"])){
        include('admin/db.php');
        $email = $_POST["email"];

        $sql = mysqli_query($conn, "SELECT * FROM user_master WHERE username='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
<script>
alert("<?php  echo "Sorry, no emails exists "?>");
</script>
<?php
        }
            // generate token by binaryhexa 
    
            // Generate a random password
            $newPassword = bin2hex(random_bytes(4)); // Generates a random 16-character password
            
            // Update the password in the database
            $sqll = "UPDATE user_master SET user_master.password = '$newPassword' WHERE user_master.username = '$email';";
            if ($res = mysqli_query($conn, $sqll)) {
                // Start session
                session_start();
                
                // Store new password and email in session
                $_SESSION['new_password'] = $newPassword;
                $_SESSION['email'] = $email;
            
                // Include PHPMailer library
                require "login-system-main/Mail/phpmailer/PHPMailerAutoload.php";
                $mail = new PHPMailer;
            
                // Configure mailer
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';
            
                // Gmail credentials
                $mail->Username = 'closernxu@gmail.com';
                $mail->Password = 'agyj pipo qjcz pbxz';
            
                // Set sender
                $mail->setFrom('closernxu@gmail.com', 'Password Reset');
            
                // Set recipient
                $mail->addAddress($_POST["email"]);
            
                // HTML body
                $mail->isHTML(true);
                $mail->Subject = "Your New Password";
                $mail->Body = "<b>Dear User</b>
                        <p>Your password has been successfully reset.</p>
                        <p>Your new password is: <strong>$newPassword</strong></p>
                        <br><br>
                        <p>Regards,</p>
                        <b>Campus Sync</b>";
            
                // Send email
                if (!$mail->send()) {
                    ?>
                    <script>
                        alert("<?php echo "Invalid Email" ?>");
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                      alert("Please Check You mail for new Password");
                        window.location.replace("index.php");
                    </script>
                    <?php
                }
            }}
            ?>
            
        
    


