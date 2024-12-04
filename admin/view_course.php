<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Courses</title>
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
   
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            
                <div class="card">
                    <h5 class="card-header">VIEW COURSES</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Years</th>
                        <th scope="col">Created On</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Department ID</th>
                        <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                // Include your database connection file here
                include 'db.php';

                // Fetch courses from the database
                $result = mysqli_query($conn, "SELECT * FROM courses");

                // Loop through each course and display data
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['c_id'] . "</td>";
                    echo "<td>" . $row['c_name'] . "</td>";
                    echo "<td>" . $row['years'] . "</td>";
                    echo "<td>" . $row['createdon'] . "</td>";
                    echo "<td>" . $row['createdby'] . "</td>";
                    echo "<td>" . $row['d_id'] . "</td>";
                    echo "<td><a class='update-btn' href='update_course.php?id=" . $row['c_id'] . "'>Update</a></td>";
                    echo "</tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
 </div>


<?php 
include "footer.php";
?>
</body>

</html>
