<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Information Form</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />



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
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>DEPARTMENT INFORMATION FORM</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-body">
                              <form action="#" method="post">
                <label for="d_name" class="form-label">Department Name:</label>
                <div class="input-group input-group-merge">                
                    <input type="text" class="form-control" name="d_name" aria-label="John Doe"
                        aria-describedby="basic-icon-default-fullname2" required>
                </div>
 
                <label for="createdon" class="form-label">Created On:</label>
                <div class="input-group input-group-merge">       
                    <input type="date" class="form-control" name="createdon" aria-label="John Doe"
                        aria-describedby="basic-icon-default-fullname2" required>
                </div>
                        
                <div class="mb-3">
                  <label for="status" class="form-label">Status:</label>
                      <select class="form-select" name ="status" aria-label="Default select example">
                          <option selected>Open this select menu</option>
                          <option value= "1">Activated</option>
                          <option value= "2">Blocked</option>
                      </select>
                </div>

                <center><button type="submit" class="btn btn-primary mt-4" name="submit">Submit</button></center>
           
        </form>
                            </div></div></div></div></div></div></div>
        <?php 
include "footer.php";
?>
</div>
</body>

</html>
<?php
// Include your database connection file here
include 'db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $d_name = $_POST['d_name'];
    $createdon = $_POST['createdon'];
    $status = $_POST['status'];

    // SQL query for inserting data into the department table
    $insertQuery = "INSERT INTO department (d_name, createdon, status) VALUES ('$d_name', '$createdon', '$status')";

    // Execute the query
    if (mysqli_query($conn, $insertQuery)) {
      ?><script>
      Swal.fire({
   title: "Department Added Successful",
   icon: "success"
 });</script><?php
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
