<?php
// Include your database connection file here
include 'db.php';
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    // Fetch student data based on the student_id
    $query = "SELECT * FROM student_master WHERE student_id = $student_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);
    } else {
        echo "Student not found.";
        exit();
    }
} else {
    echo "Invalid request. Please provide a student_id.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <title>Update student information</title>
</head>

<body>

<?php
include "sidebar.php";
?>

   
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            
                <div class="card">
                    <h5 class="card-header">Update Student Information</h5>
                <div class="card-body">
        <form action="#" method="post">
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="s_firstname">First Name</label>
                    <input type="text" class="form-control" name="s_firstname" value="<?php echo $student['s_firstname']; ?>"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="s_lastname">Last Name</label>
                    <input type="text" class="form-control" name="s_lastname" value="<?php echo $student['s_lastname']; ?>"
                        required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" name="dob" value="<?php echo $student['dob']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="sex">Sex</label>
                    <select class="form-control" name="sex" required>
                        <option value="Male" <?php echo ($student['sex'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo ($student['sex'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                        <option value="Other" <?php echo ($student['sex'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="address1">Address Line 1</label>
                    <input type="text" class="form-control" name="address1" value="<?php echo $student['address1']; ?>"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="address2">Address Line 2</label>
                    <input type="text" class="form-control" name="address2" value="<?php echo $student['address2']; ?>">
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="phone_no">Phone Number</label>
                    <input type="text" class="form-control" name="phone_no" value="<?php echo $student['phone_no']; ?>"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="father_name">Father's Name</label>
                    <input type="text" class="form-control" name="father_name" value="<?php echo $student['father_name']; ?>"
                        required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="mother_name">Mother's Name</label>
                    <input type="text" class="form-control" name="mother_name" value="<?php echo $student['mother_name']; ?>"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="father_phone">Father's Phone</label>
                    <input type="text" class="form-control" name="father_phone" value="<?php echo $student['father_phone']; ?>"
                        required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="admission_date">Admission Date</label>
                    <input type="date" class="form-control" name="admission_date"
                        value="<?php echo $student['admission_date']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="blood_group">Blood Group</label>
                    <input type="text" class="form-control" name="blood_group" value="<?php echo $student['blood_group']; ?>"
                        required>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="remarks">Remarks</label>
                    <textarea class="form-control" name="remarks"><?php echo $student['remarks']; ?></textarea>
                </div>
            </div>

           <center> <button type="submit" class="btn btn-primary">Update Student</button></center>
        </form>
    </div>
    
                </div></div></div>
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
</body>
<?php
// Check if the student_id is provided in the URL


// Check if the form is submitted for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve updated form data
    $s_firstname = $_POST['s_firstname'];
    $s_lastname = $_POST['s_lastname'];
    $dob = $_POST['dob'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $phone_no = $_POST['phone_no'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $father_phone = $_POST['father_phone'];
    $admission_date = $_POST['admission_date'];
    $blood_group = $_POST['blood_group'];
    $sex = $_POST['sex'];
    $remarks = $_POST['remarks'];

    // SQL query for updating the student data
    $updateQuery = "UPDATE student_master SET 
                    s_firstname = '$s_firstname', 
                    s_lastname = '$s_lastname', 
                    dob = '$dob', 
                    address1 = '$address1', 
                    address2 = '$address2', 
                    phone_no = '$phone_no', 
                    father_name = '$father_name', 
                    mother_name = '$mother_name', 
                    father_phone = '$father_phone', 
                    admission_date = '$admission_date', 
                    blood_group = '$blood_group', 
                    sex = '$sex', 
                    remarks = '$remarks' 
                    WHERE student_id = $student_id";

    // Execute the update query
    if (mysqli_query($conn, $updateQuery)) { ?><script>
    Swal.fire({
 title: "Student Updated Successful",
 icon: "success"
});</script><?php
}  else {
        echo "Error updating student information: " . mysqli_error($conn);
    }
}
?>
</html>
