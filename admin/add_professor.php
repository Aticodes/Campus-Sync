<!DOCTYPE html>
<html lang="en">
<?php

include 'db.php';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor Information Form</title>
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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> ADD PROFESSOR</h4>

                <!-- Basic Layout -->
                <div class="row">

                    <div class="col-xl">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Basic Information</h5>
                                <!-- <small class="text-muted float-end">Merged input group</small> -->
                            </div>
                            <div class="card-body">
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="p_firstname">First Name</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                <input type="text" class="form-control" name="p_firstname" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="p_lastname">Last Name</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                <input type="text" class="form-control" name="p_lastname" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="phoneno">Phone Number</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                                                <input type="text" class="form-control" name="phoneno" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="address1">Address</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                <input type="text" class="form-control" name="address1" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="dob">Date of Birth</label>
                                            <input type="date" class="form-control" name="dob" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="j_date">Joining Date</label>
                                            <input type="date" class="form-control" name="j_date" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="field_of_expertise">Field of Expertise</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                <input type="text" class="form-control" name="field_of_expertise" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="experience">Experience</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                <input type="text" class="form-control" name="experience" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="previously_job">Previously Job</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                <input type="text" class="form-control" name="previously_job" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="photo">Passport Size Photo</label><br>
                                            <input type="file" class="form-control" id="photo" name="note" required>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="type">Type</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                <input type="text" class="form-control" name="type" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="e_phone">Emergency Phone</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                                                <input type="text" class="form-control" name="e_phone" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="sex">Sex</label>
                                            <select class="form-select" aria-label="Default select example" name="sex" required>
                                                <option selected>Open this select menu</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="email">Email</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                <input type="text" class="form-control" name="email" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="blood_group">Blood Group</label>
                                            <div class="input-group input-group-merge">
                                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                                <input type="text" class="form-control" name="blood_group" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary mt-4" name="submit">Submit</button>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-Uo7fATBz0G6BRKK5U7Vu4dXP9uZQjxkhjq0lFXwF8eFfOgC8OdZMz2a9aCWoJgx" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
<?php


// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $p_firstname = $_POST['p_firstname'];
    $p_lastname = $_POST['p_lastname'];
    $phoneno = $_POST['phoneno'];
    $address1 = $_POST['address1'];
    $dob = $_POST['dob'];
    $j_date = $_POST['j_date'];
    $field_of_expertise = $_POST['field_of_expertise'];
    $experience = $_POST['experience'];
    $previously_job = $_POST['previously_job'];
   
    $type = $_POST['type'];
    $e_phone = $_POST['e_phone'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $blood_group = $_POST['blood_group'];

    if (isset($_FILES['note'])) {
        $t = time();

        $target = "professorid/" . date('d,m,y' . $t) . $_FILES["note"]["name"];
        move_uploaded_file($_FILES["note"]["tmp_name"], $target);

        $sql = "INSERT INTO `user_master`( `username`, `password`, `type`) VALUES ('$email','$dob',2)";
        if (mysqli_query($conn, $sql)) {

            $user_id = mysqli_insert_id($conn);
            // SQL query for insertion
            $sql = "INSERT INTO `professor_master`(`user_id`,`p_firstname`, `p_lastname`, `phoneno`, `address1`, `dob`, `j_date`, 
            `field_of_expertise`, `experience`, `previously_job`, `image`, `type`, `e_phone`, `sex`, `blood_group`) 
            VALUES ($user_id,'$p_firstname', '$p_lastname', '$phoneno', '$address1', '$dob', '$j_date', '$field_of_expertise', 
            '$experience', '$previously_job', '$target', '1', '$e_phone', '$sex', '$blood_group')";

            // Execute the query
            if (mysqli_query($conn, $sql)) {
                ?><script>
                Swal.fire({
             title: "Professor Added Successful",
             icon: "success"
           });</script><?php
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }  // Close the database connection

} else {
}
?>

</html>