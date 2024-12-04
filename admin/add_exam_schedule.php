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
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>ADD EXAM SCHEDULE</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-body">
                <form method="POST" action="">
                    <!-- Exam ID Field -->
                    <div class="form-group mb-3">
                        <label for="exam_id">Exam ID:</label>
                        <select class="form-control" id="exam_id" name="exam_id" required>
                            <?php
                            $exam_sql = "SELECT exam_id, e_name, sem FROM exam_table where done=1";
                            $exam_result = mysqli_query($conn, $exam_sql);
                            while ($exam_row = mysqli_fetch_assoc($exam_result)) {
                                echo "<option value='" . $exam_row['exam_id'] . "'>" . $exam_row['e_name'] . " (Sem " . $exam_row['sem'] . ")</option>";
                            }
                            ?>

                        </select>
                    </div>
                  <center>  <button type="submit" name="submit1" class="btn btn-primary">Submit</button> </center>
                </form>

            </div>



        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
            <?php



if (isset($_POST['submit1'])) {
   
    $_SESSION['exam_id'] = $_POST['exam_id'];
    $exam_id = $_POST['exam_id'];
    $sql = "SELECT subject.name AS s_name, subject.subject_id, subject.credit , ps_id FROM subject JOIN professor_subject ON professor_subject.s_id = subject.subject_id
     JOIN exam_table ON exam_table.course_id = subject.c_id AND exam_table.sem = subject.sem WHERE exam_table.exam_id =$exam_id ";
    if ($result = mysqli_query($conn, $sql)) {
       ?><div class="container" style="width: 100%;">
        
       <!-- Content wrapper -->
       <div class="content-wrapper">
                   <!-- Content -->
       
                   <div class="container-xxl flex-grow-1 container-p-y">
                     
                     <!-- Basic Layout -->
                     <div class="row">
                       
                       <div class="col-xl">
                         <div class="card mb-4">
                           <div class="card-body">
                           <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Subject list of selected exam to add the schedule</h4>    <?php
        echo '<form method="POST" action="">'; // Form starts here
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            
            
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                      
                        <input type="hidden" class="form-control" id="year" value="' . $row['ps_id'] . '" name="subject_id[]" readonly>
                            <label for="year">Subject Name:</label>
                            <input type="text" class="form-control" id="year" value="' . $row['s_name'] . '" name="subject_name[]" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" name="subject_date[]">
                        </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group">
                        <label for="year">Room:</label>
                        <input type="text" class="form-control" name="Room[]">
                    </div>
                </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="year">Start Time:</label>
                            <input type="time" class="form-control" name="starting_time[]">
                    </div>
</div>
                       
                    <div class="col-md-3 mb-3">
                        <div class="form-group">
                            <label for="year">Ending Time:</label>
                            <input type="time" class="form-control" name="ending_time[]">
                        </div>
                    </div>
                </div>';
        }
        echo '<center><button type="submit" name="submit2" class="btn btn-primary">Insert Data</button></center>';
        echo '</form>'; // Form ends here
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// ... Your code above ...

if (isset($_POST['submit2'])) {
    // Insert data into the database here
    $subject_ids = $_POST['subject_id'];
    $subject_dates = $_POST['subject_date'];
    $starting_times = $_POST['starting_time'];
    $ending_times = $_POST['ending_time'];
    $rooms = $_POST['Room'];

$exam_id = $_SESSION['exam_id'];
    // Loop through the arrays and insert data
    for ($i = 0; $i < count($subject_ids); $i++) {
        $subject_id = mysqli_real_escape_string($conn, $subject_ids[$i]);
        $subject_date = mysqli_real_escape_string($conn, $subject_dates[$i]);
        $starting_time = mysqli_real_escape_string($conn, $starting_times[$i]);
        $ending_time = mysqli_real_escape_string($conn, $ending_times[$i]);
        $room = mysqli_real_escape_string($conn, $rooms[$i]);
        $insert_sql = "INSERT INTO exam_schedule (exam_id, date, ps_id, time, room, status) VALUES ('$exam_id', '$subject_date', '$subject_id', '$starting_time', '$room','1')";

        if (mysqli_query($conn, $insert_sql)) {
       
        } else {
            echo "Error inserting record for subject ID: $subject_id - " . mysqli_error($conn) . "<br>";
        }
    
    }
    $update = "UPDATE exam_table SET done = 2 WHERE exam_id = $exam_id";
    if (mysqli_query($conn, $update)) {
       
    } else {
        echo "Error inserting record for subject ID: $subject_id - " . mysqli_error($conn) . "<br>";
    }
    
    if (1==1) {?><script>
        Swal.fire({
     title: "Exam Schedule Added Successful",
     icon: "success"
   });</script><?php
       
    } 
}
?>






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
