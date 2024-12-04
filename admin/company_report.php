<?php
include "db.php";
// Include your database connection file here
$where_clause = "WHERE 1";

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Filter values
    $filters = array(
        "name" => $_POST['name'],
        "address" => $_POST['address'],
        "contact_person" => $_POST['contact_person'],
        "contact_no" => $_POST['contact_no'],
        "email" => $_POST['email'],
        "company_id" => $_POST['company_id'],
        "user_id" => $_POST['user_id']
        // Add more filters here following the same pattern
    );

    // Construct the WHERE clause based on provided filters
    foreach ($filters as $key => $value) {
        if (!empty($value)) {
            $where_clause .= " AND `$key` = '$value'";
        }
    }
}

// Fetch data from the company_master table based on the filters
$query = "SELECT * FROM comapny_master $where_clause";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Company Data</title>
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
    <?php include "sidebar.php"; ?>

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
                                    <label for="name">Name:</label>
                                    <input class="form-control" type="text" id="name" name="name"><br><br>
                                </div>
                                <div class="col-md-4">
                                    <label for="address">Address:</label>
                                    <input class="form-control" type="text" id="address" name="address"><br><br>
                                </div>
                                <div class="col-md-4">
                                    <label for="contact_person">Contact Person:</label>
                                    <input class="form-control" type="text" id="contact_person" name="contact_person"><br><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                <label for="contact_no">Contact No:</label>
                                <input class="form-control" type="text" id="contact_no" name="contact_no"><br><br>
                                </div>
                                <div class="col-md-4">
                                    <label for="email">Email:</label>
                                    <input class="form-control" type="text" id="email" name="email"><br><br>
                                </div>
                                <div class="col-md-4">
                                    <label for="company_id">Company ID:</label>
                                    <input class="form-control" type="text" id="company_id" name="company_id"><br><br>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12">
                                <label for="user_id">User ID:</label>
                                <input class="form-control" type="text" id="user_id" name="user_id"><br><br>
                            </div>
                            </div>
                        </div>
                        <hr>
                        <center><input type="submit" class="btn btn-primary" value="Generate Report"></center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">VIEW RESULTS</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact Person</th>
                                    <th scope="col">Contact No</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Company ID</th>
                                    <th scope="col">User ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['contact_person']; ?></td>
                                        <td><?php echo $row['contact_no']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['company_id']; ?></td>
                                        <td><?php echo $row['user_id']; ?></td>
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
