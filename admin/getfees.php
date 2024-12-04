<?php
// get_fees.php

// Include your database connection file
include "db.php";

// Get the view_department_id from the AJAX request
$viewDepartmentId = $_GET['view_department_id'];

// Replace [your_fees_query] with the actual SQL query to fetch fees based on the department_id
$feesQuery = "SELECT * FROM fees_master JOIN courses on courses.c_id = fees_master.course_id JOIN batch_master on batch_master.batch_id = fees_master.batch_id WHERE department_id = $viewDepartmentId";
$feesResult = $conn->query($feesQuery);


while ($row = $feesResult->fetch_assoc()) {
    echo '
    <option value='.$row['fees_id'].'>'.$row['fees_name'].'</option>';
}



// Close the database connection
$conn->close();
?>
