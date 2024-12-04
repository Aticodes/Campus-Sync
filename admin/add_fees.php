<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "db.php";
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add fees</title>
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
</head>

<body>
    <?php include "sidebar.php"; ?>
    <div class="container">
        
        <!-- Content wrapper -->
        <div class="content-wrapper">
                    <!-- Content -->
        
                    <div class="container-xxl flex-grow-1 container-p-y">
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>ADD FEES</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-body">

        <?php
        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $class_name = $_POST['class_name'];
            $batch_id = $_POST['batch_id'];
            $course_id = $_POST['course_id'];
            $d_id = $_POST['department_id'];
            $amount = $_POST['amount'];
            $d_date = $_POST['d_date'];
            $sem = $_POST['sem'];
            // Your database connection should be established here

            $insertSql = "INSERT INTO `fees_master`( `fees_name`,`department_id`, `course_id`, `batch_id`, `sem`, `amount`, `duedate`, `status`) 
            VALUES ('$class_name','$d_id','$course_id','$batch_id','$sem','$amount','$d_date','1')";

            if ($conn->query($insertSql) === TRUE) {
                ?><script>
                Swal.fire({
             title: "Fees Added Successful",
             icon: "success"
           });</script><?php
            } else {
                echo "<script>alert('Error')</script>";
            }

            // Close your database connection here
            $conn->close();
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group mb-3">
                <label for="class_name">Fees Name:</label>
                <input type="text" class="form-control" name="class_name" required>
            </div>

            <div class="form-group mb-3">
                <label for="batch_id">Batch ID:</label>
                <select class="form-control" name="batch_id" id='bacth' required>
                    <option value="">Select Batch</option>
                    <?php
                    // Replace [your_department_query] with the actual SQL query to fetch departments
                    $departmentQuery = "select * from batch_master";
                    $departmentResult = $conn->query($departmentQuery);

                    while ($row = $departmentResult->fetch_assoc()) {
                        echo '<option value="' . $row['batch_id'] . '">' . $row['batch_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <!-- Dropdown for Department -->
                <label for="department_id">Department:</label>
                <select class="form-control" name="department_id" id='department_id' required>
                    <option value="">Select Department</option>
                    <?php
                    // Replace [your_department_query] with the actual SQL query to fetch departments
                    $departmentQuery = "select * from department";
                    $departmentResult = $conn->query($departmentQuery);

                    while ($row = $departmentResult->fetch_assoc()) {
                        echo '<option value="' . $row['d_id'] . '">' . $row['d_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <!-- Dropdown for Course -->
                <label for="course_id">Course:</label>
                </select>

                <!-- Add an 'id' to the course dropdown -->
                <select class="form-control" name="course_id" id="course_id" required>
                    <!-- Courses will be dynamically populated based on the selected department -->
                </select>
                <div class="form-group mb-3 mt-3">
                    <label for="class_name">Sem : </label>
                    <select class="form-control" name="sem" id="sem" required>
                        <?php
                        // Generate options for semesters 1 to 8
                        for ($i = 1; $i <= 8; $i++) {
                            echo '<option value="' . $i . '">Semester ' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="class_name">Amount:</label>
                    <input type="number" class="form-control" name="amount" required>
                </div>

                <div class="form-group mb-3">
                    <label for="class_name">Due Date</label>
                    <input type="date" class="form-control" name="d_date" required>
                </div>


                <script>
                    // JavaScript to handle dynamic population of courses based on selected department
                    document.getElementById('department_id').addEventListener('change', function() {
                        var departmentId = this.value;

                        // Use AJAX to fetch courses based on the selected department
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'get_courses.php?department_id=' + departmentId, true);
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                // Update the courses dropdown with the fetched courses
                                document.getElementById('course_id').innerHTML = xhr.responseText;
                            } else {
                                console.error('Failed to fetch courses.');
                            }
                        };
                        xhr.send();
                    });
                </script>
            </div>
            <br>
            <center><button type="submit" class="btn btn-primary">Add Fees</button></center>
        </form>
    </div></div></div></div></div></div></div>
        <?php include "footer.php"; ?>
                          </div>                   
</body>

</html>