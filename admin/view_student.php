<?php
// Include your database connection file here
include 'db.php';

// Fetch data from the student_master table
$query = "SELECT * FROM student_master";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Data</title>
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
                    <h5 class="card-header">VIEW STUDENTS</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                        <th scope="col">Student ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Father's Name</th>
                    <th scope="col">Mother's Name</th>
                    <th scope="col">Father's Phone</th>
                    <th scope="col">Admission Date</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <th scope="row"><?php echo $row['student_id']; ?></th>
                        <td><?php echo $row['s_firstname']; ?></td>
                        <td><?php echo $row['s_lastname']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['address1']; ?></td>
                        <td><?php echo $row['phone_no']; ?></td>
                        <td><?php echo $row['father_name']; ?></td>
                        <td><?php echo $row['mother_name']; ?></td>
                        <td><?php echo $row['father_phone']; ?></td>
                        <td><?php echo $row['admission_date']; ?></td>
                        <td><?php echo $row['blood_group']; ?></td>
                        <td><?php echo $row['sex']; ?></td>
                        <td><?php echo $row['remarks']; ?></td>
                        <td>
                            <a href="update_student.php?student_id=<?php echo $row['student_id']; ?>" class="btn btn-primary">Update</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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
        <?php 
include "footer.php";
?>
</div>
</body>

</html>
