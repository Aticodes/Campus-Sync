<?php
include 'db.php'; // Include your database connection file

// Check if the professor ID is provided in the URL
if (isset($_GET['id'])) {
    $professor_id = $_GET['id'];

    // Retrieve professor data from the database
    $sql = "SELECT * FROM professor_master WHERE professor_id = $professor_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Display the update form
        echo '
       
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

<body>'.


include "sidebar.php";

?>

<?php 
echo '<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            
                <div class="card">
                    <h5 class="card-header">Update Professor Information</h5>
                <div class="card-body">
                <form action="#" method="post">
                    <input type="hidden" name="professor_id" value="' . $row['professor_id'] . '">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="p_firstname">First Name</label>
                            <input type="text" class="form-control" name="p_firstname" value="' . $row['p_firstname'] . '" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="p_lastname">Last Name</label>
                            <input type="text" class="form-control" name="p_lastname" value="' . $row['p_lastname'] . '" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phoneno">Phone Number</label>
                            <input type="text" class="form-control" name="phoneno" value="' . $row['phoneno'] . '" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="address1">Address</label>
                            <input type="text" class="form-control" name="address1" value="' . $row['address1'] . '" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" value="' . $row['dob'] . '" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="j_date">Joining Date</label>
                            <input type="date" class="form-control" name="j_date" value="' . $row['j_date'] . '" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="field_of_expertise">Field of Expertise</label>
                            <input type="text" class="form-control" name="field_of_expertise" value="' . $row['field_of_expertise'] . '" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="experience">Experience</label>
                            <input type="text" class="form-control" name="experience" value="' . $row['experience'] . '" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="previously_job">Previously Job</label>
                            <input type="text" class="form-control" name="previously_job" value="' . $row['previously_job'] . '" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image">Image URL</label>
                            <input type="text" class="form-control" name="image" value="' . $row['image'] . '" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" name="type" value="' . $row['type'] . '" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="e_phone">Emergency Phone</label>
                            <input type="text" class="form-control" name="e_phone" value="' . $row['e_phone'] . '" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="sex">Sex</label>
                            <select class="form-control" name="sex" required>
                                <option value="Male" ' . ($row['sex'] == 'Male' ? 'selected' : '') . '>Male</option>
                                <option value="Female" ' . ($row['sex'] == 'Female' ? 'selected' : '') . '>Female</option>
                                <option value="Other" ' . ($row['sex'] == 'Other' ? 'selected' : '') . '>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="blood_group">Blood Group</label>
                            <input type="text" class="form-control" name="blood_group" value="' . $row['blood_group'] . '" required>
                        </div>
                    </div>
                    <div class="row">
                        
                    </div>
                    <center><button type="submit" class="btn btn-primary">Update</button></center>
                </form>
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-Uo7fATBz0G6BRKK5U7Vu4dXP9uZQjxkhjq0lFXwF8eFfOgC8OdZMz2a9aCWoJgx"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
        </body>
        </html>
        ';

        // Handle the form submission for updating professor information
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $p_firstname = $_POST['p_firstname'];
            $p_lastname = $_POST['p_lastname'];
            $phoneno = $_POST['phoneno'];
            $address1 = $_POST['address1'];
            $dob = $_POST['dob'];
            $j_date = $_POST['j_date'];
            $field_of_expertise = $_POST['field_of_expertise'];
            $experience = $_POST['experience'];
            $previously_job = $_POST['previously_job'];
            $image = $_POST['image'];
            $type = $_POST['type'];
            $e_phone = $_POST['e_phone'];
            $sex = $_POST['sex'];
           
            $blood_group = $_POST['blood_group'];

            // SQL query for updating professor information
            $update_sql = "UPDATE professor_master SET 
                p_firstname = '$p_firstname', 
                p_lastname = '$p_lastname', 
                phoneno = '$phoneno', 
                address1 = '$address1', 
                dob = '$dob', 
                j_date = '$j_date', 
                field_of_expertise = '$field_of_expertise', 
                experience = '$experience', 
                previously_job = '$previously_job', 
                image = '$image', 
                type = '$type', 
                e_phone = '$e_phone', 
                sex = '$sex', 
             
                blood_group = '$blood_group' 
                WHERE professor_id = $professor_id";

            // Execute the update query
            if (mysqli_query($conn, $update_sql)) {
                echo "<script>alert('Professor information updated successfully!');window.location.href='view_professor.php'</script>";
            } else {
                echo "Error updating professor information: " . mysqli_error($conn);
            }
        }
    } else {
        echo "No professor found with the provided ID.";
    }
} else {
    echo "Professor ID not provided in the URL.";
}

// Close the database connection
mysqli_close($conn);
?>
