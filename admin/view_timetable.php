<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Timetable</title>
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
// Assuming you have a connection to your database established
include "db.php";


$sql = "SELECT t.`t_id`, t.`ps_id`, t.`class_id`, t.`time`, t.`room_no`, t.`remarks`, t.`date`, CONCAT(pm.`p_firstname`, ' - ', s.`name`) AS display_text
        FROM `timetable` t
        JOIN `professor_subject` ps ON t.`ps_id` = ps.`ps_id`
        JOIN `professor_master` pm ON ps.`p_id` = pm.`professor_id`
        JOIN `subject` s ON ps.`s_id` = s.`subject_id`";
$result = $conn->query($sql);

// Organize data by days of the week
$timetableDataByDay = array();
while ($row = $result->fetch_assoc()) {
    $dayOfWeek = date('l', strtotime($row['date'])); // Get day of the week from the date
    $classInfo = $row['time'] . '-'. $row['display_text'] .' - ' . $row['room_no'] ;
    $timetableDataByDay[$row['class_id']][$dayOfWeek][] = $classInfo;
}

// Display the timetable and weekly calendar in a tabular format
?>

<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            
                <div class="card">
                    <h5 class="card-header">VIEW TIMETABLE</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                        <th>Class</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
foreach ($timetableDataByDay as $classID => $classSchedules) {
    echo '<tr>';
    echo '<td>' . $classID . '</td>';
    foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day) {
        echo '<td>';
        if (isset($classSchedules[$day])) {
            echo implode('<br>', $classSchedules[$day]);
        }
        echo '</td>';
    }
    echo '</tr>';
}

echo '</table>';

// Display the weekly calendar
echo '<br>';

$conn->close();
?>
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
