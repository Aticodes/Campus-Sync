<?php
include "db.php";
// Fetch professor and subject data for dropdowns
$professorSql = "SELECT * FROM professor_master";
$professorResult = mysqli_query($conn, $professorSql);

$subjectSql = "SELECT * FROM subject";
$subjectResult = mysqli_query($conn, $subjectSql);

// Close the database connection

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
    <title>Insert Professor-Subject</title>
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
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>ASSIGN PROFESSOR TO SUBJECTS</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-body">
                <form method="post">
                <!-- Professor ID Field -->
                <div class="form-group mb-3">
                    <label for="professor_id">Professor:</label>
                    <select class="form-control" id="professor_id" name="p_id" required>
                        <?php
                        while ($professorRow = mysqli_fetch_assoc($professorResult)) {
                            echo "<option value='" . $professorRow['professor_id'] . "'>" . $professorRow['p_firstname'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Subject ID Field -->
                <div class="form-group mb-3">
                    <label for="subject_id">Subject:</label>
                    <select class="form-control" id="subject_id" name="s_id" required>
                        <?php
                        while ($subjectRow = mysqli_fetch_assoc($subjectResult)) {
                            echo "<option value='" . $subjectRow['subject_id'] . "'>" . $subjectRow['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Other Fields -->
               

                <div class="form-group mb-3">
                    <label for="status">Status:</label>
                   <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="2">Disabled</option>
                   </select>
                </div>

                <!-- Submit Button -->
                <center><button type="submit" class="btn btn-primary">Assign Professor</button></center>
            </form>
        </div>
    </div>
</div>
                      </div></div></div>
                    
<?php 
include "footer.php";
?>
                    </div>
</body>
</html>
<?php

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $professorId = $_POST['p_id'];
    $subjectId = $_POST['s_id'];
    $assignBy = 1;
    $status = $_POST['status'];

    // Insert into professor_subject table
    $insertSql = "INSERT INTO professor_subject ( p_id, s_id, assign_by, status)
                  VALUES ( '$professorId', '$subjectId', '$assignBy', '$status')";

    if ($conn->query($insertSql) === TRUE) {
        ?><script>
        Swal.fire({
     title: "Professor Assigned Successful",
     icon: "success"
   });</script><?php
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

?>