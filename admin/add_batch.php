

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Add batch</title>

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
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>ADD BATCH</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-body">
            <form method="POST" action="">
                 <!-- Batch Name Field -->
                <div class="form-group mb-3">
                    <label for="batch_name">Batch Name:</label>
                    <input type="text" class="form-control" id="batch_name" name="batch_name" required>
                </div>

                <!-- Batch Year Field -->
                <div class="form-group mb-3">
                    <label for="batch_year">Batch Year:</label>
                    <input type="number" class="form-control" id="batch_year" name="batch_year" required>
                </div>

                <!-- Submit Button -->
                <center><button type="submit" class="btn btn-primary">Submit</button></center>
            </form>
        </div>
    </div>
</div>
<?php 
include "footer.php";
?>

</body>
</html>
<?php
include "db.php"; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $batch_name = $_POST["batch_name"];
    $batch_year = $_POST["batch_year"];

    // Insert data into the batch_master table
    $insert_sql = "INSERT INTO batch_master (batch_name, batch_year) 
                   VALUES ('$batch_name', '$batch_year')";

    if (mysqli_query($conn, $insert_sql)) {
    ?><script>
     Swal.fire({
  title: "Batch Added Successful",
  icon: "success"
});</script><?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>