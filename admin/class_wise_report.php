<?php
include "db.php";
// Include your database connection file here


// Handle form submissions
if (isset($_POST['submit'])) {
    // Filter values
 $course_id = $_POST['course_id'];
    $query = "SELECT * FROM student_master JOIN enrollement_master on enrollement_master.student_id = student_master.student_id WHERE enrollement_master.course_id = '$course_id';";
    $result = mysqli_query($conn, $query);
    // echo $query

    
}
else{
// Fetch data from the student_master table based on the filters
$query = "SELECT * FROM student_master ";
}
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Data</title>
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

<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
    <h5 class="card-header">FILTERS</h5>
    <hr>
      <div class="card-body">
       
      <form method="post">
        <div class="row">
            <div class="col-md-4">
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
            <div class="col-md-4">
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
            <div class="col-md-4">
            <label for="Course">course : </label>
            <select class="form-control" name="course_id" id="course_id" required>
                    <!-- Courses will be dynamically populated based on the selected department -->
                </select>
            </div>
        </div><br>
   
    
    <!-- Add input field for image if needed -->
    <hr><center>
    <input type="submit" value="Generate Report" name="submit"></center>
</form>



        </div>
    </div>
</div>
</div>
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            
                <div class="card">
                    <h5 class="card-header">VIEW RESULTS</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                        <th scope="col">Student ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Father's Name</th>
                    <th scope="col">Mother's Name</th>
                    <th scope="col">Father's Phone</th>
                    <th scope="col">Admission Date</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <th scope="row"><?php echo $row['student_id']; ?></th>
                        <td><?php echo $row['s_firstname']; ?></td>
                        <td><?php echo $row['s_lastname']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['address1']; ?></td>
                        <td><?php echo $row['phone_no']; ?></td>
                        <td><?php echo $row['father_name']; ?></td>
                        <td><?php echo $row['mother_name']; ?></td>
                        <td><?php echo $row['father_phone']; ?></td>
                        <td><?php echo $row['admission_date']; ?></td>
                        <td><?php echo $row['blood_group']; ?></td>
                        <td><?php echo $row['sex']; ?></td>
                        <td><?php echo $row['remarks']; ?></td>
                        
                    </tr>
                <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-Uo7fATBz0G6BRKK5U7Vu4dXP9uZQjxkhjq0lFXwF8eFfOgC8OdZMz2a9aCWoJgx"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <?php 
include "footer.php";
?>
</div>
</body>

</html>
