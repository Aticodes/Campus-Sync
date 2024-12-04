<?php
include "db.php";
// Include your database connection file here
$where_clause = "WHERE 1";

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Filter values
    $filters = array(
        "student_id" => $_POST['student_id'],
        "user_id" => $_POST['user_id'],
        "s_firstname" => $_POST['s_firstname'],
        "s_lastname" => $_POST['s_lastname'],
        "dob" => $_POST['dob'],
        "address1" => $_POST['address1'],
        "address2" => $_POST['address2'],
        "phone_no" => $_POST['phone_no'],
        "father_name" => $_POST['father_name'],
        "mother_name" => $_POST['mother_name'],
        "father_phone" => $_POST['father_phone'],
        "admission_date" => $_POST['admission_date'],
        "blood_group" => $_POST['blood_group'],
        "sex" => $_POST['sex'],
        "remarks" => $_POST['remarks']
        // Add more filters here following the same pattern
    );

    // Construct the WHERE clause based on provided filters
    foreach ($filters as $key => $value) {
        if (!empty($value)) {
            if ($key == 'dob' || $key == 'admission_date') {
                // For date fields, format the value appropriately
                $value = date('Y-m-d', strtotime($value));
                $where_clause .= " AND `$key` = '$value'";
            } else {
                // For other fields
                $where_clause .= " AND `$key` = '$value'";
            }
        }
    }
}

// Fetch data from the student_master table based on the filters
$query = "SELECT * FROM student_master $where_clause";
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
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
    <h5 class="card-header">FILTERS</h5>
    <hr>
      <div class="card-body">
       
      <form method="post">
    <div class="row">
        <div class="row">
            <div class="col-md-4">
                <label for="student_id">Student ID:</label>
                <input class="form-control" type="text" id="student_id" name="student_id"><br><br>
            </div>
            <div class="col-md-4">
                <label for="user_id">User ID:</label>
                <input class="form-control" type="text" id="user_id" name="user_id"><br><br>
            </div>
            <div class="col-md-4">
                <label for="s_firstname">First Name:</label>
                <input class="form-control" type="text" id="s_firstname" name="s_firstname"><br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="s_lastname">Last Name:</label>
                <input class="form-control" type="text" id="s_lastname" name="s_lastname"><br><br>
            </div>
            <div class="col-md-4">
                <label for="dob">Date of Birth:</label>
                <input class="form-control" type="date" id="dob" name="dob"><br><br>
            </div>
            <div class="col-md-4">
                <label for="address1">Address Line 1:</label>
                <input class="form-control" type="text" id="address1" name="address1"><br><br>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-4">   
                <label for="address2">Address Line 2:</label>
                <input class="form-control" type="text" id="address2" name="address2"><br><br>
            </div>
           <div class="col-md-4">
                <label for="phone_no">Phone Number:</label>
                <input class="form-control" type="text" id="phone_no" name="phone_no"><br><br>
            </div>
            <div class="col-md-4">
                <label for="father_name">Father's Name:</label>
                <input class="form-control" type="text" id="father_name" name="father_name"><br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">    
                <label for="mother_name">Mother's Name:</label>
                <input class="form-control" type="text" id="mother_name" name="mother_name"><br><br>
            </div>
            <div class="col-md-4">
                <label for="father_phone">Father's Phone:</label>
                <input class="form-control" type="text" id="father_phone" name="father_phone"><br><br>
            </div>
            <div class="col-md-4">
                <label for="admission_date">Admission Date:</label>
                <input class="form-control" type="date" id="admission_date" name="admission_date"><br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">    
            <label for="blood_group">Blood Group:</label>
            <input class="form-control" type="text" id="blood_group" name="blood_group"><br><br>
            </div>
            <div class="col-md-4">
            <label for="sex">Sex:</label>
            <select class="form-control" id="sex" name="sex">
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select><br><br>
            </div>
            <div class="col-md-4">
            <label for="remarks">Remarks:</label>
            <input class="form-control" type="text" id="remarks" name="remarks"><br><br>
            </div>
        </div>
    </div>
    <!-- Add input field for image if needed -->
    <hr><center> <input class="btn btn-primary" type="submit" value="Generate Report"></center>
</form>



        </div>
    </div>
</div>
</div>
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            
                <div class="card">
                    <h5 class="card-header">VIEW RESULTS</h5>
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
