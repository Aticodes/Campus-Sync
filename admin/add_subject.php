<?php
include "db.php"; // Include your database connection file

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject</title>
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
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>ADD SUBJECTS</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-body">
            <form method="POST" action="">
                <!-- Subject Name Field -->
                <div class="form-group mb-3">
                    <label for="subject_name">Subject Name:</label>
                    <input type="text" class="form-control" id="subject_name" name="subject_name" required>
                </div>

                <!-- Credit Field -->
                <div class="form-group mb-3">
                    <label for="credit">Credit:</label>
                    <input type="number" class="form-control" id="credit" name="credit" required>
                </div>

                <!-- Course ID Field -->
                <div class="form-group mb-3">
                    <label for="batch_id">Courses:</label>
                    <select class="form-control" id="batch_id" name="c_id" >
                        <?php
                        $batch_sql = "SELECT * FROM courses";
                        $batch_result = mysqli_query($conn, $batch_sql);
                        while ($batch_row = mysqli_fetch_assoc($batch_result)) {
                            echo "<option value='" . $batch_row['c_id'] . "'>" . $batch_row['c_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Year Field -->
                <div class="form-group mb-3">
                    <label for="year">Year:</label>
                    <input type="text" class="form-control" id="year" name="year" required>
                </div>

                <!-- Semester Field -->
                <div class="form-group mb-3">
                    <label for="sem">Semester:</label>
                    <input type="text" class="form-control" id="sem" name="sem" required>
                </div>

                <!-- Submit Button -->
                <center><button type="submit" class="btn btn-primary">Submit</button></center>
            </form>
        </div>
    </div>
</div>
<?php 
include "footer.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $subject_name = $_POST["subject_name"];
    $credit = $_POST["credit"];
    $c_id = $_POST["c_id"];
    $year = $_POST["year"];
    $sem = $_POST["sem"];

    // Insert data into the subject table
    $insert_sql = "INSERT INTO subject (name, credit, c_id, year, sem) 
                   VALUES ('$subject_name', '$credit', '$c_id', '$year', '$sem')";

    if (mysqli_query($conn, $insert_sql)) {
        ?><script>
        Swal.fire({
     title: "Subject Added Successful",
     icon: "success"
   });</script><?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
</body>
</html>
