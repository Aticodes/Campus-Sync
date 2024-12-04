<?php
include 'db.php'; // Include your database connection file

// Check if the department ID is set in the URL
if (isset($_GET['id'])) {
    $department_id = $_GET['id'];

    // Fetch department details based on the department ID
    $result = mysqli_query($conn, "SELECT * FROM department WHERE d_id = $department_id");

    // Check if the department exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Store department details in variables
        $d_name = $row['d_name'];
        $createdon = $row['createdon'];
        $status = $row['status'];
    } else {
        // Redirect to the view_department page if the department doesn't exist
        header('location: view_department.php');
        exit();
    }
} else {
    // Redirect to the view_department page if the department ID is not set
    header('location: view_department.php');
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $d_name = $_POST["d_name"];
    $createdon = $_POST["createdon"];
    $status = $_POST["status"];

    // Update the department details in the database
    $update_query = "UPDATE department SET d_name='$d_name', createdon='$createdon', status='$status' WHERE d_id=$department_id";
    $update_result = mysqli_query($conn, $update_query);

    // Check if the update was successful
    if ($update_result) {
        // Redirect to the view_department page after successful update
        header('location: view_department.php');
        exit();
    } else {
        // Display an error message if the update fails
        $error_message = "Error updating department: " . mysqli_error($conn);
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
    <title>Update Department</title>
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
      
        <?php
        // Display error message if there is an error
        if (isset($error_message)) {
            echo "<p class='error'>$error_message</p>";
        }
        ?>
        <label class="form-label" for="d_name">Department Name:</label>
        <input type="text" class="form-control mb-3" name="d_name" value="<?php echo $d_name; ?>" required>

        <label class="form-label" for="createdon">Created On:</label>
        <input type="date" class="form-control mb-3" name="createdon" value="<?php echo $createdon; ?>" required>

        <label class="form-label" for="status">Status:</label>
        <input type="text" class="form-control mb-3" name="status" value="<?php echo $status; ?>" required>

        <center><button type="submit" class="btn btn-primary">Update Department</button></center>
    </form>
                            </div></div></div></div></div></div></div>
    <?php 
include "footer.php";
?>
</body>

</html>
