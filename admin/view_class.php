<?php
// Replace these database connection details with your own
include "db.php";


// Fetch subject and course data from the database with a simple JOIN
$sql = "SELECT *
        FROM class_master join batch_master on batch_master.batch_id = class_master.batch_id Join courses on courses.c_id = class_master.course_id order by batch_year desc";

$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
  <title>View Classes</title>
</head>
<body>
<?php
include "sidebar.php";
?>

<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            
                <div class="card">
                    <h5 class="card-header">Class</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                        <th>Class ID</th>
                        <th> CLass Name</th>    
                        <th>Batch Name</th>
                        <th>Batch Year</th>
                        <th>Course</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
        // Output data from the joined result set
        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['class_id']}</td>
                  <td>{$row['class_name']}</td>
                  <td>{$row['batch_name']}</td>
                  <td>{$row['class_name']}</td>
                  <td>{$row['c_name']}</td>
           
              
                </tr>";
        }
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