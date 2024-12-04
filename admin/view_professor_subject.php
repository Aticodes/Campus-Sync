

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
    <title>Insert Professor-Subject</title>
</head>
<body>
<?php
// Assuming you have a connection to the database
include "db.php";

// Function to fetch professor data for dropdown
function fetchProfessors($conn) {
    $professorSql = "SELECT * FROM professor_master";
    $professorResult = mysqli_query($conn, $professorSql);
    
    $professors = array();
    while ($professorRow = mysqli_fetch_assoc($professorResult)) {
        $professors[$professorRow['professor_id']] = $professorRow['p_firstname'];
    }

    return $professors;
}

// Function to fetch subject data for dropdown
function fetchSubjects($conn) {
    $subjectSql = "SELECT * FROM subject";
    $subjectResult = mysqli_query($conn, $subjectSql);
    
    $subjects = array();
    while ($subjectRow = mysqli_fetch_assoc($subjectResult)) {
        $subjects[$subjectRow['subject_id']] = $subjectRow['name'];
    }

    return $subjects;
}

// Check if form data is submitted for insertion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
    $professorId = $_POST['p_id'];
    $subjectId = $_POST['s_id'];
    $assignBy = $_POST['assign_by'];
    $status = $_POST['status'];

    // Insert into professor_subject table
    $insertSql = "INSERT INTO professor_subject (p_id, s_id, assign_by, status)
                  VALUES ('$professorId', '$subjectId', '$assignBy', '$status')";

    if ($conn->query($insertSql) === TRUE) {
        echo "Record inserted successfully.";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

// Fetch professor and subject data for dropdowns
$professors = fetchProfessors($conn);
$subjects = fetchSubjects($conn);

// Close the database connection

?>
<?php
include "sidebar.php";
?>
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            
                <div class="card">
                    <h5 class="card-header">VIEW PROFESSOR SUBJECT DETAILS</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                        <th>Professor Name </th>
                    <th>Subject Name</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Sem</th>
                    <th>Status</th>
                    <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                // Fetch professor_subject records for viewing
                $viewSql = "SELECT * FROM professor_subject JOIN professor_master on professor_subject.p_id = professor_master.professor_id JOIN subject on professor_subject.s_id = subject.subject_id JOIN courses on subject.c_id = courses.c_id ";
                $viewResult = mysqli_query($conn, $viewSql);

                while ($viewRow = mysqli_fetch_assoc($viewResult)) {
                  if($viewRow['status']==1){
                    $status = "Active";
                  }else{
                    $status = "Inactive";
                  }
                    echo "<tr>
                            <td>{$viewRow['p_firstname']}</td>
                            <td>{$viewRow['name']}</td>
                            <td>{$viewRow['c_name']}</td>
                           
                            <td>{$viewRow['year']}</td>
                            <td>{$viewRow['sem']}</td>
                             <td>{$status}</td>
                            <td><a href='view_professor_subject.php?ps_id={$viewRow['ps_id']}' class='btn btn-info'>View/Update</a></td>
                          </tr>";
                }
                ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
 </div>


<?php 
include "footer.php";
?>
</body>
</html>
