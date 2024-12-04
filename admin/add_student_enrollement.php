<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

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
    <title>Student Enrollment</title>
</head>

<?php
include "db.php";

?>

<body>
    <?php
    include "sidebar.php";
    ?>
    <div class="container">
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>STUDENT ENROLLEMENT FORM</h4>

                <!-- Basic Layout -->
                <div class="row">

                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form method="POST">

                                    
                                    <div class="mb-3">
                                        <select name="student" class="form-select">
                                            <?php
                                            include "db.php";
                                            $sql = "SELECT * FROM student_master WHERE student_master.student_id NOT IN( SELECT enrollement_master.student_id FROM enrollement_master WHERE enrollement_master.status = 1);";
                                            if ($result = mysqli_query($conn, $sql)) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='" . $row['student_id'] . "'>" . $row['s_firstname'] . " " . $row['s_lastname'] . "</option>";
                                                }
                                            }
                                            ?>



                                        </select>
                                    </div>

                                    <div class="mb-3">
    <select name="course" id="courseSelect" class="form-select">
        <option>Select Your Course </option>
        <?php
        include "db.php";
        $sql = "SELECT * FROM courses";
        if ($result = mysqli_query($conn, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['c_id'] . "'>" . $row['c_name'] . "</option>";
            }
        }
        ?>
    </select>
</div>

<div class="mb-3">
    <select name="class" id="classSelect" class="form-select">
        <!-- Classes will be dynamically loaded here using JavaScript -->
    </select>
</div>

<script>
    document.getElementById("courseSelect").addEventListener("change", function() {
        var courseId = this.value;
        
        // Send an AJAX request to fetch classes based on the selected course
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_classes.php?course_id=" + courseId, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Update the class dropdown with the fetched data
                document.getElementById("classSelect").innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
</script>

                                    <center><button type="submit" class="btn btn-primary mt-4" name="submit">Submit</button></center>

                                </form>
                                </center>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include "footer.php";
        ?>
    </div>
</body>

</html>
<?php


if (isset($_POST['submit'])) {
    // Retrieve values from the form
    $course_id = $_POST["course"];
    $student_id = $_POST["student"];
    $class = $_POST["class"];
    // Status 1 = "JOined and Active
    // status 2 = Completed
    //status 3= Dropped
    // Get today's date
    $joined_on = date("Y-m-d");

    // Set default values
    $status = "1";
    $completed = 0;

    

    // Insert data into the enrollement_master table
    $insert_sql = "INSERT INTO enrollement_master (course_id, student_id, class_id, status, joined_on, completed) 
                   VALUES ('$course_id', '$student_id', '$class', '$status', '$joined_on', '$completed')";

    if (mysqli_query($conn, $insert_sql)) {
        ?><script>
        Swal.fire({
     title: "Student Enrollement Successful",
     icon: "success"
   });</script><?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>