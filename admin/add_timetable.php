<!DOCTYPE html>
<?php 
include "db.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allocate Timetable</title>
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

           <?php
    // Include your database connection file or configure it here

    // Function to fetch professor subjects (Replace this with your actual database query)
    function fetchProfessorSubjects() {
        // Example: return $yourDatabaseConnection->query("SELECT * FROM professor_subject")->fetch_all(MYSQLI_ASSOC);
    }

    // Function to fetch classes (Replace this with your actual database query)
    function fetchClasses() {
        // Example: return $yourDatabaseConnection->query("SELECT * FROM class_table")->fetch_all(MYSQLI_ASSOC);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ps_id = $_POST['ps_id'];
        $class_id = $_POST['class_id'];
        $time = $_POST['time'];
        $room_no = $_POST['room_no'];
        $remarks = $_POST['remarks'];
        $date = $_POST['date'];

    

        $conflictCheckSql = "SELECT * FROM timetable WHERE ps_id = '$ps_id' AND date = '$date' AND time = '$time'";
    $conflictCheckResult = $conn->query($conflictCheckSql);

    if ($conflictCheckResult !== false && $conflictCheckResult->num_rows > 0) {
        echo '<div class="alert alert-danger" role="alert">Error: Professor already has a lecture at the same time and date.</div>';
    } else {
        // No conflict, proceed with insertion
        $insertSql = "INSERT INTO timetable (ps_id, class_id, time, room_no, remarks, date,status) 
                      VALUES ('$ps_id', '$class_id', '$time', '$room_no', '$remarks', '$date','1')";

        if ($conn->query($insertSql) === TRUE) {
            ?><script>
        Swal.fire({
     title: "Lecture Allocated Successful",
     icon: "success"
   });</script><?php
        } else {
            echo '<div class="alert alert-danger" role="alert">Error allocating timetable.</div>';
        }
    }

      
    }
    ?>   

<div class="container">
        
        <!-- Content wrapper -->
        <div class="content-wrapper">
                    <!-- Content -->
        
                    <div class="container-xxl flex-grow-1 container-p-y">
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>ALLOCATE TIMETABLE</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                              <div class="form-group mb-3 mt-3">
            <label for="ps_id">Professor-Subject:</label>
           
    <?php
   
$sql = "SELECT 
ps.ps_id, 
CONCAT(pm.p_firstname, ' ', pm.p_lastname, ' - ', s.name) AS display_text
FROM professor_subject ps
JOIN professor_master pm ON ps.p_id = pm.professor_id
JOIN subject s ON ps.s_id = s.subject_id";

$result = $conn->query($sql);

if ($result !== false && $result->num_rows > 0) {
echo '<select class="form-control" name="ps_id" required>';
while ($ps = $result->fetch_assoc()) {
echo "<option value='{$ps['ps_id']}'>{$ps['display_text']}</option>";
}
echo '</select>';
} else {
echo "<p>No data available</p>";
}


?>

        </div>
 

                <div class="form-group mb-3">
            <label for="class_id">Class:</label> <?php

            $classSql = "SELECT `class_id`, `class_name`, `batch_id`, `course_id` FROM `class_master`";
$classResult = $conn->query($classSql);

if ($classResult !== false && $classResult->num_rows > 0) {
    echo '<select class="form-control" name="class_id" required>';
    while ($class = $classResult->fetch_assoc()) {
        echo "<option value='{$class['class_id']}'>{$class['class_name']}</option>";
    }
    echo '</select>';
} else {
    echo "<p>No class data available</p>";
}


?>
        </div>

                <div class="form-group mb-3">
            <label for="time">Time:</label>
            <input type="text" class="form-control" name="time" required>
        </div>

        <div class="form-group mb-3">
            <label for="room_no">Room No:</label>
            <input type="text" class="form-control" name="room_no" required>
        </div>

        <div class="form-group mb-3">
            <label for="remarks">Remarks:</label>
            <input type="text" class="form-control" name="remarks">
        </div>

        <div class="form-group mb-3">
            <label for="date">Date:</label>
            <input type="date" class="form-control" name="date" required>
        </div>

                <center><button type="submit" class="btn btn-primary mt-4" name="submit">Submit</button></center>
           
        </form>
                            </div></div></div></div></div></div></div>


<?php 
include "footer.php";
?>
</body>
</html>
