<?php
include "db.php"; // Include your database connection file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exam</title>
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
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>ADD EXAMS</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        
                        <div class="col-xl">
                          <div class="card mb-4">
                           
                            <div class="card-body">
            <form method="POST" action="">
                <!-- Exam Name Field -->
                <div class="form-group mb-3">
                    <label for="exam_name">Exam Name:</label>
                    <input type="text" class="form-control" id="exam_name" name="exam_name" required>
                </div>

                <!-- Course ID Field (You can replace this with your actual course selection logic) -->
                <div class="form-group mb-3">
                    <label for="batch_id">Courses:</label>
                    <select class="form-control" id="batch_id" name="course_id" >
                        <?php
                        $batch_sql = "SELECT * FROM courses";
                        $batch_result = mysqli_query($conn, $batch_sql);
                        while ($batch_row = mysqli_fetch_assoc($batch_result)) {
                            echo "<option value='" . $batch_row['c_id'] . "'>" . $batch_row['c_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Batch ID Field -->
                <div class="form-group mb-3">
                    <label for="batch_id">Classes:</label>
                    <select class="form-control" id="batch_id" name="batch_id" required>
                        <?php
                        $batch_sql = "SELECT * FROM class_master Join batch_master on batch_master.batch_id = class_master.batch_id";
                        $batch_result = mysqli_query($conn, $batch_sql);
                        while ($batch_row = mysqli_fetch_assoc($batch_result)) {
                            echo "<option value='" . $batch_row['class_id'] . "'>" . $batch_row['batch_name'] . " (" . $batch_row['class_name'] . ")</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Semester Field -->
                <div class="form-group mb-3">
                    <label for="sem">Semester:</label>
                    <input type="text" class="form-control" id="sem" name="sem" required>
                </div>

                <!-- Submit Button -->
               <center> <button type="submit" class="btn btn-primary mt-4" name="submit">Submit</button></center>
            </form>
        </div>
                          </div></div></div></div></div></div>
                          <?php 
include "footer.php";
?>
</div>
</div>
</body>
</html>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $exam_name = $_POST["exam_name"];
    $course_id = $_POST["course_id"];
    $batch_id = $_POST["batch_id"];
    $sem = $_POST["sem"];
    $done =1;

    // Insert data into the exam_table
    $insert_sql = "INSERT INTO exam_table (e_name, course_id, class_id, sem, done) 
                   VALUES ('$exam_name', '$course_id', '$batch_id', '$sem','$done')";

    if (mysqli_query($conn, $insert_sql)) {
        ?><script>
        Swal.fire({
     title: "Exam Added Successful",
     icon: "success"
   });</script><?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
