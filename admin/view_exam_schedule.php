<!-- ... Your existing code ... -->
<?php
include "db.php"; // Include your database connection file


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exam Schedule</title>
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
                      
        
                      <!-- Basic Layout -->
                      <div class="row">
                        
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-body">
                            <form method="POST" action="">
                    <h3 class="mb-4">View Exam Schedule</h3>

                    <!-- Exam ID Field -->
                    <div class="form-group mb-3">
                        <label for="exam_id">Exam ID:</label>
                        <select class="form-control" id="exam_id" name="exam_id" required>
                            <?php
                            $exam_sql = "SELECT exam_id, e_name, sem FROM exam_table";
                            $exam_result = mysqli_query($conn, $exam_sql);
                            while ($exam_row = mysqli_fetch_assoc($exam_result)) {
                                echo "<option value='" . $exam_row['exam_id'] . "'>" . $exam_row['e_name'] . " (Sem " . $exam_row['sem'] . ")</option>";
                            }
                            ?>

                        </select>
                    </div>
                    <center><button type="submit" name="submit1" class="btn btn-primary">Submit</button></center>
                </form>


            </div>


              
            </div>



        </div>
<?php
// View Schedule Section
if (isset($_POST['submit1'])) {
    $exam_id = $_POST['exam_id'];
    $view_sql = "SELECT * FROM exam_schedule 
    JOIN professor_subject on professor_subject.ps_id = exam_schedule.ps_id 
    JOIN subject on subject.subject_id = professor_subject.s_id 
    WHERE exam_id = $exam_id";
    $view_result = mysqli_query($conn, $view_sql);
    echo '
    <div class="container">
       
    <div class="content-wrapper">
                <!-- Content -->
    
                <div class="container-xxl flex-grow-1 container-p-y">
                
                    <div class="card">
                        <h5 class="card-header">EXAM SCHEDULE</h5>
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Professor Subject ID</th>
                    <th>Subject Name</th>
                    <th>Date</th>
                    <th>Starting Time</th>
                    <th>Room</th>
                </tr>
            </thead>
            <tbody>';

    while ($view_row = mysqli_fetch_assoc($view_result)) {
        echo "<tr>
                <td>{$view_row['ps_id']}</td>
                <td>{$view_row['name']}</td>
                <td>{$view_row['date']}</td>
                <td>{$view_row['time']}</td>
                <td>{$view_row['room']}</td>
              </tr>";
    }

    echo '</tbody></table>';
}


?>
<!-- ... Your existing code ... -->



   
</div>

<!-- ... Your existing code ... -->



<?php

// Close your database connection if it's open
mysqli_close($conn);
?>

                    </div></div>
                    
                    <?php 
include "footer.php";
?>
</div>
</body></html>