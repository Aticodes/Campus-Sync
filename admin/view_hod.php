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
<?php
if (isset($_POST['Assign'])) {
    $p_id = $_POST['p_id'];
    $d_id = $_POST['d_id'];
    $sql = "UPDATE `professor_master` SET `type`='2',`d_id`='$d_id' WHERE `professor_id`='$p_id'";
    if (mysqli_query($conn, $sql)) {
        echo "HOD Assign  successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<?php

// Assuming you have a database connection established

// Fetch data
$query = "SELECT pm.`professor_id`, pm.`user_id`, pm.`p_firstname`, pm.`p_lastname`, pm.`phoneno`, pm.`address1`, pm.`dob`, pm.`j_date`, pm.`field_of_expertise`, pm.`experience`, pm.`previously_job`, pm.`image`, pm.`type`, pm.`e_phone`, pm.`sex`, pm.`blood_group`, pm.`d_id`, dm.`d_name`
          FROM `professor_master` pm
          LEFT JOIN `department` dm ON pm.`d_id` = dm.`d_id`
          WHERE type =2";
$result = mysqli_query($conn, $query);
?>
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            
                <div class="card">
                    <h5 class="card-header">VIEW H.O.D</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                        <th scope="col">Professor ID</th>
                      
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Phone Number</th>
                      
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Department ID</th>
                        <th scope="col">Department Name</th>
                        <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
               <?php       
while ($row = mysqli_fetch_assoc($result)) {

echo "<tr>
        <td>{$row['professor_id']}</td>
      
        <td>{$row['p_firstname']}</td>
        <td>{$row['p_lastname']}</td>
        <td>{$row['phoneno']}</td>
       
        <td>{$row['dob']}</td>
       
        <td>{$row['d_id']}</td>
        <td>{$row['d_name']}</td>
        <td>
            <button class='btn btn-primary' onclick='changeHOD({$row['professor_id']}, {$row['d_id']})'>Change HOD</button>
            <button class='btn btn-danger' onclick='removeHOD({$row['professor_id']}, {$row['d_id']})'>Remove HOD</button>
        </td>
    
    </tr>"; }
         echo "</tbody></table>";
           ?>
                      
                  </div>
                </div>
              </div>
            </div>
 </div>


<script>
   function changeHOD(professorId, departmentId) {
    window.location.href = 'update_hod.php?p_id=' + professorId + '&d_id=' + departmentId;
}


    function removeHOD(professorId, departmentId) {
        // Assuming you have jQuery included
        $.post("remove_hod.php", { professorId: professorId, departmentId: departmentId }, function (data) {
    alert(data);
    location.reload(); // Refresh the page after the update
});
    }
</script>

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
