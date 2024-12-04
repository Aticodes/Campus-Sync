<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update H.O.D</title>
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
    <?php
    include "db.php";

    // Check if professor_id and d_id are provided in the URL
    if (isset($_GET['p_id']) && isset($_GET['d_id'])) {
        $professorId = $_GET['p_id'];
        $departmentId = $_GET['d_id'];

        // Fetch professor details
        $getProfessorSql = "SELECT * FROM professor_master WHERE professor_id = '$professorId'";
        $professorResult = mysqli_query($conn, $getProfessorSql);

        // Fetch department details
        $getDepartmentSql = "SELECT * FROM department";
        $departmentResult = mysqli_query($conn, $getDepartmentSql);

        // Check if both queries are successful
        if ($professorResult && $departmentResult) {
            $professor = mysqli_fetch_assoc($professorResult);
            $departmentOptions = '';

            while ($row = mysqli_fetch_assoc($departmentResult)) {
                $selected = ($row['d_id'] == $departmentId) ? 'selected' : '';
                $departmentOptions .= "<option value='{$row['d_id']}' $selected>{$row['d_name']}</option>";
            }

            // Check if professor is a valid array
            if ($professor) {
                echo "<form method='POST' '>";
                echo "<h3 class='mb-4'>UPDATE H.O.D</h3>";

                // Display professor dropdown
                echo "<label for='p_id'>Professor</label>";
                echo "<input class='form-control mb-3' type='text' name='p_id' value='{$professor['p_firstname']}' readonly>";

                // Display department dropdown
                echo "<label for='d_id'>Department</label>";
                echo "<select class='form-control mb-3' name='d_id'>$departmentOptions</select>";

                // Submit Button for Update
                echo "<center><button type='submit' name='Update' class='btn btn-primary'>Update</button></center>";
                echo "</form>";
            } else {
                echo "Error: Unable to fetch professor details.";
            }
        } else {
            echo "Error: Unable to execute SQL queries.";
        }
    } else {
        echo "Professor ID and Department ID not provided in the URL.";
    }
    ?>

    <?php
    if (isset($_POST['Update'])) {
       
        
            $p_id = $_GET['p_id'];
            $d_id = $_POST['d_id'];
            $sql = "UPDATE `professor_master` SET `type`='2',`d_id`='$d_id' WHERE `professor_id`='$p_id'";
            
            if (mysqli_query($conn, $sql)) {
                ?><script>
                Swal.fire({
             title: "HOD Assigned Successful",
             icon: "success"
           });</script><?php
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        
    }
    ?>
                            </div></div></div></div></div></div>
    <?php 
include "footer.php";
?>
                            </div>
</body>

</html>
