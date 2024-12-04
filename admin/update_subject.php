<?php
// Assuming you have a connection to the database
include "db.php";

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['subject_id'])) {
    $subjectId = $_POST['subject_id'];
    $subjectName = $_POST['subject_name'];
    $subjectCredit = $_POST['credit'];
    $courseId = $_POST['c_id'];
    $year = $_POST['year'];
    $semester = $_POST['sem'];

    // Update subject details in the database
    $updateSql = "UPDATE subject 
                  SET name = '$subjectName', credit = '$subjectCredit', c_id = '$courseId', year = '$year', sem = '$semester'
                  WHERE subject_id = '$subjectId'";

    if ($conn->query($updateSql) === TRUE) {
        echo "Subject updated successfully.";
    } else {
        echo "Error updating subject: " . $conn->error;
    }
}

// Fetch subject details for the provided subject_id
if(isset($_GET['subject_id'])) {
    $subjectId = $_GET['subject_id'];

    $subjectSql = "SELECT * FROM subject WHERE subject_id = '$subjectId'";
    $subjectResult = $conn->query($subjectSql);

    if ($subjectResult->num_rows > 0) {
        $subjectData = $subjectResult->fetch_assoc();
    } else {
        echo "Subject not found.";
        exit;
    }
} else {
    echo "Subject ID not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Subject</title>
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
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            
                <div class="card">
                  
                <div class="card-body">

            <form method="POST" action="">
                <input type="hidden" name="subject_id" value="<?php echo $subjectData['subject_id']; ?>">
                
                <h3 class="mb-4">Update Subject</h3>

                <!-- Subject Name Field -->
                <div class="form-group">
                    <label for="subject_name">Subject Name:</label>
                    <input type="text" class="form-control mb-3" id="subject_name" name="subject_name" value="<?php echo $subjectData['name']; ?>" required>
                </div>

                <!-- Credit Field -->
                <div class="form-group">
                    <label for="credit">Credit:</label>
                    <input type="number" class="form-control mb-3" id="credit" name="credit" value="<?php echo $subjectData['credit']; ?>" required>
                </div>

                <!-- Course ID Field -->
                <div class="form-group">
                    <label for="batch_id">Courses:</label>
                    <select class="form-control mb-3" id="batch_id" name="c_id" >
                        <?php
                        $batch_sql = "SELECT * FROM courses";
                        $batch_result = mysqli_query($conn, $batch_sql);
                        while ($batch_row = mysqli_fetch_assoc($batch_result)) {
                            $selected = ($batch_row['c_id'] == $subjectData['c_id']) ? 'selected' : '';
                            echo "<option value='" . $batch_row['c_id'] . "' $selected>" . $batch_row['c_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- Year Field -->
                <div class="form-group">
                    <label for="year">Year:</label>
                    <input type="text" class="form-control mb-3" id="year" name="year" value="<?php echo $subjectData['year']; ?>" required>
                </div>

                <!-- Semester Field -->
                <div class="form-group">
                    <label for="sem">Semester:</label>
                    <input type="text" class="form-control mb-3" id="sem" name="sem" value="<?php echo $subjectData['sem']; ?>" required>
                </div>

                <!-- Submit Button -->
               <center> <button type="submit" class="btn btn-primary">Update</button></center>
            </form>
        </div>
    </div>
</div>
</div>
<?php 
include "footer.php";
?>
</body>
</html>
