<?php
include "db.php"; // Include your database connection file
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exam Schedule</title>
    <!-- Bootstrap CSS -->
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
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>UPDATE EXAM SCHEDULE</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-body">
                            <form method="POST" action="">
                <div class="form-grou mb-3">
                    <label for="exam_id_update">Select Exam ID to Update Schedule:</label>
                    <select class="form-control mb-3" id="exam_id_update" name="exam_id" required>
                        <?php
                     $exam_sql = "SELECT exam_id, e_name, sem FROM exam_table";
                     $exam_result = mysqli_query($conn, $exam_sql);
                        $exam_result = mysqli_query($conn, $exam_sql);
                        while ($exam_row = mysqli_fetch_assoc($exam_result)) {
                            echo "<option value='" . $exam_row['exam_id'] . "'>" . $exam_row['e_name'] . " (Sem " . $exam_row['sem'] . ")</option>";
                        }
                        ?>
                    </select>
                </div>
                <center><button type="submit" name="update_schedule" class="btn btn-primary">Update Schedule</button></center>
            </form>

            </div>



        </div>           <!-- Update Schedule Form (Placeholder) -->
           
        </div>
        <?php
        // Update Schedule Section
        if (isset($_POST['update_schedule'])) {
            $exam_id_update = $_POST['exam_id'];
            $update_sql = "SELECT * FROM exam_schedule JOIN professor_subject on professor_subject.ps_id = exam_schedule.ps_id JOIN subject on subject.subject_id = professor_subject.s_id WHERE exam_id = $exam_id_update";
            $update_result = mysqli_query($conn, $update_sql);


            echo '
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
                                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>UPDATE SCHEDULE</h4>

            <form method="POST" action="">'; // Form starts here
            echo '<input type="hidden" name="exam_id_update" value="' . $exam_id_update . '">';

            while ($update_row = mysqli_fetch_assoc($update_result)) {
                echo '
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="hidden" class="form-control mb-3" value="' . $update_row['ps_id'] . '" name="subject_id[]">
                                <label for="year">Subject Name:</label>
                                <input type="text" class="form-control mb-3" value="' . $update_row['name'] . '" name="subject_name[]" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" class="form-control mb-3" name="subject_date[]" value="' . $update_row['date'] . '">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="year">Starting Time:</label>
                                <input type="time" class="form-control mb-3" name="starting_time[]" value="' . $update_row['time'] . '">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="year">Ending Time:</label>
                                <input type="text" class="form-control mb-3" name="room[]" value="' . $update_row['room'] . '">
                            </div>
                        </div>
                    </div>';
            }

            echo '<center><button type="submit" name="submit_update" class="btn btn-primary">Update Data</button></center>';
            echo '</form>'; // Form ends here
        }
        ?>

      
    </div>
                    </div></div>
                    
                    <!-- ... Your existing code ... -->
                    <?php 
include "footer.php";
?>
</div>
</body>

</html>


