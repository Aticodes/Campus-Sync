<?php

include 'db.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Add company</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

<body>
<?php
include "sidebar.php";
?>
  <div class="container">
        
        <!-- Content wrapper -->
        <div class="content-wrapper">
                    <!-- Content -->
        
                    <div class="container-xxl flex-grow-1 container-p-y">
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>ADD COMPANY</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-body">
            <form action="#" method="post">
               
                        <!-- Left Column -->
                        <div class="form-group mb-3">
                            <label for="student_id">Username</label>
                            <input type="text" class="form-control" name="company_name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" name="company_address" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone_no">Contact Person Name:</label>
                            <input type="text" class="form-control" name="company_contact_person" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone_no">Phone Number:</label>
                            <input type="text" class="form-control" name="company_contact_no" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="father_name">Email:</label>
                            <input type="email" class="form-control" name="company_email" required>
                        </div>
                   

                
                    <div class="form-group">
                        <center><button type="submit" class="btn btn-primary btn-large mt-2">Submit</button></center>
                    </div>
                
        </div>
        </form>
    </div>
    </div>
    </div>

    <?php
    // Ensure that the form is submitted using POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       

        // Get values from the form
        $company_name = $_POST["company_name"];
        // $user_id = $_POST["user_id"];
        // $s_firstname = $_POST["s_firstname"];
        // $s_lastname = $_POST["s_lastname"];
        // $dob = $_POST["dob"];
        $company_address = $_POST["company_address"];
        $company_contact_person = $_POST["company_contact_person"];
        $company_contact_no = $_POST["company_contact_no"];
        $company_email = $_POST["company_email"];
        // $father_phone = $_POST["father_phone"];
        // $admission_date = $_POST["admission_date"];
        // $blood_group = $_POST["blood_group"];
        // $sex = $_POST["sex"];
        // $remarks = $_POST["remarks"];


        $sql = "INSERT INTO `user_master`( `username`, `password`, `type`) VALUES ('$company_email','$company_name',4)";
        if (mysqli_query($conn,$sql)) {
           
           $user_id = mysqli_insert_id($conn);
            $sql = "INSERT INTO `comapny_master`( `name`, `address`, `contact_person`, `contact_no`, `email`, `user_id`) 
        VALUES ('$company_name', '$company_address', '$company_contact_person', '$company_contact_no', '$company_email','$user_id')";

        if (mysqli_query($conn,$sql)) {
          ?><script>
     Swal.fire({
  title: "Company Added Successful",
  icon: "success"
});</script><?php
        } else {
            echo "Error: " . $conn->error;
        }
        } else {
            echo "Error: " . $conn->error;
        }
        // Prepare and execute the SQL statement
        

        // Close the database connection
        $conn->close();
    }
    ?>
    </main>
            </div>
        </div>
        <?php 
include "footer.php";
?>
        </div>
    </body>
</html>