

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Add Class</title>

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
                      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>ADD BATCH</h4>
        
                      <!-- Basic Layout -->
                      <div class="row">
                        
                        <div class="col-xl">
                          <div class="card mb-4">
                            <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                 <!-- Batch Name Field -->
                 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-group mb-3">
            <label for="class_name">Class Name:</label>
            <input type="text" class="form-control" name="class_name" required>
        </div>
        <div class="form-group mb-3">
    <label for="batch_id">Batch ID:</label>
    <select class="form-control" name="batch_id" required>
        <?php
        
        include "db.php";
            $query = "SELECT * FROM batch_master";
            $result = $conn->query($query);

            // Populate the options with batch IDs
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['batch_id'] . "'>" . $row['batch_name'] . "</option>";
            }

            
        ?>
    </select>
</div>


<div class="form-group mb-3">
    <label for="batch_id">Course Name:</label>
    <select class="form-control" name="course_id" required>
        <?php
        

            $query = "SELECT * FROM courses";
            $result = $conn->query($query);

            // Populate the options with batch IDs
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['c_id'] . "'>" . $row['c_name'] . "</option>";
            }

            
        ?>
    </select>
</div>

        <button type="submit" class="btn btn-primary">Add Class</button>
    </form>
        </div>
    </div>
</div>
<?php 
include "footer.php";
?>

</body>
</html>
<?php
include "db.php";
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $class_name = $_POST['class_name'];
        $batch_id = $_POST['batch_id'];
        $course_id = $_POST['course_id'];

       
        $insertSql = "INSERT INTO class_master (`class_name`, `batch_id`, `course_id`) 
                      VALUES ('$class_name', '$batch_id', '$course_id')";

if ($conn->query($insertSql) === TRUE) {
    // If insertion was successful, display success message with SweetAlert
    
    ?><script>
    Swal.fire({
 title: "Class Added Successful",
 icon: "success"
});</script><?php
} else {
    // If there's an error, display error message with SweetAlert
 
}


        $conn->close();
    }
    ?>