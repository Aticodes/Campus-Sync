<?php
include "db.php";
// Include your database connection file here
$where_clause = "WHERE 1";

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Filter values
    $filters = array(
        "professor_id" => $_POST['professor_id'],
        "user_id" => $_POST['user_id'],
        "p_firstname" => $_POST['p_firstname'],
        "p_lastname" => $_POST['p_lastname'],
        "dob" => $_POST['dob'],
        "address1" => $_POST['address1'],
        "phoneno" => $_POST['phoneno'],
        "j_date" => $_POST['j_date'],
        "field_of_expertise" => $_POST['field_of_expertise'],
        "experience" => $_POST['experience'],
        "previously_job" => $_POST['previously_job'],
        "type" => $_POST['type'],
        "e_phone" => $_POST['e_phone'],
        "sex" => $_POST['sex'],
        "blood_group" => $_POST['blood_group'],
        "d_id" => $_POST['d_id']
        // Add more filters here following the same pattern
    );

    // Construct the WHERE clause based on provided filters
    foreach ($filters as $key => $value) {
        if (!empty($value)) {
            if ($key == 'dob' || $key == 'j_date') {
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

// Fetch data from the professor_master table based on the filters
$query = "SELECT * FROM professor_master $where_clause";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Professor Data</title>
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
                <label for="professor_id">Professor ID:</label>
                <input class="form-control" type="text" id="professor_id" name="professor_id"><br><br>
            </div>
            <div class="col-md-4">
            <label for="user_id">User ID:</label>
            <input class="form-control" type="text" id="user_id" name="user_id"><br><br>
            </div>
            <div class="col-md-4">
            <label for="p_firstname">First Name:</label>
            <input class="form-control" type="text" id="p_firstname" name="p_firstname"><br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="p_lastname">Last Name:</label>
                <input class="form-control" type="text" id="p_lastname" name="p_lastname"><br><br>
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
                <label for="phoneno">Phone Number:</label>
                <input class="form-control" type="text" id="phoneno" name="phoneno"><br><br>
            </div>
            <div class="col-md-4">
                <label for="j_date">Joining Date:</label>
                <input class="form-control" type="date" id="j_date" name="j_date"><br><br>
            </div>
            <div class="col-md-4">
                <label for="field_of_expertise">Field of Expertise:</label>
                <input class="form-control" type="text" id="field_of_expertise" name="field_of_expertise"><br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="experience">Experience:</label>
                <input class="form-control" type="text" id="experience" name="experience"><br><br>
            </div>
            <div class="col-md-4">
                <label for="previously_job">Previously Job:</label>
                <input class="form-control" type="text" id="previously_job" name="previously_job"><br><br>
            </div>
            <div class="col-md-4">
                <label for="type">Type:</label>
                <select class="form-control" name="type">
                    <option value="">Select</option>
                    <option value="1">Professor</option>
                    <option value="2">HOD</option>
                    
                </select><br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="e_phone">Emergency Phone:</label>
                <input class="form-control" type="text" id="e_phone" name="e_phone"><br><br>
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
                <label for="blood_group">Blood Group:</label>
                <input class="form-control" type="text" id="blood_group" name="blood_group"><br><br>
            </div>
        </div>
        <div class="row">
        <div class="col-md-12">
            <label for="d_id">Department ID:</label>
            <input class="form-control" type="text" id="d_id" name="d_id"><br><br>
        </div>
        </div>
    </div>
    
    <!-- Add input field for image if needed -->
    <hr><center>
    <input type="submit" value="Generate Report"></center>
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
                        <th scope="col">Professor ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Joining Date</th>
                    <th scope="col">Field of Expertise</th>
                    <th scope="col">Experience</th>
                    <th scope="col">Previously Job</th>
                    <th scope="col">Type</th>
                    <th scope="col">Emergency Phone</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Department ID</th>
                    <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <th scope="row"><?php echo $row['professor_id']; ?></th>
                        <td><?php echo $row['p_firstname']; ?></td>
                        <td><?php echo $row['p_lastname']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['address1']; ?></td>
                        <td><?php echo $row['phoneno']; ?></td>
                        <td><?php echo $row['j_date']; ?></td>
                        <td><?php echo $row['field_of_expertise']; ?></td>
                        <td><?php echo $row['experience']; ?></td>
                        <td><?php echo $row['previously_job']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['e_phone']; ?></td>
                        <td><?php echo $row['sex']; ?></td>
                        <td><?php echo $row['blood_group']; ?></td>
                        <td><?php echo $row['d_id']; ?></td>
                        
                    </tr>
                <?php endwhile; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
 </div>


</body>

</html>
