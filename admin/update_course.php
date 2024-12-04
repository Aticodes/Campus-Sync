<?php
include 'db.php'; // Include your database connection file

// Check if the course ID is set in the URL
if (isset($_GET['id'])) {
    $course_id = $_GET['id'];

    $department_query = "SELECT * FROM department";
    $department_result = mysqli_query($conn, $department_query);
    // Fetch course details based on the course ID
    $result = mysqli_query($conn, "SELECT * FROM courses WHERE c_id = $course_id");

    // Check if the course exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Store course details in variables
        $c_name = $row['c_name'];
        $years = $row['years'];
        $createdon = $row['createdon'];
        $createdby = $row['createdby'];
        $d_id = $row['d_id'];
    } else {
        // Redirect to the view_course page if the course doesn't exist
        header('location: view_course.php');
        exit();
    }
} else {
    // Redirect to the view_course page if the course ID is not set
    header('location: view_course.php');
    exit();
}

// Check if the form is submitted
if (isset($_POST['update'])) {
    // Get values from the form
    $c_name = $_POST["c_name"];
    $years = $_POST["years"];
    $createdon = $_POST["createdon"];
    // $createdby = $_POST["createdby"];
    $d_id = $_POST["d_id"];

    // Update the course details in the database
    $update_query = "UPDATE courses SET c_name='$c_name', years='$years', createdon='$createdon',  d_id='$d_id' WHERE c_id=$course_id";
    $update_result = mysqli_query($conn, $update_query);

    // Check if the update was successful
    if ($update_result) {
        // Redirect to the view_course page after successful update
        header('location: view_course.php');
        exit();
    } else {
        // Display an error message if the update fails
        $error_message = "Error updating course: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
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
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>UPDATE DEPARTMENT INFORMATION FORM</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-body">
    <form action="#" method="post">
        <h2>Update Course</h2>
        <?php
        // Display error message if there is an error
        if (isset($error_message)) {
            echo "<p class='error'>$error_message</p>";
        }

       
        ?>
        <label for="c_name">Course Name:</label>
        <input class="form-control mb-3" type="text" name="c_name" value="<?php echo $c_name; ?>" required>

        <label for="years">Years:</label>
        <input class="form-control mb-3" type="text" name="years" value="<?php echo $years; ?>" required>

        <label for="createdon">Created On:</label>
        <input class="form-control mb-3" type="date" name="createdon" value="<?php echo $createdon; ?>" readonly required>

        <!-- <label for="createdby">Created By:</label>
        <input class="form-control mb-3" type="text" name="createdby" value="<?php echo $createdby; ?>" required> -->

        <label for="d_id">Department ID:</label>
        <select class="form-control mb-3" name="d_id" required>
            <?php
            // Display departments in the dropdown
            while ($department = mysqli_fetch_assoc($department_result)) {
                $selected = ($d_id == $department['d_id']) ? 'selected' : '';
                echo "<option value='{$department['d_id']}' $selected>{$department['d_name']}</option>";
            }
            ?>
        </select>

        <center><button type="submit" class="btn btn-primary" name="update">Update Course</button></center>
    </form>
                            </div></div></div></div></div></div></div>
    <?php 
include "footer.php";
?>
</body>

</html>
