<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department wise notification</title>
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
    <?php
    include "sidebar.php";
    ?>
    <div class="container">

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Send Notification To Department Wise Students</h4>

                <!-- Basic Layout -->
                <div class="row">

                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="../login-system-main/grp_mail_send_dept.php" method="POST" name="login">
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Select Group to Send Mail:</label>
                                        <div class="col-md-6">
                                        <select class="form-select" name="d_id" aria-label="Default select example">
                      <?php
                // Include your database connection file here
                include 'db.php';

                // Fetch departments from the database
                $result = mysqli_query($conn, "SELECT * FROM department");

                // Loop through each department to create options
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['d_id'] . "'>" . $row['d_name'] . "</option>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
                      </select>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group row">
                                        <label for="subject" class="col-md-4 col-form-label text-md-right">Mail Subject:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="subject" class="form-control" name="subject" required>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group row">
                                        <label for="body" class="col-md-4 col-form-label text-md-right">Mail Body:</label>
                                        <div class="col-md-6">
                                            <textarea id="body" class="form-control" name="body" cols="50" rows="10"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6 offset-md-4">
                                    <center><button type="submit" class="btn btn-primary mt-3">Send Message </button></center>
                                    </div>
                            </div>
                            </form>
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
// Include your database connection file here
include 'db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $d_name = $_POST['d_name'];
    $createdon = $_POST['createdon'];
    $status = $_POST['status'];

    // SQL query for inserting data into the department table
    $insertQuery = "INSERT INTO department (d_name, createdon, status) VALUES ('$d_name', '$createdon', '$status')";

    // Execute the query
    if (mysqli_query($conn, $insertQuery)) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>