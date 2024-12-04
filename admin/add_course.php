<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Information Form</title>
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
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>COURSES INFORMATION FORM</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        
                        <div class="col-xl">
                          <div class="card mb-4">
                           
                            <div class="card-body">
                              <form action="#" method="post">
             
                <label class="form-label" for="c_name">Course Name:</label>
                <div class="input-group input-group-merge mb-3">
                    <input type="text" class="form-control" name="c_name" aria-label="John Doe"
                        aria-describedby="basic-icon-default-fullname2" required>
                </div>

                <label class="form-label" for="years">Years:</label>
                <div class="input-group input-group-merge mb-3">
                    <input type="text" class="form-control" name="years" aria-label="John Doe"
                        aria-describedby="basic-icon-default-fullname2" required>
                </div>

                <label class="form-label" for="createdon">Created On:</label>
                <div class="input-group input-group-merge mb-3">
                    <input type="date" class="form-control" name="createdon" aria-label="John Doe"
                        aria-describedby="basic-icon-default-fullname2" required>
                </div>

            <!-- <label for="createdby">Created By:</label>
            <input type="text" name="createdby" required> -->
            <div class="mb-3">
                  <label for="d_id" class="form-label">Department:</label>
                      <select class="form-select" name="d_id" aria-label="Default select example">
                      <?php
                // Include your database connection file here
                include 'db.php';

                // Fetch departments from the database
                $result = mysqli_query($conn, "SELECT * FROM department");

                // Loop through each department to create options
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['d_id'] . "'>" . $row['d_name'] . "</option>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
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
    $c_name = $_POST['c_name'];
    $years = $_POST['years'];
    $createdon = $_POST['createdon'];
    // $createdby = $_POST['createdby'];
    $d_id = $_POST['d_id'];

    // SQL query for inserting data into the courses table
    $insertQuery = "INSERT INTO courses (c_name, years, createdon, createdby, d_id) VALUES ('$c_name', '$years', '$createdon', '1', '$d_id')";

    // Execute the query
    if (mysqli_query($conn, $insertQuery)) {
        ?><script>
     Swal.fire({
  title: "Course Added Successful",
  icon: "success"
});</script><?php
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
