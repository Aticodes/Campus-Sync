
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "db.php";
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View fees</title>
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
    <div class="container mt-5">
       

        <?php
        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Your form submission logic goes here
        }
        ?>

<div class="content-wrapper">
            <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
            
        <div class="card">
            <h5 class="card-header">VIEW FEES DEPARTMENT WISE</h5>
            <div class="card-body">
                <div class="form-group">
            <!-- Dropdown for Department -->
                    <label for="view_department_id">Select Department:</label>
                    <select class="form-control" name="view_department_id" id='view_department_id' required>
                    <option value="">Select Department</option>
                    <?php
                // Replace [your_department_query] with the actual SQL query to fetch departments
                    $departmentQuery = "SELECT * FROM department";
                    $departmentResult = $conn->query($departmentQuery);

                    while ($row = $departmentResult->fetch_assoc()) {
                    echo '<option value="' . $row['d_id'] . '">' . $row['d_name'] . '</option>';
                    }
                    ?>
                    </select>
                </div><br>
                <div class="form-group">
                <label for="view_department_id">Fees List:</label>
             <select name="" class="form-control" id="feesTable">
                <option>Select Your Fees </option>
             </select></div>

<script>
    // JavaScript to handle dynamic population of courses based on selected department for view
    document.getElementById('view_department_id').addEventListener('change', function () {
        var viewDepartmentId = this.value;

        // Use AJAX to fetch fees based on the selected department
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'getfees.php?view_department_id=' + viewDepartmentId, true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Update the fees table with the fetched fees
                document.getElementById('feesTable').innerHTML = xhr.responseText;
            } else {
                console.error('Failed to fetch fees.');
            }
        };
        xhr.send();
    });
</script>
                </div>
              </div>
            </div>
</div>

</div>
<?php include "footer.php"; ?>
    
</body>
</html>